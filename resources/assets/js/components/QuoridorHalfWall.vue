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
					if (this.$options._parentVnode.data.staticClass.search('vertical') !== -1) {
						Event.$emit("strikeWall", this.name, true);
					}
					if (this.$options._parentVnode.data.staticClass.search('horizontal') !== -1) {
						Event.$emit('strikeWall', this.name, false);
					}
				}
			},
			created() {
				Event.$on('clearWalls', () => {
					this.player = '';
				});
			}
	}
</script>
<style>
	.wall {
		background-color: #0F110C;
	}
	/* #MoreTime - would convert this color change on hover to a js on mouse-over event, and color both cells the wall would apply to. */
	.wall:hover {
		background-color: #2a3022;
	}
	.horizontal {
		height: 6px;
	}
	.vertical {
		width: 6px;
	}
	.playerO, .playerO:hover {
		background-color: #8F5A76;
	}
	.playerX, .playerX:hover {
		background-color: #CECCCC;
	}
</style>