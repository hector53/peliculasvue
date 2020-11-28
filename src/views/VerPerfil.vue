<template>
<div>
    <VerPerfilUser v-if="verPerfilUser" :id_user="id_user" :userName="userName"/>
    <VerPerfilConfiguracion v-if="verConfiguracionUser" :id_user="id_user" :userName="userName" />

</div>
</template>

<script>
// @ is an alias to /src
import {mapState} from 'vuex'
import Cookies from "js-cookie";
import VerPerfilUser from '@/components/Perfil/VerPerfilUser.vue'
import VerPerfilConfiguracion from '@/components/Perfil/VerPerfilConfiguracion.vue'
export default {
  name: 'VerPerfil',
   data (){
        return {
            verPerfilUser: false,
            verConfiguracionUser: false,
            userName: "", 
            id_user: "", 
            arrayUserData: [], 
           
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
      
       
       },
     components: {
      VerPerfilUser, VerPerfilConfiguracion, Cookies
      }, 
  mounted() {
    var co = Cookies.get("user_session"); 
     co = JSON.parse(co)
   console.log(co.user_id)
   this.id_user = co.user_id; 
   this.userName = co.user_login


  
         var param = this.$router.history.current.params.user; 
         if(param == 'configuracion'){
             this.verConfiguracionUser = true; 
         }else{
             this.verPerfilUser = true; 
         }

    },
    created(){

    }
}
</script>
<style >

</style> 