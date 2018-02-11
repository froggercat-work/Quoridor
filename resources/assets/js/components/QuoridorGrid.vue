<template>
	<div>
		<div>
			{{ informationMessage }}
		</div>
		<div class="gameStatus" v-bind:class="gameStatusColor">
		    {{ gameStatusMessage }}
		</div>
		<table class="grid">
			<!-- #MoreTime Create each of these using a v-for instead -->
			<tr>
				<quoridor-cell name="1"></quoridor-cell>
				<quoridor-half-wall name="1" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="2"></quoridor-cell>
				<quoridor-half-wall name="2" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="3"></quoridor-cell>
				<quoridor-half-wall name="3" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="4"></quoridor-cell>
				<quoridor-half-wall name="4" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="5"></quoridor-cell>
				<quoridor-half-wall name="5" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="6"></quoridor-cell>
				<quoridor-half-wall name="6" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="7"></quoridor-cell>
				<quoridor-half-wall name="7" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="8"></quoridor-cell>
				<quoridor-half-wall name="8" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="9"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="1" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="2" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="3" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="4" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="5" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="6" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="7" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="8" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="9" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="10"></quoridor-cell>
				<quoridor-half-wall name="9" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="11"></quoridor-cell>
				<quoridor-half-wall name="10" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="12"></quoridor-cell>
				<quoridor-half-wall name="11" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="13"></quoridor-cell>
				<quoridor-half-wall name="12" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="14"></quoridor-cell>
				<quoridor-half-wall name="13" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="15"></quoridor-cell>
				<quoridor-half-wall name="14" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="16"></quoridor-cell>
				<quoridor-half-wall name="15" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="17"></quoridor-cell>
				<quoridor-half-wall name="16" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="18"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="10" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="11" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="12" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="13" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="14" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="15" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="16" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="17" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="18" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="19"></quoridor-cell>
				<quoridor-half-wall name="17" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="20"></quoridor-cell>
				<quoridor-half-wall name="18" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="21"></quoridor-cell>
				<quoridor-half-wall name="19" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="22"></quoridor-cell>
				<quoridor-half-wall name="20" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="23"></quoridor-cell>
				<quoridor-half-wall name="21" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="24"></quoridor-cell>
				<quoridor-half-wall name="22" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="25"></quoridor-cell>
				<quoridor-half-wall name="23" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="26"></quoridor-cell>
				<quoridor-half-wall name="24" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="27"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="19" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="20" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="21" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="22" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="23" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="24" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="25" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="26" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="27" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="28"></quoridor-cell>
				<quoridor-half-wall name="25" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="29"></quoridor-cell>
				<quoridor-half-wall name="26" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="30"></quoridor-cell>
				<quoridor-half-wall name="27" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="31"></quoridor-cell>
				<quoridor-half-wall name="28" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="32"></quoridor-cell>
				<quoridor-half-wall name="29" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="33"></quoridor-cell>
				<quoridor-half-wall name="30" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="34"></quoridor-cell>
				<quoridor-half-wall name="31" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="35"></quoridor-cell>
				<quoridor-half-wall name="32" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="36"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="28" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="29" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="30" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="31" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="32" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="33" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="34" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="35" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="36" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="37"></quoridor-cell>
				<quoridor-half-wall name="33" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="38"></quoridor-cell>
				<quoridor-half-wall name="34" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="39"></quoridor-cell>
				<quoridor-half-wall name="35" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="40"></quoridor-cell>
				<quoridor-half-wall name="36" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="41"></quoridor-cell>
				<quoridor-half-wall name="37" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="42"></quoridor-cell>
				<quoridor-half-wall name="38" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="43"></quoridor-cell>
				<quoridor-half-wall name="39" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="44"></quoridor-cell>
				<quoridor-half-wall name="40" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="45"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="37" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="38" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="39" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="40" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="41" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="42" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="43" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="44" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="45" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="46"></quoridor-cell>
				<quoridor-half-wall name="41" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="47"></quoridor-cell>
				<quoridor-half-wall name="42" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="48"></quoridor-cell>
				<quoridor-half-wall name="43" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="49"></quoridor-cell>
				<quoridor-half-wall name="44" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="50"></quoridor-cell>
				<quoridor-half-wall name="45" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="51"></quoridor-cell>
				<quoridor-half-wall name="46" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="52"></quoridor-cell>
				<quoridor-half-wall name="47" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="53"></quoridor-cell>
				<quoridor-half-wall name="48" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="54"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="46" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="47" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="48" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="49" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="50" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="51" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="52" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="53" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="54" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="55"></quoridor-cell>
				<quoridor-half-wall name="49" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="56"></quoridor-cell>
				<quoridor-half-wall name="50" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="57"></quoridor-cell>
				<quoridor-half-wall name="51" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="58"></quoridor-cell>
				<quoridor-half-wall name="52" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="59"></quoridor-cell>
				<quoridor-half-wall name="53" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="60"></quoridor-cell>
				<quoridor-half-wall name="54" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="61"></quoridor-cell>
				<quoridor-half-wall name="55" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="62"></quoridor-cell>
				<quoridor-half-wall name="56" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="63"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="55" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="56" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="57" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="58" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="59" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="60" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="61" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="62" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="63" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="64"></quoridor-cell>
				<quoridor-half-wall name="57" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="65"></quoridor-cell>
				<quoridor-half-wall name="58" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="66"></quoridor-cell>
				<quoridor-half-wall name="59" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="67"></quoridor-cell>
				<quoridor-half-wall name="60" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="68"></quoridor-cell>
				<quoridor-half-wall name="61" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="69"></quoridor-cell>
				<quoridor-half-wall name="62" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="70"></quoridor-cell>
				<quoridor-half-wall name="63" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="71"></quoridor-cell>
				<quoridor-half-wall name="64" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="72"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-half-wall name="64" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="65" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="66" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="67" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="68" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="69" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="70" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="71" class="horizontal"></quoridor-half-wall>
				<td/>
				<quoridor-half-wall name="72" class="horizontal"></quoridor-half-wall>
			</tr>
			<tr>
				<quoridor-cell name="73"></quoridor-cell>
				<quoridor-half-wall name="65" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="74"></quoridor-cell>
				<quoridor-half-wall name="66" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="75"></quoridor-cell>
				<quoridor-half-wall name="67" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="76"></quoridor-cell>
				<quoridor-half-wall name="68" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="77"></quoridor-cell>
				<quoridor-half-wall name="69" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="78"></quoridor-cell>
				<quoridor-half-wall name="70" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="79"></quoridor-cell>
				<quoridor-half-wall name="71" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="80"></quoridor-cell>
				<quoridor-half-wall name="72" class="vertical"></quoridor-half-wall>
				<quoridor-cell name="81"></quoridor-cell>
			</tr>
		</table>
	</div>
</template>

<script>
	import QuoridorCell from './QuoridorCell.vue';
	import QuoridorHalfWall from './QuoridorHalfWall.vue'
	export default {
		data () {
			return {
				// can be O or X
				activePlayer: 'O',

				// maintains the status of the game: turn or win or draw
				gameStatus: 'turn',

				gameStatusMessage: `O's turn`,

				// status color is used as background color in the status bar
				// it can hold the name of either of the following CSS classes
				// statusTurn (default) is yellow for a turn
				// statusWin is green for a win
				// statusDraw is purple for a draw
				gameStatusColor: 'statusTurn',

				// no. of moves played by both players in a single game
				moves: 0,

				// stores the placement of X and O in cells by their cell number
				cells: Array(81).fill(''),

				// Caches quoridor-cell children for easy access to their methods with an array that matches their name
				cellComponentsCache: [],

				verticalWalls: Array(72).fill(''),

				// Caches quoridor-half-wall children with the vertical class for easy access to their methods with an array that matches their name
				verticalWallComponentsCache: [],

				horizontalWalls: Array(72).fill(''),

				// Caches quoridor-half-wall children with the horizontal class for easy access to their methods with an array that matches their name
				horizontalWallComponentsCache: [],

				availableWalls: {
					"O": 8,
					"X": 8
				},

				informationMessage: "Player O, move your pawn or place a wall.",

				timer: ""
			}
		},
		methods: {
			finishTurn() {
				if (!this.frozen) {
					this.informationMessage = `You must move your pawn or place a wall before ending your turn.`
					return;
				}

				this.activePlayer = this.nonActivePlayer;

				this.frozen = false;

				this.gameStatusMessage = `${this.activePlayer}'s turn`;

	        	clearTimeout(this.timer);
				
				// Since we switch turns without prompting, keep the pre-existing display message up for a second or two so the user can read it.
				this.timer = setTimeout(() => this.informationMessage = "Player " + this.activePlayer + ", move your pawn or place a wall.",  2000);
			},
			currentLocation(player) {
		    	return this.cells.indexOf(player) + 1; // Our cell ID's start at 1
		    },
		    isLegalCellMove(location, newLocation) {
		    	// If player is along the left side of the board, they cannot move left.
				if ((location - 1) % 9 === 0
					&& newLocation === location - 1)
					return false;

				// If player is along the right side of the board, they cannot move right.
				if (location % 9 == 0
					&& newLocation === location + 1)
					return false;

				// If player is along the top of the board, they cannot move up. It's enough to check if they're trying to move to a location before the start of the board.
				if (newLocation < 1)
					return false;

				// If player is along the bottom of the board, they cannot move down. It's enough to check if they're moving to a location after the bottom edge of the board.
				if (newLocation > 81)
					return false;

				// Check the pawn is only moving one square at a time.
				if (Math.abs(location - newLocation) !== 1 // One square either left or right
					&& Math.abs(location - newLocation) !== 9) // Our board is 9x9, so this calculates up/ down moves.
					return false;

				// if the other player is in the target location, the move is invalid.
				if (this.currentLocation(this.nonActivePlayer) == newLocation)
					return false;

				return true;
		    },
		    isWallBlockingPath(location, newLocation) {
		    	var horizontalWallIndexes = [];
		    	var verticalWallIndexes = [];
		    	var arrayLocation = location - 1; // For direct array comparisons, we have to subtract 1 (our location matches the name values, which start at 1.) Note that our comparisons to newLocation still need to use the original location variable passed into the method.

		    	// First determine direction. If going left-right, we need to check for vertical walls.
		    	if (Math.abs(location - newLocation) === 1) {
		    		for (let i = 0; i < this.verticalWalls.length; i++) {
		    			// If the wall array isn't populated, there isn't a wall here, go on
			    		if(this.verticalWalls[i] === '')
			    			continue;

			    		verticalWallIndexes.push(i); // for logging
			    		// Remember, there are only 8 vertical walls per row.
			    		// First check that the wall is in the same row as the current location.
			    		if(Math.floor(i/8) !== Math.floor(arrayLocation/9))
			    			continue;

			    		// Check that the wall is directly right of the current location, and that we're moving right. (If we're moving left, a wall to our right doesn't block.)
			    		if(i % 8 === arrayLocation % 9
			    			&& newLocation - location === 1)
			    			return true;

			    		// Check that the wall is directly left us, and that we're moving left.
			    		if(i % 8 + 1 === arrayLocation % 9 
			    			&& location - newLocation === 1)
			    			return true;

			    		// If we're here, that means the wall is in the same column but isn't blocking our path, so continue.
		    		}
		    		// If we made it here, there are no vertical walls blocking our horizontal path, so return.
		    		return false;
		    	}
		    	// Else, we must be traveling vertically, so check for horizontal walls blocking the path.
		    	for (let i = 0; i < this.horizontalWalls.length; i++) {
		    		// If the wall array isn't populated, there isn't a wall here, go on
		    		if(this.horizontalWalls[i] === '')
		    			continue;

		    		horizontalWallIndexes.push(i); // for logging

		    		// First check that the wall is in the same column as the current location.
		    		if(i % 9 !== arrayLocation % 9)
		    			continue;

		    		// Check that the wall is directly below the current arrayLocation, and that we're moving down. (If we're moving up, a wall below us doesn't block.)
		    		if(Math.floor(i/9) === Math.floor(arrayLocation/9)
		    			&& newLocation - location === 9)
		    			return true;

		    		// Check that the wall is directly above us, and that we're moving up.
		    		if(Math.floor(i/9) + 1 === Math.floor(arrayLocation/9)
		    			&& location - newLocation === 9)
		    			return true;

		    		// If we're here, that means the wall is in the same column but isn't blocking our path, so continue.
		    	}

		    	// If we made it here, there are no walls to block this move.
		    	return false;
		    },
			isLegalMove(player, newLocation) {
				var location = this.currentLocation(player);

				if (!this.isLegalCellMove(location, newLocation))
					return false;

				if (this.isWallBlockingPath(location, newLocation))
					return false;

				// Okay, we passed all the illegality checks! The move must be legal.
				return true;
			},
			isLegalWall(wallIndex1, wallIndex2, isVertical) {
				if (this.isThereAWallHere(wallIndex1, wallIndex2, isVertical)) {
					console.log("There's a wall here.")
					this.informationMessage = "There is already a wall here.";

					return false;
				}

				if(this.wouldMoveBlockPlayer(this.activePlayer, wallIndex1, wallIndex2, isVertical)) {
					console.log("wall blocks active player");
					this.informationMessage = "Placing a wall there would block player " + this.activePlayer + " from their goal, which is illegal.";

					return false;
				}

				// Is the non-active player blocked?
				if(this.wouldMoveBlockPlayer(this.nonActivePlayer, wallIndex1, wallIndex2, isVertical)){
					console.log("wall blocks inactive player");
					this.informationMessage = "Placing a wall there would block player " + this.nonActivePlayer + " from their goal, which is illegal.";
					return false;
				}

				console.log("Legal wall.");
				return true;
			},
			isThereAWallHere(wallIndex1, wallIndex2, isVertical) {
				console.log(wallIndex1, wallIndex2, isVertical)
				console.log(this.verticalWalls);
				console.log(this.horizontalWalls);
				if (isVertical) {
					if(this.verticalWalls[wallIndex1] !== ''
						&& this.verticalWalls[wallIndex2] !== '') {
						console.log('there is a vertical wall here')
						return true;
					}
					return false;
				}

				if(this.horizontalWalls[wallIndex1] !== ''
					&& this.horizontalWalls[wallIndex2] !== '') {
					console.log('there is a horizontal wall here')
					return true;
				}

				console.log("No wall here");
				return false;
			},
			wouldMoveBlockPlayer(player, wallIndex1, wallIndex2, isVertical) {
				// Just a stub for now.
				// #MoreTime - implement check to see if player would be blocked by this wall placement.
				return false;
			},
			isPlayerAtGoal(player, location) {
				if (player == 'O')
					return location > 72;
				// else we're player X
				return location < 10;
			},
			compare(a,b) {
				if (parseInt(a._props.name) < parseInt(b._props.name))
					return -1;
				if (parseInt(a._props.name) > parseInt(b._props.name))
					return 1;
				return 0;
			}
		},
		components: {
			'quoridor-cell': QuoridorCell,
			'quoridor-half-wall': QuoridorHalfWall
		},
		computed: {
		    // helper property to get the non-active player
		    nonActivePlayer() {
		        if (this.activePlayer === 'O')
		            return 'X';

		        return 'O';
		    },
		    // helper property to filter children to cell components only so we can match to data.cells array
		    cellComponents() {
		    	if (this.cellComponentsCache.length > 0)
		    		return this.cellComponentsCache;

		    	this.cellComponentsCache = this.$children.filter(child => child.$options._componentTag === "quoridor-cell");

		    	// Order is must match our calculated array to ensure we're updating the correct display.
		    	this.cellComponentsCache.sort(this.compare);

		    	return this.cellComponentsCache;
		    },
		    // helper property to filter children to cell components only so we can match to data.cells array
		    verticalWallComponents() {
		    	if (this.verticalWallComponentsCache.length > 0)
		    		return this.verticalWallComponentsCache;

		    	this.verticalWallComponentsCache = this.$children.filter(child => child.$options._componentTag === "quoridor-half-wall" && child.$options._parentVnode.data.staticClass.search('vertical') !== -1);

		    	// Order is must match our calculated array to ensure we're updating the correct display.
		    	this.verticalWallComponentsCache.sort(this.compare);

		    	return this.verticalWallComponentsCache;
		    },
		    // helper property to filter children to cell components only so we can match to data.cells array
		    horizontalWallComponents() {
		    	if (this.horizontalWallComponentsCache.length > 0)
		    		return this.horizontalWallComponentsCache;

		    	this.horizontalWallComponentsCache = this.$children.filter(child => child.$options._componentTag === "quoridor-half-wall" && child.$options._parentVnode.data.staticClass.search('horizontal') !== -1);

		    	// Order is must match our calculated array to ensure we're updating the correct display.
		    	this.horizontalWallComponentsCache.sort(this.compare);

		    	return this.horizontalWallComponentsCache;
		    }
		},
		created() {
			// listens for a strike made by the user on cell
			// it is called by the Cell component
			Event.$on('strikeCell', (cellNumber) => {
				if (this.frozen) {
					// this.informationMessage = "You cannot move. Click the yellow box to change turns.";
					return;
				}

				if (!this.isLegalMove(this.activePlayer, cellNumber)) {
					this.informationMessage = "Illegal move.";

					return;
				}

	        	this.cellComponents[this.currentLocation(this.activePlayer)-1].clear();

	        	this.cells[this.currentLocation(this.activePlayer)-1] = '';

		        // sets either X or O in the clicked cell of the cells array
		        this.cellComponents[cellNumber - 1].set(this.activePlayer);

		        this.cells[cellNumber - 1] = this.activePlayer;

		        // increments the number of moves
		        this.moves++;

		        // stores the game status by calling the changeGameStatus method
		        //this.gameStatus = this.changeGameStatus();

		        this.frozen = true;

		        if (this.isPlayerAtGoal(this.activePlayer, cellNumber)) {
		        	this.gameStatus = "win";

		        	this.gameStatusColor = "statusWin";

		        	this.gameStatusMessage = "Player " + this.activePlayer + " wins!";

		        	clearTimeout(this.timer);

		        	this.informationMessage = ""

		        	Event.$emit('win', this.activePlayer);

		        	return;
		        }

		        this.informationMessage = "Player " + this.activePlayer + " made a legal move.";

		        this.finishTurn();
			});
			Event.$on('strikeWall', (wallNumber, isVertical) => {
				if (this.frozen) {
					// this.informationMessage = "You've already moved this turn. Click the yellow button to end your turn.";
					return;
				}

				if (this.availableWalls[this.activePlayer] < 1) {
					this.informationMessage = "No more walls, Player " + this.activePlayer + ". You can move your pawn."
					
					return;
				}

				var pairedWallNumber = 0;

				if (isVertical) {
					if (parseInt(wallNumber) + 9 > 72)
						pairedWallNumber = parseInt(wallNumber) - 8; // Player clicked vertical wall at bottom

					else pairedWallNumber = parseInt(wallNumber) + 8;

					if(!this.isLegalWall(wallNumber - 1, pairedWallNumber -1, true)) {
						console.log("Illegal wall")
						return;
					}

					this.verticalWalls[wallNumber - 1] = this.verticalWalls[pairedWallNumber - 1] = this.activePlayer;

					this.verticalWallComponents[wallNumber - 1].set(this.activePlayer);

					this.verticalWallComponents[pairedWallNumber - 1].set(this.activePlayer);

				}
				else {
					if ((parseInt(wallNumber) + 1) % 9 == 1)
						pairedWallNumber = parseInt(wallNumber) - 1; // Player clicked a right-most wall

					else pairedWallNumber = parseInt(wallNumber) + 1;

					if(!this.isLegalWall(wallNumber - 1, pairedWallNumber -1, false)) {
						return;
					}

					this.horizontalWalls[wallNumber - 1] = this.horizontalWalls[pairedWallNumber - 1] = this.activePlayer;

					this.horizontalWallComponents[wallNumber -1].set(this.activePlayer);

					this.horizontalWallComponents[pairedWallNumber -1].set(this.activePlayer);
				}

				this.availableWalls[this.activePlayer]--;

				this.informationMessage = "Player " + this.activePlayer + ", you have " + this.availableWalls[this.activePlayer] + " walls remaining."

				this.frozen = true;

				this.finishTurn();

			});
			Event.$on("resetGrid", () => {
				// Clear the displayed positions
				this.cellComponents[this.currentLocation("O")-1].clear();

				this.cellComponents[this.currentLocation("X")-1].clear();

				// Clear grid memory positions used for calculations
				this.cells = Array(81).fill('');

				// Reset pawn positions on components and grid-memory reference cache
				this.cellComponents[4].set("O");

				this.cells[4] = "O";

				this.cellComponents[76].set("X");

				this.cells[76] = "X";

				// Clear component caches
				this.cellComponentsCache = this.horizontalWallComponentsCache = this.verticalWallComponentsCache = [];

				// Give both players their walls back
				this.availableWalls = {
					"O": 8,
					"X": 8
				};

				// Unfreeze the board so players can move again
				this.frozen = false;

				// Player O always starts
				this.activePlayer = "O";

				// Set information message with instructions for Player O.
				this.informationMessage = "Player " + this.activePlayer + ", move your pawn or place a wall.";

				// Reset turn displays
	        	this.gameStatus = "turn";

	        	this.gameStatusColor = "statusTurn";

	        	this.gameStatusMessage = `${this.activePlayer}'s turn`;;

			});
		},
		mounted() {
			// Sets the intial pawn positions.\
			// O starts in the middle cell at the top of the board.
			this.$children[8].set("O"); 
			// X starts in the middle cell at the bottom of the board.
			this.$children[17*16 /*total elements in grid except last row*/ 
							- 64 /* minus empty td's, those aren't components */ 
							+ 8 /*elements to middle cell of row */
				].set("X");
			// Computed variables aren't available yet
			// this.cellComponents[4].set("O");
			// this.cellComponents[76].set("X");
			this.cells[4] = "O"
			this.cells[76] = "X";
		}
	}
</script>

<style>
	td {
		background-color: #0F110C
	}
	.grid {
		background-color: #0F110C;
		/*color: #fff;*/
		width: 100%;
		border-collapse: collapse;
	}

	.gameStatus {
		margin: 0;
		padding: 15px;
		border-top-left-radius: 20px;
		border-top-right-radius: 20px;
		background-color: #CECCCC;
		color: #fff;
		font-size: 3vw;
		font-weight: bold;
	}

	.statusTurn {
		background-color: #8B8183;
	}

	.statusTurn:hover {
		/*background-color: #d9b00d; 
		cursor: pointer;*/
	}

	.statusWin {
		background-color: #f1d57e;
		color: #8F5A76;
	}

	.statusDraw {
		background-color: #0F110C;
	}
</style>