<template>
<div>
    <button v-if="id_sjp == null" class="ui secondary button fnc_addFollow"
     data-status="2"  @click="seguirPelicula()">{{textSeguir}} </button>
    <button v-else class="ui button fnc_addFollow primary" data-status="2"  
    @click="seguirPelicula()">{{textSeguir}}</button>

</div>
</template>


<script>

import {mapState} from 'vuex'
export default {
  name: "Seguir",
    props: ['userName', 'id_user', 'id_actor', 'tipo' ],
  data() {
    return {
          id_sjp: null, 
          textSeguir: 'Seguir', 
    };
  },
    computed:{
        ...mapState(['urlProcesos'])
    },
  methods: {
  

async getPeliculaSeguida(f){
             if(f == 'post' || f == 'del'  ){
                 this.textSeguir = 'Cargando...'
             }
            await fetch(this.urlProcesos +
          "wp-json/seguir/all/?q="+f+"&id_user="+this.id_user
          +"&id_seguir="+this.id_actor+"&tipo="+this.tipo)
                    .then((r) => r.json())
                    .then((res) => {
                       
                       console.log(res)
                        this.id_sjp = res[0].id_sjp
                         console.log(this.id_sjp)
                         if(f == 'post'){
                              this.textSeguir = 'Siguiendo'
                            }

                           
                        
                         if(res[0].id_sjp == null){
                           this.$emit("getSeguidores");
                              this.textSeguir = 'Seguir'
                            }else{
                              this.$emit("getSeguidores");
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
                    this.getPeliculaSeguida('post');
               }else{
                   //dejar de seguir
                   this.getPeliculaSeguida('del');
               }
           }
       
       }, 


    },
  mounted() {
  this.getPeliculaSeguida('get')
  },
  updated() {
      
  },

 
};
</script>
<style >


</style>