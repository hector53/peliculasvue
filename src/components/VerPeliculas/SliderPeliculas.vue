<template>
<div>
<VueSlickCarousel v-bind="settingsSlick" v-if="arrayPeliculas.length" >
    
          <div  class="poster poster-ks" v-for="(item, index) in arrayPeliculas" :key="index" >
<router-link target="_blank" :title="item.titulo" 
:to="{ name: 'detallePeliculas', params: {slug: item.slug} }">
            <img 
            :src="item.imagen"
             :alt="item.titulo" 
           class="lazy-wide loaded" >
             </router-link>
         </div>
          
     
    </VueSlickCarousel>
        
</div>

</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
  name: 'SliderPeliculas',
     props: {
        arrayPeliculas:{
            type: Array, 
            required: true,
        },
    },
    data (){
       return {
             settingsSlick:{
  "infinite": true,
  "centerPadding": "20px",
  "slidesToShow": 1,
  "slidesToScroll": 3,
  "variableWidth": true
            }
        }
    },
    
    methods: {
         
    },
      components: {
		VueSlickCarousel
         }, 
    mounted() {
    
    }
}
</script>