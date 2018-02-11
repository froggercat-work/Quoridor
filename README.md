README.txt
==========

How to Run
----------
1. Clone this repo into a folder on a Laravel Homestead box. All node packages should already be installed, so the site should render immediately.

2. To see code updates on a VirtualBox machine, be sure to run `npm run watch-poll` instead of `npm run watch`.

3. If you need to re-install the node packages using a Homestead VirtualBox virtual machine running on Windows, do an `rm -rf` to clear all the packages, then do `sudo yarn install --no-bin-links`. 
    * Yarn is able to skip a failing optional dependency.
    * No bin links is necessary as the vagrant VirtualBox Homestead machine hosted on Windows was not able to create the bin links for the acorn package install.

### Developer software versions
* Operating system: Windows 10 Home version 1709, OS Build 16299.192
* Oracle VM VirtualBox: Version 5.2.6 r120293 (Qt5.6.2)
* Vagrant: 2.0.2
* Laravel Homestead: 5.0.1
* Laravel Framework: 5.6.2
* Google Chrome Version: Version 64.0.3282.140 (Official Build) (64-bit)
    * No other browsers were tested with this app.


Quoridor Rules
--------------
Here is an excellent guide to Quoridor and its strategies. Screenshots from this site also guided edge case rules, such as whether walls are allowed to overlap. https://quoridorstrats.wordpress.com/beginners-guide-rules-and-basics/

1. Game start: 2 pawns, each at the middle of the top and bottom of the board. Each player has 8 walls (a wall takes up the parallel boundaries of two cells).

2. Goal: Get your pawn to the other side of the board before the other player.

3. On your turn: Move your pawn one space in any of the 4 cardinal directions (left, right, up, down), or place a wall. The wall must fit fully inside the board, and can partially overlap any existing walls.

4. Moving your pawn: You cannot move through a wall, even your own. You cannot move your pawn on top of the other player.

5. Placing a wall: You cannot place a wall directly on top of another wall. 
    * You also cannot place a wall such that it blocks all paths to the other side for either player, but this is not enforced in the app.


Design Decisions and Issues
---------------------------

### Code structure:
The app is structured as follows:

#### app.blade.php
* Container for App.vue, no logic
* Contans a tag to leverage Laravel's built-in cross-site scripting prevention.

#### App.vue
* Handles game-to-game tracking (current match number, scoreboard updates). Watches for a win event (thrown by grid) to update the scoreboard.
* Handles game resets by updating game-to-game tracking and throwing events watched by the grid and walls.
* Root styles for app
* Container for QuoridorGrid.vue

#### QuoridorGrid.vue
The meat of the code is in this class.

* Contains a 17x17 grid that consists of cells, walls, and some empty `<td/>`'s for spacing. This is implemented by hand within the template.

* Watches for events thrown by its cells and walls, which correspond to desired moves.
    * The cells are named 1-81 to make modular arithmetic easy when cacluating move legality.
    * The walls are separated into vertical versus horizontal. The orientation affects both the wall styling and the move legality calculations. They are named 1-72 (horizontal) and 1-72 (vertical) for consistency with the cell numbering - using the same numbering scheme eased HTML generation.

* Keeps 3 internal arrays in sync with displayed component states - pawn locations, horizontal wall locations, and vertical wall locations.
    * Using internal state arrays speeds up searches for existing walls when calculating whether a player can move to a location. Without the arrays, we'd have to search all of the children, and sort them, every time we needed to find walls.

* Watches for a reset event thrown by its parent, which causes it to reset its state to the on-load value.

* Checks that move is legal, and changes turns if it is.
    * `isLegalMove`: A pawn move is legal if: 
        * `isLegalCellMove`: It is only one cell away, and the new location is not currently occupied
        * `isWallBlockingPath`: There are no walls blocking the player's path.
    * `isLegalWall`: A wall placement is legal if:
        * `isThereAWallHere`: A wall cannot exactly overlap another wall. A partial overlap is allowed.
        * NOT YET IMPLEMENTED: `wouldMoveBlockPlayer`: Checks if placing this wall would box a player away from their goal. See "What would I do with more time?" for a preliminary design.

* Populates a dynamic instruction message telling the user how to play the game.

* Updates game status (current player turn, win state) after each turn.

* Checks for win condition and throws event if a win occurs.

#### QuoridorCell.vue
* Displays a player pawn icon when the set(player) method is called.

* Contains cell styling. vw element sizing used for responsive sizing. 
    * Any changes to cell sizes or colors should be done in tandem with the board (td element, color) and the walls (sizing, color palette agreement).

#### QuoridorHalfWall.vue
* As its name indicates, this contains the template and styling elements for a half wall. 

* The first half wall is always what the user clicks. A `strikeWall` event is thrown on click to notify the parent of the action.
    * It is the grid's job to determine the second half of the wall. It also calls the `set(player)` method on all wall elements.

* Watches for a clear event when the grandparent restarts the game.

* Contains wall styling. 
    * Any changes to wall sizes or colors should be done in tandem with the board (td element, color palette agreement) and the cells (sizing and color palette agreement).



Dev Tests
---------
* Security tests
    * Cross site scripting protected?
        * Yes.
    * All console logging disabled?
        * Yes, no console logging was observed when re-running below tests.
    * Can the user affect the behavior of the app using the dev console?
        * Probably, but it's non-trival to access the Vue objects outside the context of the component, so this is prretty safe.
    * Can the user cheat the game by clicking in an unexpected area?
        * A bug was found on reset, where the child components might be gathered into the grid's cache out of order, which broke the move legality calculations. The cache is now sorted by name to avoid this.
        * Other than the above, no, to the dev's knowledge. All actions are driven by a user click on specific elements; as an example, there's no class monitoring, so unless the user interacts with the correct elements, the average user won't be able to do anything with the app.
* Performance tests
    * Any delay when interacting with the user interface?
        * No.
* Pawn tests
    * Can a pawn move only one cell at a time?
        * Yes, else "Illegal move" is displayed in the dynamic instructions.
    * Can a pawn move diagonally?
        * No. Attempting to move diagonally displays "Illegal move" in the dynamic instructions.
    * Can a pawn move exactly once per turn?
        * Yes. After a legal move is made, play switches immediately to the other player.
    * Can a pawn move onto another pawn?
        * No. Attempting to move into an occupied cell displays "Illegal move" in the dynamic instructions.
    * When a pawn reaches the goal side, is a win registered?
        * Yes. When a pawn wins, the game status block at the top of the grid changes color and indicates that the active player has won. The grid is frozen to disallow all moves. The scoreboard is updated with the win count.
        * Corner cells were also tested and confirmed to register a win.
        * Moving a pawn back to its own side does not register a win.
* Wall tests
    * Can you put a wall exactly on top of an existing wall?
        * No, the dynmic instructions indicate there is a wall there already.
    * Can you put a wall partially on top of another wall?
        * Yes, walls can overlap by one cell. Horizontal and vertical walls can be placed through each other.
    * Can you put a wall off the edge of the board?
        * No. Clicking the edge-most half-wall elements will place a wall in the two cells preceeding the edge of the board.
        * For all other cells, clicking a half-wall element will place a wall in the click element, plus the right-side (horizontal) or bottom-side (vertical) adjacent half-wall.
    * Can pawns move through walls?
        * No. Pawns cannot move through walls. In addition to moving in the middle of the board, walls were placed on the sides of the board to test that the calculations accounted for the board wrapping around.
    * If you overlap a wall with another wall, does the overlap disply the most recent player's wall color?
        * Yes.
    * Do the walls indicate which player placed them?
        * Yes. Player O gets one color, Player X another.
    * Is there an indication of how many walls a player has remaining?
        * Yes. When a wall is placed, a message is displayed for a few seconds to indicate the number of walls remaining to the player.
* Top-level tests
    * Does the Restart button work?
        * Yes. Restarting the game puts both pawns back in starting locations, removes all walls, restores player wall counts, reverts displayed statuses to intial settings, and increments the Match counter without affecting the Win scoreboard.
    * Does the scoreboard update correctly?
        * Yes. The scoreboard only updates when a pawn reaches its goal side. Resetting the game has no effect on the scoreboard.
    * Does the Match display increment correctly?
        * Yes. The match display increments every time the restart button is pressed.
* Attractiveness
    * Does the game hurt the eyes?
        * A little, but tolerable. Color palette roughly matches.
    * Do interactable elements display their interactivity?
        * Yes, mostly. Hoevering over an element with a click event causes its background to highlight.
        * However, note that hovering over a wall only highlights the wall the user is hovering over. It should highlight all half wall elements that the wall will span across.
        * On mobile: no, there is no way for users to see what they are interacting with before clicking it on mobile.
    * Are game instructions clear?
        * The dynamic instructions tell you what to do at every stage of the game, which seems sufficient to explain the rules (they're fairly intuitive to the dev). Would be great to run by some others for confirmation.



What would I do with more time?
-------------------------------
These prospective changes are in priority order. My reasoning for the priority choice is also explained.

1. Implement wall-blocking-player rule. Method is already stubbed into the `QuoridorGrid` as `wouldMoveBlockPlayer`. This is my top priority as it is a missing requirement for the game, although the game is usable in its current state.
    * Preliminary Design:
        * Create temporary wall arrays containing the current walls plus the prospective wall for easier calculations.
        * For each player (X and O), we will need to run mirror immages of the checks:
            1. Are there walls along every element between the player and their goal?

               ```
                 GOAL
               | | | |
               =======
               | |X| |
               ```

                * If this check is true, the move is illegal. Return false.

            2. Is there a vertical wall which stretches from the horizontal wall as it extends left of the pawn to the player's side of the board? Does the horizontal wall strech all the way to the right-most edge of the board?

               ```
                 GOAL
               | | | |
               | |====
               | / | |
               | / | |
               | / |X|
               ```

                * If this check is true, the move is illegal. Return false.

            3. Is there a right-side vertical wall which intersects the horizontal wall between the player and their goal? Does this line stretch to the edge of the board?
                * If this check is true, the move is illegal. Return false.
            4. Finally, check if the wall placement would box in the player.

    * The preliminary design above will work for completely rectangular enclosement, but will not handle polygonal enclosures. I expect there is a tweak that I can make to the logic above to check for horizontal walls without checking the row, and correspondingly for vertical rows, but it'll take some review before it's ready to implement.

2. Test mobile interface with actual phones, by deploying to an IP with Laravel Forge.

3. Implement UI to display each player's wall counts at all times.

4. Implement unit tests in preparation for refactoring.

5. Clean up code. There are a few places in the code with a hashtag #MoreTime comment. I'd refactor these to make the code cleaner and easier to maintain and extend.

6. Modify the grid so it is easier to click cells/ walls when using a phone.
    * Testing found that clicking elements on a touch device was error-prone, and leaned heavily towards clicking the walls, which ends the players turn without confirmation.

7. Implement an undo option in case a player moves inadvertently.

8. Modify the click areas to be wider than the actual displayed grid, then change the grid display to use tighter walls for a cleaner look.
    * Alternatively, map a background image exactly to the underlying grid cells, and make the <td> backgrounds invisible unless a wall is set. This would require a fair amount of testing to ensure it works on all devices.

9. Modify the pawn display to use icons.
    * Makes the user interface look more professional.

10. Implement extra credit elements. Creating a score metric (likely the number of total moves) and creating a backend with users would extend my Laravel experience.

11. Modify element numbering to match array numbering scheme
    * We need to mix numbering patterns, since the 0-based values are needed for arrays, but the 1-based values are used to calculate moves. This mix is complex enough to keep track of if we'd made everything numbered the same, so just modify the names to start at 0 as a best practice.
    * This would break a number of methods, and unit tests aren't in place to catch all of these, so this is too high risk to do right now.

12. Refactor all player logic into a relative calculation, and put it in its own component/ class (research how to handle display-less components - classes - with Vue). This would open the door for a 4 player Quoridor variant with minimal additonal code.