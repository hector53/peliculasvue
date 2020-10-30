<template>
      <div>
        <div class="dark-segment">
        <div class="segment-title">Trailers de las Proximas Temporadas</div>
        <ul id="latest_trailers">
            <li class=""  v-for="(movie, index) in TrailersSeriesHomeNewTemp" :key="index" >
            
                <a :href="movie.slug" @click.prevent="newTrailerSerie(movie.trailer)"
                    :title="movie.titulo">
                    <div class="trailer_simg">
                        <img class="lazy-wide loaded imgTrailerSerieHome"
                            :src="movie.imagen"
                            :alt="movie.titulo"
                            >
                    </div>
                    <h6>{{movie.titulo}}</h6>
                    <small class="desktop-only">Temporada {{movie.temporadas}}</small>
                    <small class="mobile-only">{{movie.temporadas}} Temporada</small>
                </a>
            </li>
        </ul>
    </div>
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'TrailersSeriesHomeNewTemp',
   data (){
        return {
           TrailersSeriesHomeNewTemp: []
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async TrailersHomeNewTemp(){
           await fetch(this.urlProcesos+'wp-json/series/home_trailers/post')
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
                        this.TrailersSeriesHomeNewTemp = res[0].SeriesHomeTrailers;
                    }
                    );
           }, 
           newTrailerSerie(trailer){
              //mostrar trailer de youtube 
              var youtube = trailer.split("=")
            //  console.log(youtube[1]);
              this.$swal({
                html:
                  '<iframe width="100%" height="300" src="https://www.youtube.com/embed/'+youtube[1]+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                  showConfirmButton: false,
                  showCloseButton: true,
                
              })
              return  
            }, 
    },
    mounted() {
     this.TrailersHomeNewTemp();
    },
}
</script>