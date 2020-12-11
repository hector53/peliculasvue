<template>
<div>
    <VerPerfilUser v-if="verPerfilUser &&  id_user > 0" :login="login" :id_user="id_user" :userName="userName"/>
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
            login: null,
            arrayUserData: [], 
           
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
      
        async getUserByName(name){
            await fetch(this.urlProcesos+'wp-json/perfil/usuario/post/?q=getUser&username='
                 +name)
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
                        this.id_user = res[0].ID
                        this.userName = res[0].user_login
                        this.verPerfilUser = true; 
                        
                    }
                    );
      }
       },
     components: {
      VerPerfilUser, VerPerfilConfiguracion, Cookies
      }, 
  mounted() {


var co = Cookies.get("user_session"); 
     
          var param = this.$router.history.current.params.user; 
  if(co != undefined)
        {
          this.login = 1
        co = JSON.parse(co)
       this.id_user = co.user_id; 
       this.userName = co.user_login
        if(param == 'configuracion'){
             this.verConfiguracionUser = true; 
         }else{
             this.verPerfilUser = true; 
         }
     
        }else{
           this.login = 0
          this.getUserByName(param)
          
        }




    },
    created(){

    }
}
</script>
<style >

</style> 