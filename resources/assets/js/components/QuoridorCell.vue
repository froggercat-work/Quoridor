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
		},
	}
</script>

<style>
	.cell {
		width: 5vw;
		height: 5vw;
		background-color: #181b13;
		margin: 4px;
		/*border: 6px solid #2c3e50;*/
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		font-size: 3.25vw; /* So you don't see re-sizing artifacts when moving pawn. */
		font-family: 'Gochi Hand', sans-serif;
	}

	.cell:hover {
		background-color: #323928;
	}

	.cell::after {
		content: '';
		display: block;
	}

</style>