<template>
<div>
    <ul class="flex flex-wrap">
    <li class="mofy-moviesli" v-for="(movie, index) in arrayUltimas " :key="index" >
            <div class="mofy-movbox">
                    <div class="mofy-movbox-image relative">
                    <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                        
                            <img class="lazy-wide loaded lastMoviesHomeclass"
                                :src="movie.imagen2"
                                :alt="movie.titulo" >
                            <div class="mofy-movbox-on absolute">
                                
                                <div
                                    class="mofy-movpoint flex items-center justify-between absolute">
                                    <span class="flex items-center">
                                        <svg>
                                            <path
                                                d="M12.3 4.1l-3.5-.5-1.6-3.2c-.2-.5-1.2-.5-1.4 0l-1.6 3.2-3.5.5c-.7.1-.9.9-.5 1.4l2.6 2.5-.6 3.5c-.1.7.6 1.2 1.2.9l3.1-1.6 3.1 1.6c.6.3 1.3-.2 1.2-.9l-.6-3.5 2.5-2.5c.5-.5.3-1.3-.4-1.4z">
                                            </path>
                                        </svg>
                                        {{movie.imdb}}
                                    </span>
                                    <p>{{movie.fecha}}</p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="mofy-movbox-text">
                        <span class="block">
                        <router-link :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                               
                                {{movie.titulo}}
                            </router-link>
                        </span>
                        <p class="truncate">{{movie.genero}}</p>
                    </div>
                </div>
         </li>
          </ul>  

      <div class="ui pagination menu" >
<router-link class="item"   @click.native="$store.commit('scrollToTop')" 
	:to="{ name: 'VerPeliculasPag', params: {pag: 1}, query: urlTest }" rel="start"
	v-show="paginaActual > 1"
	 >&lt; Primero</router-link>
<router-link class="item"   @click.native="$store.commit('scrollToTop')" 
	:to="{ name: 'VerPeliculasPag', params: {pag: paginaActual - 1}, query: urlTest }" rel="prev"
	v-show="paginaActual > 1"
	 >&lt;</router-link>
	<router-link class="item"   @click.native="$store.commit('scrollToTop')" 
	 v-for="(n, index) in totalPaginas" :key="index"
	 :class="{'active' : n == paginaActual   }"
	:to="{ name: 'VerPeliculasPag', params: {pag: n}, query: urlTest }"
	v-show="n >= num_actual_ini && n <= num_actual_fin "
	>
	{{n}}</router-link>
	<router-link class="item"   @click.native="$store.commit('scrollToTop')" 
	:to="{ name: 'VerPeliculasPag', params: {pag: paginaActual + 1}, query: urlTest }" rel="next"
	v-show="paginaActual < totalPaginas"
	 >&gt;</router-link>
	<router-link class="item"   @click.native="$store.commit('scrollToTop')" 
	:to="{ name: 'VerPeliculasPag', params: {pag: totalPaginas}, query: urlTest }" rel="start"
	v-show="paginaActual < totalPaginas"
	 >Ultimo &gt;</router-link>		
    	</div>    
 
</div>
</template>


<script>
export default {
  name: 'UltimasPeliculas',
   props: {
        arrayUltimas:{
            type: Array, 
            required: true,
        },
        totalPaginas:{
			type: Number,
			required: true
		}, 
		paginaActual:{
			type: Number,
			required: true
		},
		num_actual_ini:{
			type: Number,
			required: true
		}, 
		num_actual_fin:{
			type: Number,
			required: true
        },
        urlTest:{
			type: Object,
			required: true
		},
    },
   data (){
        return {
        }
    },
    
    methods: {
        
    },
    mounted() {
    },
}
</script>