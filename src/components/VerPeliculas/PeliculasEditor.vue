<template>
<div class="dark-segment">
<div class="segment-title">Elegidas por el Editor</div>
<ul class="mofyeditors">
<li :data-tooltip="movie.titulo" data-position="top center" v-for="(movie, index) in arrayEditor" :key="index">
	<router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                   
			<div class="mofyeditors-box">
				<div class="mofyeditors-image">
					<img class="lazy-wide loaded" :src="movie.imagen" :alt="movie.titulo" >
				</div>
			</div>
		</router-link >
	</li>
</ul>
</div>
</template>


<script>
export default {
  name: 'PeliculasNotables',
   props: {
        arrayEditor:{
            type: Array, 
            required: true,
        },
    },
   data (){
        return {
        }
    },
    
    methods: {
        
    },
    mounted() {
    },
}
</script>