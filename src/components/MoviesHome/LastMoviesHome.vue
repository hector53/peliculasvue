<template>
   <div>
        <div class="dark-segment">
        <div class="segment-title">Ultimas Películas</div>
        <ul class="flex flex-wrap flex-home"> 
            <li class="mofy-moviesli" v-for="(movie, index) in LastMoviesA " :key="index">
                <div class="mofy-movbox">
                    <div class="mofy-movbox-image relative">
                    <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                        
                            <img class="lazy-wide loaded lastMoviesHomeclass"
                                :src="movie.imagen2"
                                :alt="movie.titulo" >
                            <div class="mofy-movbox-on absolute">
                                
                                <div
                                    class="mofy-movpoint flex items-center justify-between absolute">
                                    <span class="flex items-center">
                                        <svg>
                                            <path
                                                d="M12.3 4.1l-3.5-.5-1.6-3.2c-.2-.5-1.2-.5-1.4 0l-1.6 3.2-3.5.5c-.7.1-.9.9-.5 1.4l2.6 2.5-.6 3.5c-.1.7.6 1.2 1.2.9l3.1-1.6 3.1 1.6c.6.3 1.3-.2 1.2-.9l-.6-3.5 2.5-2.5c.5-.5.3-1.3-.4-1.4z">
                                            </path>
                                        </svg>
                                        {{movie.imdb}}
                                    </span>
                                    <p>{{movie.fecha}}</p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="mofy-movbox-text">
                        <span class="block">
                        <router-link :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                               
                                {{movie.titulo}}
                            </router-link>
                        </span>
                        <p class="truncate">{{movie.genero}}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'LastMoviesHome',
   data (){
        return {
          LastMoviesA: [],
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async lastMovies(){
           await fetch(this.urlProcesos+'wp-json/peliculas/home_destacadas2/post')
                    .then((r) => r.json())
                    .then((res) => {
                      //  console.log(res)
                        this.LastMoviesA = res[0].PeliculasDestacadas2;
                    }
                    );
           }, 
    },
    mounted() {
     this.lastMovies();
    },
}
</script>