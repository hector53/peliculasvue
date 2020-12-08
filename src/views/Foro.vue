<template>
<div>
<ForoComp :id_user="id_user" :userName="userName" v-if="foro == 1"  />
<ForoVerSeccion :id_user="id_user" :userName="userName" v-if="foro == 2"  />
<ForoVerTema :id_user="id_user" :userName="userName" v-if="foro == 3" :seccionTitulo="seccionTitulo"  />
<ForoNewTema :id_user="id_user" :userName="userName" v-if="foro == 4" :seccionTitulo="seccionTitulo"  />

</div>

</template>

<script>
import ForoComp from '@/components/Foro/ForoComp.vue'
import ForoVerSeccion from '@/components/Foro/ForoVerSeccion.vue'
import ForoVerTema from '@/components/Foro/ForoVerTema.vue'
import ForoNewTema from '@/components/Foro/ForoNewTema.vue'
// @ is an alias to /src
import {mapState} from 'vuex'
import Cookies from "js-cookie";

export default {
  name: 'Foro',
   data (){
        return {
    id_user: null, 
    userName: null, 
    foro: null,
    seccionTitulo: null

	
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
	
	
    methods: {
     capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
           },
     components: {Cookies, ForoComp, ForoVerSeccion, ForoVerTema, ForoNewTema},
  mounted() {
   
      var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
       this.userName = co.user_login
     
        }
      console.log(this.$route.params.foro_slug )
         if(this.$route.params.foro_slug == null){
             this.foro = 1; 
         }else{
           if(this.$route.params.tema_slug == null){
                this.foro = 2
           }else{
             var str = this.$route.params.foro_slug;
              var res = str.replaceAll('-', ' ')
               this.seccionTitulo = this.capitalizeFirstLetter(res); 
             if(this.$route.params.tema_slug == 'new'){
                this.foro = 4
             }else{
               this.foro = 3
             }
             


           }
             
         }
  },
}
</script>
<style >
.fontSize{
    font-size: 11px!important;
}

</style>