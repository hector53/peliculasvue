<template>
    <div>
        
 
        <div class="right aligned floated sixteen wide tablet seven wide computer column"
            id="series-action-buttons">
            <div class="button-group">
                <button v-if="id_user !=null" class="ui secondary scrolling button dropdown top right pointing" data-addcollections="3422"
                    tabindex="0">
                    <span>Agregar a Mi Colección</span>
                </button>
                <button v-if="id_sjp == null" class="ui secondary button fnc_addFollow" data-status="2"  @click="seguirPelicula()">{{textSeguir}} </button>
                <button v-else class="ui button fnc_addFollow primary" data-status="2"  @click="seguirPelicula()">{{textSeguir}}</button>
           
            </div>
        </div>
  
        
        </div>
</template>


<script>
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
          textSeguir: 'Seguir'
    
        }
    }, computed: {
    ...mapState(["urlProcesos"]),
  },
    methods: {
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
         
    },
    components:{
        Cookies
    }
}
</script>