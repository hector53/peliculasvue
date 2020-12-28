<template>
   <div>

        <div class="flex flex-column">
                        <h2 class="segment-title">Películas</h2>
                        <div class="flex flex-row">

                            <div class="flex poster poster-sm" v-for="(movie, index) in moviesFeatured " :key="index">
                                <div class="poster-media">
                        <router-link @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                                <div class="poster-subject">
                                <span class="date">
                                <span class="date-text">{{movie.fecha}}</span>
                                </span>
                                <h2 class="truncate">{{movie.titulo}}</h2>
                                <p class="poster-meta truncate">
                                    <span class="episode-no">{{movie.genero}}</span>
                                </p>
                            </div>
                            <img class="lazy-wide loaded imgHomeFeaturedPelis2"
                                :src="movie.imagen"
                                :alt="movie.titulo"
                                >
                                </router-link>    
                               
                                </div>
                            </div>
                            

                        </div>

                        <div class="flex flex-row">
                            <div class="flex flex-column poster poster-hg" v-for="(movie, index) in moviesFeatured2 " :key="index">
                                <div class="flex poster-media">
                                <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                                        <div class="poster-subject">
                                            <span class="date">
                                            <span class="date-text">{{movie.fecha}}</span>
                                            </span>
                                            <figure class="poster-img">
                                                <img :src="movie.imagen2"
                                                    :alt="movie.titulo">
                                            </figure>
                                            <h2 class="truncate">{{movie.titulo}}</h2>
                                            <p class="poster-meta truncate">
                                                <span class="episode-no"></span>
                                            </p>
                                        </div>
                                        <img class="lazy-wide loaded imgHomeFeaturedPelis"
                                            :src="movie.imagen"
                                            :alt="movie.titulo">
                                    </router-link>  
                                </div>
                            </div>
                        </div>

                    </div>
          
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'MovieHomeFeatured',
   data (){
        return {
           moviesFeatured: [],
          moviesFeatured2: []
    
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async MoviesHomeFeatured(){
           await fetch(this.urlProcesos+'wp-json/peliculas/home_destacadas/post')
                    .then((r) => r.json())
                    .then((res) => {
                      //  console.log(res);
                        this.moviesFeatured = res[0].PeliculasDestacadasPeque;
                         this.moviesFeatured2 = res[0].PeliculasDestacadasGrande
                    }
                    );
           }, 
    },
    mounted() {
     this.MoviesHomeFeatured();
    },
}
</script>