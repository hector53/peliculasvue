<template>
    <div>
        <div class="dark-segment">
            <div class="segment-title pt-lg">Ultimos Capítulos</div>
                <ul class="clearfix" id="result_lastEpisodes">
                    <li class="segment-poster-sm"  v-for="(movie, index) in SeriesLastCapHome" :key="index">
                        <div class="poster poster-xs">
                        <router-link @click="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                   
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
                <button type="button" class="ui button load-more series-load-more"
                :class="{'disabled' : btnCargarMas}" data-page="1" @click="cargarMas()">
                    <svg
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
          pag: 0, 
          btnCargarMas: false
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        cargarMas(){
            this.pag++; 
            this.btnCargarMas = true; 
            this.SeriesHomeLastCap()
        }, 
         SeriesHomeLastCap(){
            fetch(this.urlProcesos+'wp-json/series/home_lastcap/post/?pag='+this.pag)
                    .then((r) => r.json())
                    .then((res) => {
                        if(this.pag == 0){
                         this.SeriesLastCapHome = res[0].SeriesLastCapHome;
                        
                        }
                        if(this.pag > 0){
                            //sumar resultados al array
                            res[0].SeriesLastCapHome.forEach(child => {
                               // console.log(child)
                                this.SeriesLastCapHome.push(child); 
                            });
                                this.btnCargarMas = false; 
                        }
  this.$store.state.skeleton = 1
                    }
                    );
           }, 
    },
    mounted() {
     this.SeriesHomeLastCap();
    },
}
</script>