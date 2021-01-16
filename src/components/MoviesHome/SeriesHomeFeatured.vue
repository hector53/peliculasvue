<template>
    <div>
            <div class="flex flex-row">
                <div class="flex flex-column poster poster-hg" v-for="(movie, index) in SeriesFeaturedHome2 " :key="index">
                    <div class="flex poster-media" >
                    <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
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
                                    <span class="episode-no">Temporada {{movie.temporadas}} · Capítulo {{movie.capitulos}}</span>
                                </p>
                            </div>
                            <img class="lazy-wide loaded"
                                :src="movie.imagen"
                                :alt="movie.titulo"
                               >
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="flex flex-row">
                <div class="flex poster poster-sm" v-for="(movie, index) in SeriesFeaturedHome " :key="index" >
                    <div class="poster-media">
                    <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                   
                            <div class="poster-subject">
                                <span class="date">
                                    <span class="date-text">{{movie.fecha}}</span>
                                </span>
                                <h2 class="truncate">{{movie.titulo}}</h2>
                                <p class="poster-meta truncate">
                                    <span class="episode-no">Temporada {{movie.temporadas}} · Capítulo {{movie.capitulos}}</span>
                                </p>
                            </div>
                            <img class="lazy-wide loaded imgSerieHomeFeatured"
                                :src="movie.imagen"
                                alt="The 100"
                                data-src="/uploads/series/cover/the-100-izle-1.jpg"
                                data-was-processed="true">
                        </router-link>
                    </div>
                </div>
                
            </div>
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'SeriesHomeFeatured',
   data (){
        return {
          SeriesFeaturedHome: [],
          SeriesFeaturedHome2: [],
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async SeriesHomeFeatured(){
           await fetch(this.urlProcesos+'wp-json/series/home_destacadas/post')
                    .then((r) => r.json())
                    .then((res) => {
                        this.SeriesFeaturedHome = res[0].SeriesDestacadasPeque;
                    this.SeriesFeaturedHome2 = res[0].SeriesDestacadasGrande
                    }
                    );
           }, 
    },
    mounted() {
     this.SeriesHomeFeatured();
    },
}
</script>