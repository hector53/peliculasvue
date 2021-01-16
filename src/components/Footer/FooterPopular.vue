<template>
<div>
  <div class="ui three column doubling grid" v-for="(movie, index) in arrayPopulares" :key="index">
					<div class="column">
						<h6>Categorías Populares</h6>
						<div class="ui two column doubling grid">
							<div class="column">
								<div class="ui link list">

						<router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'categoriaSerie', params: {slug: movie2.slug} }"
						 v-for="(movie2, index) in movie.categoriasSeries" :key="index"
						 >
						{{movie2.cat_name}}</router-link >
									
								</div>
							</div>
							<div class="column">
								<div class="ui link list">
								<router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'categoriaMovie', params: {slug: movie2.slug} }"
						 v-for="(movie2, index) in movie.categoriasMovies" :key="index"
						 >
						{{movie2.cat_name}}</router-link >
								</div>
							</div>
						</div>
					</div>
					<div class="column">
						<h6>Series y Películas Destacadas</h6>
						<div class="ui two column doubling grid">
							<div class="column">
								<div class="ui link list">
								<router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'detalleSeries', params: {slug: movie2.post_name} }"
						 v-for="(movie2, index) in movie.seriesDestacadas" :key="index"
						 >
						{{movie2.post_title}}</router-link >
								</div>
							</div>
							<div class="column">
								<div class="ui link list">
									<router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'detallePeliculas', params: {slug: movie2.post_name} }"
						 v-for="(movie2, index) in movie.moviesDestacadas" :key="index"
						 >
						{{movie2.post_title}}</router-link >
								</div>
							</div>
						</div>
					</div>
					<div class="column">
						<h6>Series y Películas Populares</h6>
						<div class="ui two column doubling grid">
							<div class="column">
								<div class="ui link list">
									<router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'detalleSeries', params: {slug: movie2.post_name} }"
						 v-for="(movie2, index) in movie.seriesPopulares" :key="index"
						 >
						{{movie2.post_title}}</router-link >
								</div>
							</div>
							<div class="column">
								<div class="ui link list">
									<router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'detallePeliculas', params: {slug: movie2.post_name} }"
						 v-for="(movie2, index) in movie.moviesPopulares" :key="index"
						 >
						{{movie2.post_title}}</router-link >
								</div>
							</div>
						</div>
					</div>
				</div>
</div>
</template>


<script>

import {mapState} from 'vuex'

export default {
  name: "FooterPopular",
  
  data() {
    return {
      arrayPopulares: []
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
   
  methods: {

	  async getPopular(){

              await fetch(this.urlProcesos+'wp-json/footer/options/?q=2')
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
					 this.arrayPopulares = res
                  
                    }
                    );

        }

    },
  mounted() {
	  	this.getPopular()
  },
  updated() {
      
  },

 
};
</script>
<style >

</style>