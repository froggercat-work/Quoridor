<template>
	<td class="cell" @click="strike">{{ mark }}</td>
</template>

<script>
    export default {
        props: ['name'],
		data () {
		    return {
				// holds either X or O to be displayed in the td
				mark: ''
		    }    
		},
		methods: {
			set(player) {
				this.mark = player;
			},
			clear() {
				this.mark = "";
			},
			strike() {
				Event.$emit("strikeCell", this.name)
			}
		}
	}
</script>

<style>
	.cell {
		width: 4vw;
		height: 4vw;
		background-color: #34495e;
		border: 6px solid #2c3e50;
		font-size: 3.25vw; /* So you don't see re-sizing artifacts when moving pawn. */
		font-family: 'Gochi Hand', sans-serif;
	}

	.cell:hover {
		background-color: #7f8c8d;
	}

	.cell::after {
		content: '';
		display: block;
	}

</style>