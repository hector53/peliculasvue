<template>
    <div>
        <div class="dark-segment">
            <div class="segment-title pt-lg">Ultimos Capítulos</div>
                <ul class="clearfix" id="result_lastEpisodes">
                    <li class="segment-poster-sm"  v-for="(movie, index) in SeriesLastCapHome" :key="index">
                        <div class="poster poster-xs">
                        <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                   
                                <span class="date">
                                
                                </span>
                                    <div class="poster-subject">
                                    <h2 class="truncate"><font style="vertical-align:inherit">
                                    <font style="vertical-align:inherit">{{movie.titulo}}</font></font></h2>
                                    <p class="poster-meta">
                                    <span class="episode-no"><font style="vertical-align:inherit">
                                    <font style="vertical-align:inherit">Temporada {{movie.temporadas}} Capitulo {{movie.capitulos}}</font></font></span>
                                 
                                    </p>
                                    </div>
                            <img class="lazy-wide loaded" 
                            :alt="movie.titulo" 
                            :src="movie.imagen" width=120; height=120; 
                             style="background-blend-mode:normal!important;background-clip:content-box!important;background-position:50% 50%!important;background-color:rgba(0,0,0,0)!important;background-image:var(--sf-img-41)!important;background-size:cover!important;background-origin:content-box!important;background-repeat:no-repeat!important" />
                            </router-link>
                        </div>
                    </li>
                </ul>
                <button type="button" class="ui button load-more series-load-more" data-page="1"><svg
                        class="mofycon">
                        <use xlink:href="#icon-plus"></use>
                    </svg>Cargar Más</button>
            </div>
    </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'SeriesLastCapHome',
   data (){
        return {
          SeriesLastCapHome: [],
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async SeriesHomeLastCap(){
           await fetch(this.urlProcesos+'wp-json/series/home_lastcap/post')
                    .then((r) => r.json())
                    .then((res) => {
                        this.SeriesLastCapHome = res[0].SeriesLastCapHome;
                    }
                    );
           }, 
    },
    mounted() {
     this.SeriesHomeLastCap();
    },
}
</script>