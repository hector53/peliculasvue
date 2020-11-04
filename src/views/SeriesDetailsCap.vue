<template>
  <div>
    <div class="inner-content container" id="page-series_detail" v-for="(movie, index) in SeriesDetails" :key="index">
      <div class="bg-cover-faker">
         <div data-gets="" data-type="vu">
            <center><a rel="nofollow" href="https://bit.ly/3cmEm3t" target="_blank" class="desktop-only"
                    style="margin:0 auto; width:1000px;height: 45px;display: block">
                    <img src="http://peliculasvue.local/wp-content/themes/moviesvue/img/bteyd.gif" alt="" width="1000px"
                        height="45" border="0" style="object-fit: unset">
                </a></center>
            <hr style="margin: 5px 0;border-color: #42e3d0;">
            <center><a rel="nofollow" href="https://bit.ly/2Xq3Tnl" target="_blank" class="desktop-only"
                    style="margin:0 auto; width:1000px;height: 45px;display: block">
                    <img src="http://peliculasvue.local/wp-content/themes/moviesvue/img/grnd.gif" alt="" width="1000px"
                        height="45" border="0" style="object-fit: unset">
                </a></center>
            <br>
        </div>

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
  <div class="player-seasons" > 
    <div v-swiper="swiperOptions">
    <div class="season-info">
          <ul>
            <li>Temporada</li>
                      <li  class="active">1</li>
                      <li class="">2</li>
                    </ul>
            
                </div>
    <div class="swiper-wrapper">
     
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
      <div class="swiper-slide" >
        <div class="episode-container">
					        <div class="ui checkbox ordi episode-no fnc_addWatch season_1" data-episode="27117" onlyusers="">
								<input type="checkbox" name="example" id="episode-27117" disabled="" tabindex="0" class="hidden">
								<label for="episode-27117"></label>
							</div>
							<a href="dizi/the-mandalorian-izle-4/sezon-1/bolum-1" class="episode-link" data-navigo="">
							<h3>Bölüm 1</h3>
						        <small class="truncate">Chapter 1: The Mandalorian</small>
						        <date datetime="2019-11-12">12 Kasım 2019</date>
							</a>
				        </div>
      </div>
  
    </div>
  </div>
    </div> 


        
      </div>
  
      <!-- // Common Lists -->


      <div class="common-lists">
        <div class="new-content">
          <h4 class="sidebar-heading">Genel Bakış</h4>
          <section class="episode-controls">
            <div class="show-info">
              <div>
                <img
                  src="uploads/series/all-creatures-great-and-small_thumb.jpg"
                />
                <div class="series-name">
                  <a
                    href="dizi/all-creatures-great-and-small"
                    title="All Creatures Great and Small izle"
                  >
                    <h2>All Creatures Great and Small</h2>
                  </a>
                  <button
                    class="ui secondary button fnc_addFollow"
                    data-status="2"
                    data-series="3315"
                    onlyusers=""
                  >
                    Takip Et
                  </button>
                </div>
              </div>
            </div>
          </section>
          <section class="episode-overview">
            <div class="info-section">
              <article>
                All Creatures Great and Small 1. Sezon 5. bölümünde; Darrowby
                Fuarı'nda ilk kez görev yapacak olan James'i zorlu bir macera
                beklerken Siegfried'in hayatında yeni bir dönem başlamak
                üzeredir. yabancidizi.org iyi seyirler diler.<br />
                <br />
                It's the Darrowby Show and James is pleased as punch that he has
                been given the honour of Attending Vet. But Siegfried and
                Tristan know the job is a poisoned chalice and reckon James
                won't last the day without throwing in the towel.
              </article>
              <br />
              <small>
                Bu bölüm özeti
                <a href="https://yabancidizi.pw/" title="yabancıdizi">
                  <img
                    src="https://yabancidizi.org/mofy/img/yd_mini.png"
                    class="ui avatar image ml-xs valign-bottom"
                  />
                  yabancıdizi
                </a>
                yapay zekası tarafından otomatik olarak oluşturuldu.
              </small>
            </div>
            <div class="like-section">
              <button
                class="ui secondary button fnc_addFeel"
                data-id="38466"
                data-type="1"
                data-status="1"
                onlyusers=""
              >
                <svg class="mofycon">
                  <use xlink:href="#icon-thumbs-up"></use>
                </svg>
                <span>2</span>
              </button>
              <button
                class="ui secondary button fnc_addFeel"
                data-id="38466"
                data-type="2"
                data-status="1"
                onlyusers=""
              >
                <svg class="mofycon">
                  <use xlink:href="#icon-thumbs-down"></use>
                </svg>
                <span>0</span>
              </button>
            </div>
          </section>
        </div>

        <h4 class="sidebar-heading">
          Yorumlar (<span id="review-count">0</span>)
        </h4>

        <div class="alert alert-danger" role="alert">
          Yorum alanı sadece üyelere özeldir.
          <a onlyusers="">Giriş Yap &amp; Kayıt Ol.</a>
        </div>

        <section class="user-reviews">
          <div class="ui list" id="review-list"></div>
          <!-- // .list -->
        </section>
        <!-- // .user-reviews -->
      </div>
      <!-- // .common-lists -->

      <div data-gets="" data-type="ftr"></div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import ReproductoresSeries from '@/components/SeriesDetails/ReproductoresSeries.vue'; 
import { directive } from 'vue-awesome-swiper'

// import style (>= Swiper 6.x)


export default {
  name: "SeriesDetailsCap",
  data() {
    return {
      SeriesDetails: [],
      tabTemp: 1,
      swiperOptions: {
          slidesPerView: 6,
          spaceBetween: 0,
          freeMode: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          }
          // Some Swiper option/callback...
        }
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
  components: {ReproductoresSeries},
      directives: {
    swiper: directive
  },
  mounted() {
      this.SeriesGetDetailsCapitulos();
  },
};
</script>

