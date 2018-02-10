<template>
	<td class="wall" v-bind:class="player" @click="strike"></td>
</template>
<script>
	export default {
		props: ['name'],
		data () {
			    return {
			    	player: ''
			    }    
			},
			methods: {
				set(player) {
					this.player = 'player'+player;

					console.log(this);
				},
				clear() {
					this.player = "";
				},
				strike() {
					console.log(this.$options._parentVnode.data.staticClass + " wall " + this.name + " was struck!" );
					if (this.$options._parentVnode.data.staticClass.search('vertical') !== -1) {
						Event.$emit("strikeWall", this.name, true);
					}
					if (this.$options._parentVnode.data.staticClass.search('horizontal') !== -1) {
						Event.$emit('strikeWall', this.name, false);
					}
				}
			}
	}
</script>
<style>
	.wall {
		background-color: #2c3e50;
	}
	/* #MoreTime - would convert this color change on hover to a js on mouse-over event, and color both cells the wall would apply to. */
	.wall:hover {
		background-color: #34495e;
	}
	.horizontal {
		height: 6px;
	}
	.vertical {
		width: 6px;
	}
	.playerO, .playerO:hover {
		background-color: #87B6A7;
	}
	.playerX, .playerX:hover {
		background-color: #F7D08A;
	}
</style>