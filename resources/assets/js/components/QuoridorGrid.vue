<template>
	<div>
		<div>
			{{ informationMessage }}
		</div>
		<div class="gameStatus" v-bind:class="gameStatusColor" @click="finishTurn">
		    {{ gameStatusMessage }}
		</div>
		<table class="grid">
			<!-- Create each of these using a v-for instead, but need to modify intial pawn placement logic -->
			<tr>
				<quoridor-cell name="1"></quoridor-cell>
				<quoridor-cell name="2"></quoridor-cell>
				<quoridor-cell name="3"></quoridor-cell>
				<quoridor-cell name="4"></quoridor-cell>
				<quoridor-cell name="5"></quoridor-cell>
				<quoridor-cell name="6"></quoridor-cell>
				<quoridor-cell name="7"></quoridor-cell>
				<quoridor-cell name="8"></quoridor-cell>
				<quoridor-cell name="9"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="10"></quoridor-cell>
				<quoridor-cell name="11"></quoridor-cell>
				<quoridor-cell name="12"></quoridor-cell>
				<quoridor-cell name="13"></quoridor-cell>
				<quoridor-cell name="14"></quoridor-cell>
				<quoridor-cell name="15"></quoridor-cell>
				<quoridor-cell name="16"></quoridor-cell>
				<quoridor-cell name="17"></quoridor-cell>
				<quoridor-cell name="18"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="19"></quoridor-cell>
				<quoridor-cell name="20"></quoridor-cell>
				<quoridor-cell name="21"></quoridor-cell>
				<quoridor-cell name="22"></quoridor-cell>
				<quoridor-cell name="23"></quoridor-cell>
				<quoridor-cell name="24"></quoridor-cell>
				<quoridor-cell name="25"></quoridor-cell>
				<quoridor-cell name="26"></quoridor-cell>
				<quoridor-cell name="27"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="28"></quoridor-cell>
				<quoridor-cell name="29"></quoridor-cell>
				<quoridor-cell name="30"></quoridor-cell>
				<quoridor-cell name="31"></quoridor-cell>
				<quoridor-cell name="32"></quoridor-cell>
				<quoridor-cell name="33"></quoridor-cell>
				<quoridor-cell name="34"></quoridor-cell>
				<quoridor-cell name="35"></quoridor-cell>
				<quoridor-cell name="36"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="37"></quoridor-cell>
				<quoridor-cell name="38"></quoridor-cell>
				<quoridor-cell name="39"></quoridor-cell>
				<quoridor-cell name="40"></quoridor-cell>
				<quoridor-cell name="41"></quoridor-cell>
				<quoridor-cell name="42"></quoridor-cell>
				<quoridor-cell name="43"></quoridor-cell>
				<quoridor-cell name="44"></quoridor-cell>
				<quoridor-cell name="45"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="46"></quoridor-cell>
				<quoridor-cell name="47"></quoridor-cell>
				<quoridor-cell name="48"></quoridor-cell>
				<quoridor-cell name="49"></quoridor-cell>
				<quoridor-cell name="50"></quoridor-cell>
				<quoridor-cell name="51"></quoridor-cell>
				<quoridor-cell name="52"></quoridor-cell>
				<quoridor-cell name="53"></quoridor-cell>
				<quoridor-cell name="54"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="55"></quoridor-cell>
				<quoridor-cell name="56"></quoridor-cell>
				<quoridor-cell name="57"></quoridor-cell>
				<quoridor-cell name="58"></quoridor-cell>
				<quoridor-cell name="59"></quoridor-cell>
				<quoridor-cell name="60"></quoridor-cell>
				<quoridor-cell name="61"></quoridor-cell>
				<quoridor-cell name="62"></quoridor-cell>
				<quoridor-cell name="63"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="64"></quoridor-cell>
				<quoridor-cell name="65"></quoridor-cell>
				<quoridor-cell name="66"></quoridor-cell>
				<quoridor-cell name="67"></quoridor-cell>
				<quoridor-cell name="68"></quoridor-cell>
				<quoridor-cell name="69"></quoridor-cell>
				<quoridor-cell name="70"></quoridor-cell>
				<quoridor-cell name="71"></quoridor-cell>
				<quoridor-cell name="72"></quoridor-cell>
			</tr>
			<tr>
				<quoridor-cell name="73"></quoridor-cell>
				<quoridor-cell name="74"></quoridor-cell>
				<quoridor-cell name="75"></quoridor-cell>
				<quoridor-cell name="76"></quoridor-cell>
				<quoridor-cell name="77"></quoridor-cell>
				<quoridor-cell name="78"></quoridor-cell>
				<quoridor-cell name="79"></quoridor-cell>
				<quoridor-cell name="80"></quoridor-cell>
				<quoridor-cell name="81"></quoridor-cell>
			</tr>
		</table>
	</div>
</template>

<script>
	import QuoridorCell from './QuoridorCell.vue';
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

				// no. of moves played by both players in a single game (m = 9)
				moves: 0,

				// stores the placement of X and O in -cells by their cell number
				cells: Array(81).fill(''),

				informationMessage: "Player O, move your pawn or place a wall."
			}
		},
		methods: {
			finishTurn() {
				this.changePlayer();
				this.gameStatusMessage = `${this.activePlayer}'s turn`;
			},
			changePlayer() {
				this.activePlayer = this.nonActivePlayer;
				this.frozen = false;
				this.informationMessage = "Player " + this.activePlayer + ", move your pawn or place a wall."
			},
			currentLocation(player) {
		    	return this.cells.indexOf(player) + 1; // Our cell ID's start at 1
		    },
			isLegalMove(player, newLocation) {
				var location = this.currentLocation(player);

				console.log("Current location: " + location + " New location: " + newLocation)

				// If player is along the left side of the board, they cannot move left.
				console.log("Left side check (true when 0): " + (location - 1) % 9);
				if ((location - 1) % 9 === 0
					&& newLocation === location - 1)
					return false;

				// If player is along the right side of the board, they cannot move right.
				console.log("Right side check (true when 0): " + location % 9 == 0);
				if (location % 9 == 0
					&& newLocation === location + 1)
					return false;

				// If player is along the top of the board, they cannot move up. It's enough to check if they're trying to move to a location before the start of the board.
				if (newLocation < 1)
					return false;

				// If player is along the bottom of the board, they cannot move down. It's enough to check if they're moving to a location after the bottom edge of the board.
				if (newLocation > 81)
					return false;

				// #MoreTime - the final fall through should return true, sit down and reverse this boolean.
				// Else, the move is legal as long as the pawn is only moving one square at a time.
				console.log("Checking whether move is legal. Math.abs(location - newLocation) = " + Math.abs(location - newLocation) + " (we expect 1). Math.abs(location - newLocation) = " + Math.abs(location - newLocation) + " (we expect 9).");
				if (Math.abs(location - newLocation) === 1
					|| Math.abs(location - newLocation) === 9)
				{
					this.informationMessage = "Move is legal."
					return true;
				}

				return false;
			}
		},
		components: {
			'quoridor-cell': QuoridorCell
		},
		computed: {
		    // helper property to get the non-active player
		    nonActivePlayer() {
		        if (this.activePlayer === 'O') {

		            return 'X';
		        }

		        return 'O';
		    }
		},
		created() {
			// listens for a strike made by the user on cell
			// it is called by the Cell component
			Event.$on('strike', (cellNumber) => {
				console.log("Board frozen? " + this.frozen);
				if (!this.isLegalMove(this.activePlayer, cellNumber))
				{
					this.informationMessage = "Illegal move."
					return;
				}

				if (this.frozen)
				{
					this.informationMessage = "You cannot move. Click the yellow box to change turns.";
					return;
				}

	        	this.$children[this.currentLocation(this.activePlayer)-1].clear();
	        	this.cells[this.currentLocation(this.activePlayer)-1] = '';


		        // sets either X or O in the clicked cell of the cells array
		        this.$children[cellNumber - 1].set(this.activePlayer);
		        this.cells[cellNumber - 1] = this.activePlayer;


		        // increments the number of moves
		        this.moves++;

		        // stores the game status by calling the changeGameStatus method
		        //this.gameStatus = this.changeGameStatus();

		        this.frozen = true;
			});
		},
		mounted() {
			// Sets the intial pawn positions.
			this.$children[4].set("O");
			this.$children[76].set("X");
			this.cells[4] = "O"
			this.cells[76] = "X";
		}
	}
</script>

<style>
	.grid {
	background-color: #34495e;
	color: #fff;
	width: 100%;
	border-collapse: collapse;
	}

	.gameStatus {
	margin: 0;
	padding: 15px;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	background-color: #f1c40f;
	color: #fff;
	font-size: 1.4em;
	font-weight: bold;
	}

	.statusTurn {
	background-color: #f1c40f;
	}

	.statusWin {
	background-color: #2ecc71;
	}

	.statusDraw {
	background-color: #9b59b6;
	}
</style>