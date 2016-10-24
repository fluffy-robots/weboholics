<template>
    <div id="gallery-container" class="gallery-container">
    	<div 
        	v-for="image in images"
        	transition="slide"
			v-show="image.active"
			class="slide-container"
        	v-bind:class="{ 'active': image.active}"
        >
    		<img 
	        	v-bind:src="image.path"
	        	class="img-responsive"
	    	>	
	    	<div class="description">
	    	  <h1>{{image.title}}</h1>
			  {{image.description}}
			  <a href="{{image.link}}">Se mere her</a>
			</div>

		</div>

	    <div class="controls">
	    	
    		<a class="slide-btn" @click="prevImage"><i class="icons fa fa-angle-left"></i></a>
	    	<a class="slide-btn" @click="nextImage"><i class="icons fa fa-angle-right"></i></a>
        </div>
	</div>
</template>
<style>
	.active{
		
	}
	.slide-container {
		display: flex;
		padding: 10px;
		flex-direction: row;
		padding: 50px;
	}
	.slide-transition {
		transition: all 1s ease;
		position: absolute;
	}
	.slide-enter,.slide-leave{
		opacity: 0;
	}
	.gallery-container {
	    display: flex;
	    
	}
	.controls{    
		
		width:100%;
	    position: absolute;
	    display: flex;
	    justify-content: space-between;
	    height: 100%;
	    align-items: center;
	    padding-left: 10px;
	}	
	.description {
		color: #ffffff;
		padding: 10px;
		width: 50%;
	}
	
	.icons {
		color:  #ffffff;
		font-size: 50px;
		margin-right: 10px;
	}
	.icons:hover {
		opacity: 0.5;
		cursor: pointer;
	}
	.slide-btn {
		padding-right: 10px;
		padding-top: 10px;
		color: #ffffff;
	}
	a:hover  {
		opacity: 0.5;
		cursor: pointer;
	}
		@media (max-width: 740px) {
		.slide-container {
			flex-direction: column;
		}
		.description {
			width: 100%;
			text-align: center;
		}
		i {
			margin-top: -50px;
		}

	}
</style>
<script>
    export default {
        props:{
	    },
	    data(){
	        return{
	        	images: [
		        	{
		        		title: 'Billede 1',
		        		description: 'Praesent laoreet arcu fringilla, vulputate enim a, ornare ex. Curabitur non odio metus. Ut eu mollis arcu, ultricies ultricies nisi.',
		        		link: '#',
		        		path: 'http://placehold.it/500x500',
		        		active: true
		        	},
		        	{
		        		title: 'Billede 2',
		        		description: 'Ut eu mollis arcu, ultricies ultricies nisi. Praesent laoreet arcu fringilla, vulputate enim a, ornare ex. Curabitur non odio metus.',
		        		link: '#',
		        		path: 'http://placehold.it/500x500',
		        		active: false
		        	},
		        	{
		        		title: 'Billede 3',
		        		description: ' Curabitur non odio metus. Ut eu mollis arcu, ultricies ultricies nisi. Praesent laoreet arcu fringilla, vulputate enim a, ornare ex.',
		        		link: '#',
		        		path: 'http://placehold.it/500x500',
		        		active: false
		        	}
	        	]
	        }
	    },
	    computed: {
	        
	    },
	    methods: {
	    	nextImage: function(){
	    		let vm = this;
	    		let c = 0;
	    		let index = 0;
	    		vm.images.forEach(function(image){
	    			if(image.active){
	    				index = c;
	    			}else{
	    				c++;
	    			}
	    		});
	    		vm.images[index].active = false;
	    		index++;
	    		if(index >= vm.images.length){
	    			index = 0;
	    		}
	    		vm.images[index].active = true;
	    	},
	    	prevImage: function(){
	    		let vm = this;
	    		let c = 0;
	    		let index = 0;
	    		vm.images.forEach(function(image){
	    			if(image.active){
	    				index = c;
	    			}else{
	    				c++;
	    			}
	    		});
	    		vm.images[index].active = false;
	    		index--;
	    		if(index == -1){
	    			index = vm.images.length - 1;
	    		}
	    		vm.images[index].active = true;
	    	}
	    },
	    ready(){
	    }
    }
</script>