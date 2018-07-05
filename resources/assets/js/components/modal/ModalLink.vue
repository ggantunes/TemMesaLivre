<template>
	<span>
		<span v-if="item">
			<button v-on:click="setForm()" v-if="!type || (type != 'button' && type != 'link')" type="button" v-bind:class=" css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + name">
				{{title}}
			</button>

			<button v-on:click="setForm()" v-if="type == 'button'" type="button" v-bind:class=" css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + name">
				{{title}}
			</button>

			<a v-on:click="setForm()" href="#" v-if="type == 'link'" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#' + name">
				{{title}}
			</a>	
		</span>

		<span v-if="!item">
			<button v-if="!type || (type != 'button' && type != 'link')" type="button" v-bind:class=" css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + name">
				{{title}}
			</button>

			<button v-if="type == 'button'" type="button" v-bind:class=" css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#' + name">
				{{title}}
			</button>

			<a href="#" v-if="type == 'link'" v-bind:class="css || ''" data-toggle="modal" v-bind:data-target="'#' + name">
				{{title}}
			</a>	
		</span>
		
	</span>    
</template>
 
<script>
    export default {
        props:['type', 'name', 'title', 'css', 'item', 'url'],
        methods:{
        	setForm:function(){
				//Get data by id, from table "locals" 				
				axios.get(this.url + this.item.id).then(res => {
        			this.$store.commit('setItem', res.data);
        		});
        	}
        }
    };
</script>


