<template>
    <div>
        
 
        <div class="right aligned floated sixteen wide tablet seven wide computer column"
            id="series-action-buttons">
            <div class="button-group">
                <button  v-if="id_user !=null" 
                class="ui secondary scrolling button dropdown top right pointing" 
                :class="{'active visible' : dropdownColeccion == 1}"
                	v-click-outside="clickAfueraColeccion" @click="abrirColeccion()" 
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
</template>


<script>
import ClickOutside from 'vue-click-outside'
import {mapState} from 'vuex'
import Cookies from "js-cookie";
export default {
  name: 'BreadCrumbsSeries',
    props: {
        movieID:{
            type: String,
            required: true
        }
    },
    data (){
        return {
         
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
         clickAfueraColeccion(){
            this.dropdownColeccion = 0
           },
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
          "wp-json/series/seguir_serie/post/?q="+f+"&id_user="+this.id_user+"&id_movie="+this.movieID)
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
       
       }, 
          async ContVisit(){
                 await fetch(this.urlProcesos+'wp-json/visitas/contador/?q=2&id_post='
                 +this.movieID)
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
                    }
                    );
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
         this.ContVisit()
    },
    components:{
        Cookies
    },
       directives: {
    ClickOutside
  }, 
}
</script>