<template>
  <div>
    <div class="inner-content container" id="page-series_detail" v-for="(movie, index) in SeriesDetails" :key="index">
      <div class="bg-cover-faker">
     

        <div class="series-genres">
            <span class="series-status aqua">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">En Emisión</font>
                </font>
            </span>
        </div>


         <div class="ui grid">
        <div class="left floated left aligned nine wide column pb-0">
            <div class="series-genres pb-0">
                <div xmlns:v="http://rdf.data-vocabulary.org/#" class="Breadcrumb">
                    <router-link @click.native="$store.commit('scrollToTop')"
                    :to="{ name: 'detalleSeries', params: {slug: $route.params.slug} }">
                    <span typeof="v:Breadcrumb">
                    {{movie.titulo}}</span></router-link>

                    &gt;   <router-link @click.native="$store.commit('scrollToTop')"
                    :to="{ name: 'detalleSeriesTemporadas', params: {slug: $route.params.slug, id_temp: $route.params.id_temp} }"><span typeof="v:Breadcrumb">
                    Temporada {{$route.params.id_temp }}</span></router-link>
                    &gt; Capitulo {{$route.params.id_cap }} ({{movie.titulo_cap}})
                </div>
            </div>
        </div>
        <div class="right floated right aligned six wide column pb-0">
            <div class="media-date">
                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.99 2c-5.52 0-9.99 4.48-9.99 10s4.47 10 9.99 10c5.53 0 10.01-4.48 10.01-10s-4.48-10-10.01-10zm.01 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                    </path>
                    <path d="M12.5 7h-1.5v6l5.25 3.15.75-1.23-4.5-2.67z"></path>
                </svg>
                <span>{{movie.fecha}}</span>
            </div>
        </div>
    </div>
    
       
       
       
       <div class="ui grid mt-0" style="margin-top: 1rem!important;">
		<div class="left floated sixteen wide tablet sixteen wide computer column">
			<h1 class="page-title">
                  <router-link @click.native="$store.commit('scrollToTop')"
                    :to="{ name: 'detalleSeries', params: {slug: $route.params.slug} }">
                {{movie.titulo}}</router-link>
                  <span class="light-title"> Temporada {{$route.params.id_temp }} - Capitulo {{$route.params.id_cap }}</span>
              </h1>
		</div>
			</div>

        <ReproductoresSeries :movieID="movie.id" :temporada_anterior="movie.temporada_anterior"
        :capitulo_anterior="movie.capitulo_anterior" :temporada_siguiente="movie.temporada_siguiente"
        :capitulo_siguiente="movie.capitulo_siguiente"
          />



          <br />
 
<SwiperSliderCaps />
        
      </div>
  
      <!-- // Common Lists -->


      <div class="common-lists">
        <div class="new-content">
          <h4 class="sidebar-heading">General</h4>
          <section class="episode-controls">
            <div class="show-info">
              <div>
                <img
                  :src="movie.imagen"
                />
                <div class="series-name">
                  <a
                    href=""
                    :title="movie.titulo"
                  >
                    <h2>{{movie.titulo}}</h2>
                  </a>
                
                </div>
              </div>
            </div>
          </section>
          <section class="episode-overview">
            <div class="info-section">
              <article>
                <p><b>{{movie.titulo}}  Temporada {{$route.params.id_temp}}  Capitulo {{$route.params.id_cap}}</b></p>
                {{movie.overview}}
              </article>
           
            </div>
           
          </section>
        </div>
        <ComentariosFlix  :post_id="movie.idcap" :id_user="id_user" :userName="userName" v-if="movie.idcap" />
        <!-- // .user-reviews -->
      </div>
      <!-- // .common-lists -->

      <div data-gets="" data-type="ftr"></div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Cookies from "js-cookie";
import { mapState } from "vuex";
import ReproductoresSeries from '@/components/SeriesDetails/ReproductoresSeries.vue'; 
import SwiperSliderCaps from '@/components/SeriesDetails/SwiperSliderCaps.vue'; 
import ComentariosFlix from '@/components/Comentarios/ComentariosFlix.vue'

export default {
  name: "SeriesDetailsCap",
    components: {ReproductoresSeries, SwiperSliderCaps, Cookies, ComentariosFlix},
  data() {
    return {
      SeriesDetails: [],
      tabTemp: 1,
        id_user: null, 
          userName: null,
      
    };
  },
  computed: {
    ...mapState(["urlProcesos"]),
  },
  methods: {
   
      async SeriesGetDetailsCapitulos() {
        await fetch(
          this.urlProcesos +
            "wp-json/series/detalle_slug_capitulo/post/?slug=" +
            this.$route.params.slug + "&temporada=" + this.$route.params.id_temp + 
            "&capitulo=" + this.$route.params.id_cap 
        )
          .then((r) => r.json())
          .then((res) => {
              console.log(res)
            this.SeriesDetails = res;
              this.$store.state.skeleton = 1
          });
      },

    newTrailerMovie(trailer) {
      //mostrar trailer de youtube
      var youtube = trailer.split("=");
      //  console.log(youtube[1]);
      this.$swal({
        html:
          '<iframe width="100%" height="300" src="https://www.youtube.com/embed/' +
          youtube[1] +
          '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        showConfirmButton: false,
        showCloseButton: true,
      });
      return;
    },
    changeTabTemp(index) {
      this.tabTemp = index;
    },
  },

   
  mounted() {
     var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
    this.userName = co.user_login
        }
      this.SeriesGetDetailsCapitulos();
     
     
  },
  
};
</script>

<style >
.new-content .episode-controls .show-info>div .series-name h2:after {
    display:none
   
}
</style>

