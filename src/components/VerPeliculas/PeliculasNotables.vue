<template>
<div class="dark-segment">
<div class="segment-title">Películas Notables</div>
   <ul class="clearfix new-tvseries">
                            <li class="segment-poster-sm" v-for="(movie, index) in arrayNotables" :key="index">
                                <div class="poster poster-xs">
                                <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                   
                                        <img class="lazy-wide loaded"
                                            :src="movie.imagen"
                                            :alt="movie.titulo"
                                        >
                                    </router-link>
                                </div>
                            </li>
                        </ul>

</div>
</template>


<script>
export default {
  name: 'PeliculasNotables',
   props: {
        arrayNotables:{
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