<template>
  <ul class="clearfix">
                        <li class="segment-poster-sm" v-for="(movie, index) in arrayDatos" :key="index">
                            <div class="poster poster-sm">
                  <router-link @click.native="$store.commit('scrollToTop')"
                    :to="{ name: 'ColeccionDetalle', params: {username: movie.username, slug: movie.slug} }">
					
                                    <span class="date"></span>
                                    <div class="poster-subject">
                                       
                                        <p class="poster-meta">
                                            <span class="episode-no">{{movie.contador}} añadidas</span>
                                        </p>
                                        <h2>{{movie.titulo}}</h2>
                                    </div>
                                    <img :alt="movie.titulo" class="lazy-wide loaded"
                                        :src="movie.imagen"
                                        :data-src="movie.imagen"
                                        data-was-processed="true">
                                </router-link>
                            </div>
                        </li>
    </ul>
</template>


<script>

import {mapState} from 'vuex'

export default {
  name: "ColeccionesMasVistas",
  
  data() {
    return {
	  arrayDatos: []
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
   
  methods: {
	   async getMisColecciones(){
            await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=CMV")
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arrayDatos = res[0].coleccion
                
                    }
                    );
           },
    },
  mounted() {
    this.getMisColecciones()
  },
  updated() {
      
  },

 
};
</script>
<style >

</style>