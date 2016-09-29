<template>
    <div id="gallery-container" class="gallery-container">
    	<div 
        	v-for="image in images"
        	transition="slide"
			v-show="image.active"
			class="col-md-6 slide-container"
        	v-bind:class="{ 'active': image.active}"
        >
    		<img 
	        	v-bind:src="image.path"
	    	>
	    	
	    	<div class="description">
			{{image.description}}
		</div>
	    <div class="controls">
	    	
    		<a @click="prevImage"><i class="icons fa fa-angle-left"></i></a>
	    	<a @click="nextImage"><i class="icons fa fa-angle-right"></i></a>
        </div>

    </div>
</template>
<style>
	.active{
		
	}
	.slide-container{
		display: flex;
		padding: 10px;
		flex-direction: row;
	}
	.slide-transition{
		transition: all 1s ease;
		position: absolute;
	}
	.slide-enter,.slide-leave{
		opacity: 0;
	}
	.gallery-container {
	    display: flex;
	    justify-content: space-around;
	}
	.controls{    
		width: calc( 100% + 60px);
	    position: absolute;
	    display: flex;
	    justify-content: space-between;
	    height: 100%;
	    align-items: center;
	    margin-left: -30px;
	}
	.description {
		color: #ffffff;
		padding: 10px;
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
		        		description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. In perferendis nihil ea id illum voluptatem totam at quae, harum a, voluptas, assumenda, eum facilis ipsum fugit odit dolorem magni mollitia?',
		        		path: 'http://placehold.it/500x500',
		        		active: true
		        	},
		        	{
		        		title: 'Billede 2',
		        		description: 'Maecenas in vehicula lorem, sed laoreet metus. Aliquam sodales, est vel porttitor elementum, orci magna luctus orci, vel dignissim orci elit et lectus. Cras finibus felis id libero lacinia fringilla. Aliquam erat volutpat. In et tincidunt augue. Quisque gravida nec turpis ut volutpat. Nullam eu est auctor, facilisis urna at, sollicitudin felis. Sed tristique ligula in posuere fermentum.',
		        		path: 'http://placehold.it/500x500',
		        		active: false
		        	},
		        	{
		        		title: 'Billede 3',
		        		description: 'Maecenas vitae purus ornare, euismod leo laoreet, auctor nulla. Vivamus viverra tortor a eros commodo, nec feugiat sapien aliquam. Phasellus consectetur nisi quis felis scelerisque, id ornare ex pretium. Mauris et ante eget ligula porttitor molestie. Integer malesuada nisi nunc, in pulvinar mi blandit ac.',
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