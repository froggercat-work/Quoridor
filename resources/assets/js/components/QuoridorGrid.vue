<template>
<div>
	<div class="gameStatus" v-bind:class="gameStatusColor">
	    {{ gameStatusMessage }}
	</div>
	<table class="grid">
	<tr>
		<quoridor-cell name="1x1"></quoridor-cell>
		<quoridor-cell name="1x2"></quoridor-cell>
		<quoridor-cell name="1x3"></quoridor-cell>
		<quoridor-cell name="1x4"></quoridor-cell>
		<quoridor-cell name="1x5"></quoridor-cell>
		<quoridor-cell name="1x6"></quoridor-cell>
		<quoridor-cell name="1x7"></quoridor-cell>
		<quoridor-cell name="1x8"></quoridor-cell>
		<quoridor-cell name="1x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="2x1"></quoridor-cell>
		<quoridor-cell name="2x2"></quoridor-cell>
		<quoridor-cell name="2x3"></quoridor-cell>
		<quoridor-cell name="2x4"></quoridor-cell>
		<quoridor-cell name="2x5"></quoridor-cell>
		<quoridor-cell name="2x6"></quoridor-cell>
		<quoridor-cell name="2x7"></quoridor-cell>
		<quoridor-cell name="2x8"></quoridor-cell>
		<quoridor-cell name="2x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="3x1"></quoridor-cell>
		<quoridor-cell name="3x2"></quoridor-cell>
		<quoridor-cell name="3x3"></quoridor-cell>
		<quoridor-cell name="3x4"></quoridor-cell>
		<quoridor-cell name="3x5"></quoridor-cell>
		<quoridor-cell name="3x6"></quoridor-cell>
		<quoridor-cell name="3x7"></quoridor-cell>
		<quoridor-cell name="3x8"></quoridor-cell>
		<quoridor-cell name="3x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="4x1"></quoridor-cell>
		<quoridor-cell name="4x2"></quoridor-cell>
		<quoridor-cell name="4x3"></quoridor-cell>
		<quoridor-cell name="4x4"></quoridor-cell>
		<quoridor-cell name="4x5"></quoridor-cell>
		<quoridor-cell name="4x6"></quoridor-cell>
		<quoridor-cell name="4x7"></quoridor-cell>
		<quoridor-cell name="4x8"></quoridor-cell>
		<quoridor-cell name="4x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="5x1"></quoridor-cell>
		<quoridor-cell name="5x2"></quoridor-cell>
		<quoridor-cell name="5x3"></quoridor-cell>
		<quoridor-cell name="5x4"></quoridor-cell>
		<quoridor-cell name="5x5"></quoridor-cell>
		<quoridor-cell name="5x6"></quoridor-cell>
		<quoridor-cell name="5x7"></quoridor-cell>
		<quoridor-cell name="5x8"></quoridor-cell>
		<quoridor-cell name="5x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="6x1"></quoridor-cell>
		<quoridor-cell name="6x2"></quoridor-cell>
		<quoridor-cell name="6x3"></quoridor-cell>
		<quoridor-cell name="6x4"></quoridor-cell>
		<quoridor-cell name="6x5"></quoridor-cell>
		<quoridor-cell name="6x6"></quoridor-cell>
		<quoridor-cell name="6x7"></quoridor-cell>
		<quoridor-cell name="6x8"></quoridor-cell>
		<quoridor-cell name="6x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="7x1"></quoridor-cell>
		<quoridor-cell name="7x2"></quoridor-cell>
		<quoridor-cell name="7x3"></quoridor-cell>
		<quoridor-cell name="7x4"></quoridor-cell>
		<quoridor-cell name="7x5"></quoridor-cell>
		<quoridor-cell name="7x6"></quoridor-cell>
		<quoridor-cell name="7x7"></quoridor-cell>
		<quoridor-cell name="7x8"></quoridor-cell>
		<quoridor-cell name="7x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="8x1"></quoridor-cell>
		<quoridor-cell name="8x2"></quoridor-cell>
		<quoridor-cell name="8x3"></quoridor-cell>
		<quoridor-cell name="8x4"></quoridor-cell>
		<quoridor-cell name="8x5"></quoridor-cell>
		<quoridor-cell name="8x6"></quoridor-cell>
		<quoridor-cell name="8x7"></quoridor-cell>
		<quoridor-cell name="8x8"></quoridor-cell>
		<quoridor-cell name="8x9"></quoridor-cell>
	</tr>
	<tr>
		<quoridor-cell name="9x1"></quoridor-cell>
		<quoridor-cell name="9x2"></quoridor-cell>
		<quoridor-cell name="9x3"></quoridor-cell>
		<quoridor-cell name="9x4"></quoridor-cell>
		<quoridor-cell name="9x5"></quoridor-cell>
		<quoridor-cell name="9x6"></quoridor-cell>
		<quoridor-cell name="9x7"></quoridor-cell>
		<quoridor-cell name="9x8"></quoridor-cell>
		<quoridor-cell name="9x9"></quoridor-cell>
	</tr>
</table>
</div>
</template>

<script>
	import QuoridorCell from './QuoridorCell.vue'
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

				// no. of moves played by both players in a single game (max = 9)
				moves: 0,

				// stores the placement of X and O in -cells by their cell number
				cells: {
					1: '', 2: '', 3: '',
					4: '', 5: '', 6: '',
					7: '', 8: '', 9: ''
				},

				// contains all (8) possible winning conditions
				winConditions: [
					[1, 2, 3], [4, 5, 6], [7, 8, 9], // rows
					[1, 4, 7], [2, 5, 8], [3, 6, 9], // columns
					[1, 5, 9], [3, 5, 7]             // diagonals
				]
			}
		},
		components: {
			'quoridor-cell': QuoridorCell
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
	margin: 0px;
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