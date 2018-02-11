<template>
	<div>
		<div class="scoreBoard">
			<span>O has {{ wins.O }} wins</span>
			<h2>Score Board</h2>
			<span>X has {{ wins.X }} wins</span>
		</div>
		<div id="details">
			<h1>Quoridor</h1>
			<h2>Match #{{ matches + 1 }}</h2>
		</div>
		<quoridor-grid></quoridor-grid>
		<button class="restart" @click="restart">Restart</button>
	</div>
</template>

<script>
	import QuoridorGrid from "./components/QuoridorGrid.vue"
	export default {
		data () {
			return {
				matches: 0,
				wins: {
					O: 0,
					X: 0
				}
			}
		},
		components: {
			'quoridor-grid': QuoridorGrid
		},
		methods: {
			restart() {
				Event.$emit("resetGrid");
				Event.$emit("clearWalls");
				this.matches++;
			}
		},
		created() {
			Event.$on('win', (winner) => {
				this.wins[winner]++;
			});
		}
	}
</script>

<style>
	body {
		background-color: #fff;
		color: #9D6381;
		font-weight: bolder;
		font-family: 'Dosis', Helvetica, sans-serif;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		text-align: center;
		margin: 0px;
	}
	#app {
		margin: 0 auto;
		max-width: 100%;
		max-height: 100%;
		color: #612940;
	}
	h1 {
		text-transform: uppercase;
		font-weight: bold;
		font-size: 5vw;
	}
	.restart {
		background-color: #612940;
		color: #fff;
		border: 0px;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		font-family: 'Dosis', Helvetica, sans-serif;
		font-size: 3vw;
		font-weight: bold;
		margin: 0px;
		padding: 15px;
		width: 100%;
	}
	.restart:hover {
		background-color: #853858;
		cursor: pointer;
	}
	.scoreBoard {
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		align-items: center;
		width: 100%;
		height: 4vw;
		background-color: #CECCCC;
		/*box-shadow: 10px solid #fff;*/
		padding: 2.5vw;
		overflow-x: none;
	}
	.scoreBoard h2 {
		margin: 0px;
	}
	.scoreBoard span {
		float: right;
		font-size: 3vw;
		font-weight: bold;
		margin-left: 20px;
	}
</style>