<template>
<div>
    <div class="ui top right pointing dropdown" @click="perfilMenuUser()" v-click-outside="outPerfil" :class="{'active visible' : perfilMenu == 1}" tabindex="0">

		<div class="header-user-area">
			<div class="left floated header-user-level-display">
				<img class="ui avatar header-user-avatar" src="https://avatars.dicebear.com/api/bottts/hectoracosta53.svg" alt="@hectoracosta53">
				<div class="circle-progress" data-tooltip="5%" data-inverted="" data-position="bottom center" data-percent="5"><svg version="1.1" viewBox="0 0 100 100">					<circle class="ring" cx="-48" cy="48" fill-opacity="0" r="46" stroke-dashoffset="293" stroke-dasharray="307.65" transform="rotate(-90)"></circle>					</svg></div>
			</div>
			<div class="left floated">
				<span class="header-user-name truncate" :title="userName">{{userName}}</span>
				<span class="header-user-level">Level {{nivel}}</span>
			</div>
			<div class="left floated">
				<svg class="mofycon"><use xlink:href="#icon-arrow-down"></use></svg>
			</div>
		</div>

		<div class="menu" tabindex="-1" :class="{'visible op fade-in ' : perfilMenu == 1}" >
  <router-link class="item"  @click.native="$store.commit('scrollToTop')" 
   :to="{ name: 'PerfilUser', params: {user: userName} }">
      Perfil</router-link>
			<div class="divider"></div>
					  <router-link class="item"  @click.native="$store.commit('scrollToTop')" 
   :to="{ name: 'PerfilUser', params: {user: 'configuracion'} }">Configuración</router-link>
			<a href="" @click.prevent="logOut()" class="item">Salir</a>
		</div>

	</div>
</div>
</template>


<script>
import Cookies from "js-cookie";
import ClickOutside from 'vue-click-outside'
export default {
  name: 'DropdownPerfilMenu',
  props: ['id_user', 'nivel', 'userName' ],
   data (){
        return {
           perfilMenu: 0,
           
        }
    },
    components: {
    Cookies
  },
    methods: {
        perfilMenuUser(){
            if(this.perfilMenu == 0){
                    this.perfilMenu = 1
            }else{
                this.perfilMenu = 0
            }
      
    },
       
     outPerfil(){
       
          this.perfilMenu = 0
      },
      logOut(){
        Cookies.remove('user_session');
         
         window.location.href = window.location.origin
      }
        },
        directives: {
    ClickOutside
  }, 
    mounted() {
		
		
	},
	
}
</script>
<style>
.op{
  display: block !important;
}
.fade-in {
  animation: fadeIn ease 1s;
  -webkit-animation: fadeIn ease 1s;
  -moz-animation: fadeIn ease 1s;
  -o-animation: fadeIn ease 1s;
  -ms-animation: fadeIn ease 1s;
}
@keyframes fadeIn {
  0% {
    opacity:0;
  }
  100% {
    opacity:1;
  }
}

@-moz-keyframes fadeIn {
  0% {
    opacity:0;
  }
  100% {
    opacity:1;
  }
}

@-webkit-keyframes fadeIn {
  0% {
    opacity:0;
  }
  100% {
    opacity:1;
  }
}

@-o-keyframes fadeIn {
  0% {
    opacity:0;
  }
  100% {
    opacity:1;
  }
}

@-ms-keyframes fadeIn {
  0% {
    opacity:0;
  }
  100% {
    opacity:1;
}
}
</style>