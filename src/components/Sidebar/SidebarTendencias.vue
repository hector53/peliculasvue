<template>
 <section class="guide-menu">
							<h5 class="section-heading">Tendencias Series</h5>
							<ul class="trending-thisweek">
								<li v-for="(movie, index) in arrayDatos" :key="index">
						<router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
										<h5 class="truncate" title="Friends izle">#{{movie.titulo}}</h5>
										<small>+{{movie.visitas}} visitas</small>
									</router-link>
								</li>
								
							</ul>
						</section>
</template>


<script>

import {mapState} from 'vuex'

export default {
  name: "SidebarTendencias",
  
  data() {
    return {
	  arrayDatos: []
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
   
  methods: {
	  	 async getTendenciasSeries(){

            await     fetch( this.urlProcesos +"wp-json/tendencias/all/?q=getS")
            .then((r) => r.json())
            .then((res) => {
               //   console.log(res)
                this.arrayDatos = res
              
            });

        }
    },
  mounted() {
      this.getTendenciasSeries()
  },
  updated() {
      
  },

 
};
</script>
<style >

</style>