<template>
   <div>

        <div class="inner-content container" id="page-index">
       
           
            
            <div class="featured-segment">
                <div class="flex flex-row">
                    <div class="flex flex-column">
                        <h2 class="segment-title">Series </h2>
                        <SeriesHomeFeatured />
                    </div>
                  <MovieHomeFeatured />                 
                  

                </div>
            </div>
        
          <TrailersSeriesHomeNewTemp />
          <SeriesLastCapHome />
          <SeriesHomeNotables />

                <div class="ui grid mt-0 mb-0">
                    <div class="left floated sixteen wide tablet eleven wide computer column pt-0 pb-0">
                        <LastMoviesHome />
                    </div>
                    <div class="right floated sixteen wide tablet five wide computer column pt-0 pb-0">
                       <SeriesHomeRanking />
                    </div>
                </div>
                <div class="dark-segment collection-list">
                    <div class="segment-title pb-5 pt-5">Colecciones Más Vistas</div>
                  <ColeccionesMasVistas />
                </div>
         
        </div>
    
          
</div>
</template>

<script>
// @ is an alias to /src
import SeriesHomeFeatured from '@/components/MoviesHome/SeriesHomeFeatured.vue'
import MovieHomeFeatured from '@/components/MoviesHome/MovieHomeFeatured.vue'
import TrailersSeriesHomeNewTemp from '@/components/MoviesHome/TrailersSeriesHomeNewTemp.vue'
import SeriesLastCapHome from '@/components/MoviesHome/SeriesLastCapHome.vue'
import SeriesHomeNotables from '@/components/MoviesHome/SeriesHomeNotables.vue'
import LastMoviesHome from '@/components/MoviesHome/LastMoviesHome.vue'
import SeriesHomeRanking from '@/components/MoviesHome/SeriesHomeRanking.vue'
import ColeccionesMasVistas from '@/components/Colecciones/ColeccionesMasVistas.vue'
export default {
  name: 'Home',
  components: {
    SeriesHomeFeatured, MovieHomeFeatured, TrailersSeriesHomeNewTemp, SeriesLastCapHome,
    SeriesHomeNotables, LastMoviesHome, SeriesHomeRanking, ColeccionesMasVistas
  }
}
</script>
