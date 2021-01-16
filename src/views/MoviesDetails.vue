<template>
  
<div>
    <div class="inner-content container" id="page-series" v-for="(movie, index) in MoviesDetails" :key="index">

        
        <div class="bg-cover-faker">
         
           <BreadCrumbsMovies :movieID="movie.id" :movieTitle="movie.titulo" :fechaCreated="movie.fecha_created" />
          

            <ReproductoresMovies :movieID="movie.id"  :tituloSerie="movie.titulo" />
           
            <div class="mobile-only mb-lg"></div>
            <div data-gets="" data-type="va"></div>
            <section class="episode-overview mb-md">
                <div class="episode-likes">
                    <div class="ui grid">
                        <div class="left floated left aligned six wide column">
                        </div>
                        <div class="right floated right aligned ten wide tablet four wide computer column">
                            <button class="ui secondary button fnc_addFeel" data-id="38634" data-type="1" data-status="1"
                                onlyusers="">
                                <svg class="mofycon">
                                    <use xlink:href="#icon-thumbs-up"></use>
                                </svg>
                                <span>8</span>
                            </button>
                            <button class="ui secondary button fnc_addFeel" data-id="38634" data-type="2" data-status="1"
                                onlyusers="">
                                <svg class="mofycon">
                                    <use xlink:href="#icon-thumbs-down"></use>
                                </svg>
                                <span>5</span>
                            </button>
                            <div class="ui tiny progress mt-md">
                                <div class="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div data-gets="" data-type="vaa"></div>
            
            <div id="series-tabs" class="ui pointing secondary menu">
                <a class="item active" data-tab="first"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Visión de conjunto</font></font></a>
                <a class="item disabled" data-tab="third" disabled=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Discusiones</font></font></a>
                <a class="item disabled"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Compartir</font></font></a>
            </div>


            <div class="ui tab tab-segment active" data-tab="first">
                <div class="ui items">
                    <div class="item" id="series-profile-wrapper">
                        <a class="ui image" id="series-profile-image-wrapper">
                            <img class="series-profile-thumb"
                                :src="movie.imagen2"
                                :alt="movie.titulo">
                        </a>
                        <div class="content" id="series-profile-content-wrapper">
                            <article class="series-summary">
                                <div class="series-summary-wrapper">
                                    <h2 class="section-heading">Sinopsis</h2>
                                    <p id="tv-series-desc">
                                       {{movie.sinopsis}}
                                    </p>

                                </div>
                                <div class="ui list">
                                    <div class="item"><span class="label">Generos:</span> 
                    <router-link class="item" @click.native="$store.commit('scrollToTop')"
                         :to="{ name: 'categoriaMovie', params: {slug: genero.slug} }"
						 v-for="(genero, index) in movie.generos" :key="index"
						 >{{genero.genero}}</router-link></div>
                                </div>
                                
                                <div class="media-meta">
                                    <table class="ui unstackable single line celled table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div>País</div>
                                                    <div>{{movie.pais}}</div>
                                                </td>
                                                <td>
                                                    <div>Duración</div>
                                                    <div>{{movie.time}} min</div>
                                                </td>
                                                <td>
                                                    <div>Seguidores</div>
                                                    <div>0</div>
                                                </td>
                                                <td>
                                                    <div>IMDB</div>
                                                    <div class="color-imdb">{{movie.imdb}}</div>
                                                </td>
                                                <td>
                                                    <div>Año</div>
                                                    <div class="truncate">{{movie.ano}}</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="media-trailer" @click.prevent="newTrailerMovie(movie.trailer)" >
                                    <div class="ui items">
                                        <div class="item">
                                            <div class="image">
                                                <svg class="mofycon">
                                                    <use xlink:href="#icon-play"></use>
                                                </svg>
                                                <img
                                                    :src="movie.imagen1">
                                            </div>
                                            <div class="content">
                                                <div class="header">{{movie.titulo}}</div>
                                                <div class="meta">OFFICIAL TRAILER</div>
                                                <div class="extra">Mira el Trailer de {{movie.titulo}}</div>
                                                <div class="media-count">{{movie.ano}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
    
                <div class="common-lists pt-sm">
                    <div class="ui column grid">
                       
                        <ActoresMovies :arrayActoresMovie="movie.actores" />
                       <ComentariosFlix  :post_id="post_id" :id_user="id_user" :userName="userName" />
                    </div>
                </div>
            </div>
            <div class="ui tab tab-segment" data-tab="second">
                Second Tab
            </div>
            <div class="ui tab tab-segment" data-tab="third">
                Third Tab
            </div>
        </div>
      
    
    </div>
</div>
</template>

<script>
// @ is an alias to /src
import Cookies from "js-cookie";

import {mapState} from 'vuex'
import BreadCrumbsMovies from '@/components/MoviesDetails/BreadCrumbsMovies.vue'
import ReproductoresMovies from '@/components/MoviesDetails/ReproductoresMovies.vue'
import ActoresMovies from '@/components/MoviesDetails/ActoresMovies.vue'
import ComentariosFlix from '@/components/Comentarios/ComentariosFlix.vue'
export default {
  name: 'MoviesDetails',
   data (){
        return {
          MoviesDetails: [], 
             myText: "", 
             post_id: null, 
             id_user: null, 
          userName: null,
          
        }
    },
    
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
       
            async MoviesGetDetails(){
            await fetch(this.urlProcesos+'wp-json/peliculas/detalle_slug/post/?slug='+this.$route.params.slug)
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
                        this.MoviesDetails = res;
                        this.post_id = res[0].id 
             
                    }
                    );
           }, 
           newTrailerMovie(trailer){
              //mostrar trailer de youtube 
              var youtube = trailer.split("=")
            //  console.log(youtube[1]);
              this.$swal({
                html:
                  '<iframe  src="https://www.youtube.com/embed/'+youtube[1]+'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                  showConfirmButton: false,
                  showCloseButton: true,
                
              })
              return  
            },  
         
    },
     components: {
BreadCrumbsMovies, ReproductoresMovies, Cookies, ComentariosFlix, ActoresMovies
         }, 
  mounted() {
       var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
    this.userName = co.user_login
        }
            this.MoviesGetDetails();
    },
}
</script>

