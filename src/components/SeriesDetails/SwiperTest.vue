<template>
     
 <div class="player-seasons" > 
     <div class="season-info">
      <ul>
          <li><font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Temporada</font></font></li>
        <li v-for="(temp, index) in 5" :key="index"
        @click="cambiarTemporada(temp, index)" 
        
        >{{index+1}}</li>
      </ul>
    </div>
<swiper class="swiper"  :options="swiperOptions"
 >
 
  <swiper-slide v-for="(cap, index) in 200" :key="index"
   >
      <div class="episode-container">
      

  


      <h3>Capitulo {{index}}</h3>
       <small class="truncate">Temporada {{index}}</small>
      <small class="truncate"> Titulo cambiante{{index}}</small>
    

      </div>
  </swiper-slide>
   
</swiper>

 
    </div> 


       
</template>


<script>

import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
export default {
  name: 'SwiperSliderCaps',
     components: { Swiper, SwiperSlide },
    
    data (){
       return {
           capitulosSlider: [],
           cantidadTemporadas: 0,
           temporadaTab: 0,
           capxActive: 0,
           mounted: 0,
            swiperOptions: {
            slidesPerView: 6,
            speed: 300,
            spaceBetween: 0,
            freeMode: true,
            // Some Swiper option/callback...
            }
        }
    },
    
    methods: {
     
        slidercambia(){
            console.log('Click slide!', this.$refs.mySwiper.$swiper.realIndex)


        }, 
        cambiarTemporada(cap, temp){
            console.log(cap)
           this.$children[0].$swiper.slideTo( (cap*9),1000, false );
           this.temporadaTab = temp;
           console.log("di clic a cambiar temporada")
        }
    },
    mounted() {
     console.log(this.$children[0].$swiper);
 
  
    },
    updated() {
 
        
    },
   
}




</script>