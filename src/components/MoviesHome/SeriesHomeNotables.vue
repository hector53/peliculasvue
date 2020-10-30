<template>
    <div>
            <div class="dark-segment">
                        <div class="segment-title">Series Notables</div>
                        <ul class="clearfix new-tvseries">
                            <li class="segment-poster-sm" v-for="(movie, index) in SeriesHomeNotables" :key="index">
                                <div class="poster poster-xs">
                                <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                   
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
  name: 'SeriesHomeNotables',
   data (){
        return {
          SeriesHomeNotables: [],
        }
    },
    computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        async SeriesNotablesHome(){
           await fetch(this.urlProcesos+'wp-json/series/home_notables/post')
                    .then((r) => r.json())
                    .then((res) => {
                        this.SeriesHomeNotables = res[0].SeriesNotables;
                    }
                    );
           }, 
    },
    mounted() {
     this.SeriesNotablesHome();
    },
}
</script>