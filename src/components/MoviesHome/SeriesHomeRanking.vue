<template>
     <div>
        <div class="dark-segment">
                            <div class="segment-title" 
                            style="padding-bottom: 5px">Series Ranking
                            </div>
                            <ul class="clearfix">
                                <li class="segment-poster-sm"
                                 style="width:100%;padding:6.66px 10px"
                                  v-for="(movie, index) in SeriesHomeRank " :key="index">
                                    <div class="poster poster-xs">
                                    <router-link @click="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                   
                                            <div class="poster-subject">
                                                <h2 class="truncate">{{movie.titulo}}</h2>
                                                <p class="poster-meta">
                                                    <span class="episode-no">
                                                        <span class="item rating"><svg class="mofycon">
                                                                <use xlink:href="#icon-star"></use>
                                                            </svg> {{movie.imdb}}</span>
                                                        · {{movie.fecha}}
                                                    </span>
                                                </p>
                                            </div>
                                            <img class="lazy-wide loaded"
                                                :src="movie.imagen"
                                                :alt="movie.titulo"
                                          >
                                        </router-link>
                                    </div>
                                </li>
                            </ul>
                        </div>
        </div>
</template>


<script>
import {mapState} from 'vuex'

export default {
  name: 'SeriesHomeRanking',
   data (){
        return {
          SeriesHomeRank: [],
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async SeriesRankingHome(){
           await fetch(this.urlProcesos+'wp-json/series/home_ranking/post')
                    .then((r) => r.json())
                    .then((res) => {
                    //    console.log(res)
                        this.SeriesHomeRank = res[0].seriesRankingHome;
                    }
                    );
           }, 
    },
    mounted() {
     this.SeriesRankingHome();
   
    },
}
</script>