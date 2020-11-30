<template>
    <div>
        <div class="ui grid">
        <div class="left floated left aligned nine wide column pb-0">
            <div class="series-genres pb-0">
                <div xmlns:v="http://rdf.data-vocabulary.org/#" class="Breadcrumb">
                    <span typeof="v:Breadcrumb">
                        películas
                    </span> &gt; <span typeof="v:Breadcrumb">
                    {{movieTitle}}</span>
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
                <span>{{fechaCreated}}</span>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="left floated sixteen wide tablet eight wide computer column">
            <a href="https://yabancidizi.vip/film/kill-chain" data-navigo="">
                <h1 class="page-title">{{movieTitle}}</h1>
            </a>
        </div>
        <div class="right aligned floated sixteen wide tablet eight wide computer column"
            id="series-action-buttons">
            <div class="button-group">
                <button  v-if="id_user !=null" 
                class="ui secondary scrolling button dropdown top right pointing" 
                :class="{'active visible' : dropdownColeccion == 1}"
                	v-click-outside="abrirColeccion" @click="abrirColeccion()" 
                    tabindex="0">
                    <span>Agregar a Mi Colección</span>
                    <div class="menu left transition" :class="{'hidden' : dropdownColeccion == 0, 'visible':dropdownColeccion == 1 }" tabindex="-1">
                        <a href="#" class="item cl_add_item" :class="{'active selected' : item.active == 1}" v-for="(item, index) in arrayMisColecciones" 
                        @click.prevent="agregarColeccion(item.id, item.active)"
                        :key="index">{{item.titulo}}</a>



                        
                        <div class="divider"></div>
                        <router-link class="item" @click.native="$store.commit('scrollToTop')" 
								 :to="{name:'Colecciones'}">Crear Colección
                        </router-link> 
                    </div>
                </button>
                <button v-if="id_sjp == null" class="ui secondary button fnc_addFollow" data-status="2"  @click="seguirPelicula()">{{textSeguir}} </button>
                <button v-else class="ui button fnc_addFollow primary" data-status="2"  @click="seguirPelicula()">{{textSeguir}}</button>
           
            </div>
        </div>
    </div>
        
        </div>
</template>


<script>
import ClickOutside from 'vue-click-outside'
import {mapState} from 'vuex'
import Cookies from "js-cookie";
export default {
  name: 'BreadCrumbsMovies',
    props: {
        movieTitle:{
            type: String, 
            required: true,
        },
        fechaCreated:{
            type: String,
            required: true
        },
        movieID:{
            type: String,
            required: true
        }
    },
    data (){
        return {
          BreadCrumbsMovies: [],
          id_user: null, 
          userName: null, 
          id_sjp: null, 
          textSeguir: 'Seguir', 
          dropdownColeccion: 0, 
          arrayMisColecciones: [], 
    
        }
    }, computed: {
    ...mapState(["urlProcesos"]),
  },
    methods: {
        async agregarColeccion(id, active){
            if(active == 0){
                       await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=c&id_user="+this.id_user+"&id_coleccion="
          +id+"&id_movie="+this.movieID)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      if(res[0].id_sjp == ""){
                            const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      Toast.fire({
                        icon: 'error',
                        title: 'No se pudo Guardar'
					  }); 
                      }else{
const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      Toast.fire({
                        icon: 'success',
                        title: 'Agregada a la Colección!'
					  }); 
                      }
                     this.getMisColecciones()
                    }
                    );
         //   console.log(id)
            }
          
        },
          async getMisColecciones(){
            await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=g&id_user="+this.id_user+"&id_movie="
          +this.movieID)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arrayMisColecciones = res[0].coleccion
                     
                    }
                    );
           }, 
       
        abrirColeccion(){
            if(this.dropdownColeccion == 0){
                this.dropdownColeccion = 1
            }else{
                this.dropdownColeccion = 0
            }
        },
         async getPeliculaSeguida(f){
             if(f == 'f' || f == 'u'  ){
                 this.textSeguir = 'Cargando...'
             }
            await fetch(this.urlProcesos +
          "wp-json/peliculas/seguir_pelicula/post/?q="+f+"&id_user="+this.id_user+"&id_movie="+this.movieID)
                    .then((r) => r.json())
                    .then((res) => {
                       
                       console.log(res)
                        this.id_sjp = res[0].id_sjp
                         console.log(this.id_sjp)
                         if(f == 'f'){
                              this.textSeguir = 'Siguiendo'
                            }

                           
                        
                         if(res[0].id_sjp == null){
                              this.textSeguir = 'Seguir'
                            }else{
                                this.textSeguir = 'Siguiendo'
                            }
 this.$store.state.skeleton = 1
                    }
                    );
           }, 
       seguirPelicula(){
           if(this.id_user == null){
 vm.$children[0].$refs.HeaderMovies.loginOpen()
           }else{
               if(this.id_sjp == null){
                    //seguir
                    this.getPeliculaSeguida('f');
               }else{
                   //dejar de seguir
                   this.getPeliculaSeguida('u');
               }
           }
       
       }
    },
    mounted() {
    var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
    this.userName = co.user_login
        }
         this.getPeliculaSeguida('g')
        this.getMisColecciones()
         
    },
    components:{
        Cookies
    }, 
    directives: {
    ClickOutside
  }, 
}
</script>