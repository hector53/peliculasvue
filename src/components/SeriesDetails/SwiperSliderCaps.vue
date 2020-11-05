<template>
      <div>
 <div class="player-seasons" > 
     <div class="season-info">
      <ul>
          <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Temporada</font></font></li>
        <li v-for="(temp, index) in cantidadTemporadas" :key="index"
        @click="cambiarTemporada(temp.capTemporada, index)" 
         :class="{'active': index == temporadaTab}" 
        >{{index+1}}</li>
      </ul>
    </div>
<swiper class="swiper" ref="mySwiper" :options="swiperOptions"
@slideChange="slidercambia()"  >
 
  <swiper-slide class="" v-for="(item, index) in capitulosSlider" :key="index"
   :class="{'active': index == capxActive}" 
   >
      <div class="episode-container">
      

    <router-link @click.native="$store.commit('scrollToTop')" class="episode-link"
    :to="{ name: 'detalleSeriesTemporadasCapitulos', 
    params: {slug: $route.params.slug, id_temp: item.temporada+1, id_cap: item.capx } }">


      <h3>{{item.capitulo}}</h3>
       <small class="truncate">Temporada {{item.temporada+1}}</small>
      <small class="truncate">{{item.titulo}}</small>
    
    </router-link>
      </div>
  </swiper-slide>
   
</swiper>

 
    </div> 


        </div>
</template>


<script>
import {mapState} from 'vuex'
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
            spaceBetween: 0,
            freeMode: true,
            // Some Swiper option/callback...
            }
        }
    },
     computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
         async SeriesGetCapitulosSlider() {
             
      await fetch(
        this.urlProcesos +
          "wp-json/series/detalle_slug_slider/post/?slug=" +
          this.$route.params.slug + "&temporada=" + this.$route.params.id_temp + 
            "&capitulo=" + this.$route.params.id_cap 
      )
        .then((r) => r.json())
        .then((res) => {
        //    console.log(res)
          this.capitulosSlider = res[0].AllCaps;
          this.cantidadTemporadas = res[0].cantidadTemporadas;
          this.temporadaTab = (this.$route.params.id_temp - 1); 
            this.capxActive = parseInt(res[0].capitulo_actual);
        //    console.log(this.capxActive);
           
//console.log(this.capitulosSlider, this.cantidadTemporadas )
        });
    },
        slidercambia(){
            console.log('Click slide!', this.$refs.mySwiper.$swiper.realIndex)


        }, 
        cambiarTemporada(cap, temp){
           this.$refs.mySwiper.$swiper.slideTo( cap,1000,false );
           this.temporadaTab = temp;
           console.log("di clic a cambiar temporada")
        }
    },
    mounted() {
     console.log(this.$refs.mySwiper.$swiper);
    this.SeriesGetCapitulosSlider();
  
    },
    updated() {
        if(this.mounted == 0){
        this.$refs.mySwiper.$swiper.slideTo( this.capxActive,0,false ); 
        this.mounted = 1;
        }
        
    },
   
}




</script>