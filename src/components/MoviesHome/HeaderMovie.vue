<template>
  <div>
    <header id="header">
      <button style="cursor: pointer;" class="mobile-menu-trigger"
       @click="$store.state.dropdownHeader = !$store.state.dropdownHeader"><span></span></button>
      <div id="logo">
        <a href="#" data-navigo="">Peliculas Turkass</a>
      </div>
      <div id="header-middle">
        <div id="search">
          <div>
            <span class="deleteicon"></span>
            <label for="tvSearch">
              <input
                type="search"
                name="search"
                class="form-control deletable"
                autocomplete="off"
                id="tvSearch"
                placeholder="Buscar Películas y Series aquí"
				v-model="searchMovie"
				@change="movieSearch()"
				v-click-outside="clickAfuera"
				@click="clickAdentro()"
              />
            </label>
            <button type="button" aria-label="Dizi veya film ara">
              <svg class="mofycon">
                <use xlink:href="#icon-search"></use>
              </svg>
            </button>
          </div>
          <div id="search-results"  :class="{'ocultarBusqueda' : clickAfueraVar == true, 
		  'mostrarBusqueda' : clickAfueraVar == false
		   }">
            <div class="section-heading">Mejores Resultados</div>
            <div id="search-response">
              <div class="small-heading">Series</div>
              <div class="dark-segment">
                <ul class="clearfix" style="flex-wrap: wrap">
                  <li class="segment-poster-sm" v-for="(movie, index) in arrayBuscadorSerie" :key="index" >
                    <div class="poster poster-xs">
                    <router-link @click.native="$store.commit('scrollToTop'), linkOcultar()"  :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
				   		<div class="poster-subject">
                          <h2 class="truncate">{{movie.titulo}}</h2>
                        </div>
                        <img
                          alt="..."
                          class="lazy-wide loaded"
                          :src="movie.imagen"
                        />
                      </router-link>
                    </div>
                  </li>
                  
                </ul>
              </div>
              <div class="small-heading">Películas</div>
              <div class="dark-segment">
                <ul class="clearfix" style="flex-wrap: wrap">
                  <li class="segment-poster"  v-for="(movie, index) in arrayBuscadorPelicula" :key="index">
                    <div class="poster poster-md">
                      <div class="poster-media">
                       <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                    	<img :src="movie.imagen"
                        /></router-link>
                      </div>
                      <div class="poster-subject">
                       <router-link @click.native="$store.commit('scrollToTop')" :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                    		<h2 class="truncate">{{movie.titulo}}</h2></router-link>
                        <p class="poster-meta truncate">
                          <span class="genres">{{movie.year}}</span>
                        </p>
                      </div>
                    </div>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
        

        <div id="user" v-if="this.$store.state.sessionCookie">
				
<div class="right floated author">

	<DropdownPerfilMenu :id_user="id_user" :userName="userName" />

</div>

<div class="left floated notifications">

	<DropdownPerfilNotify />

</div>
			</div>


<div id="user" v-else >
          <div class="left floated author">
            <a class="ui button secondary" onlyusers="" @click.prevent="loginOpen()">Login</a>
            <a id="user-register" @click.prevent="registerOpen()" class="ui button secondary hidden-xs"
              >Register</a
            >
          </div>
        </div>


      </div>
    </header>
  </div>
  
</template>

<script>
import ClickOutside from 'vue-click-outside'
import { mapState } from "vuex";
import Cookies from "js-cookie";
import DropdownPerfilMenu from '@/components/Header/DropdownPerfilMenu.vue'
import DropdownPerfilNotify from '@/components/Header/DropdownPerfilNotify.vue'
export default {
  name: "HeaderMovie",
  data (){
        return {
		  searchMovie: "", 
		  clickAfueraVar: true, 
		  arrayBuscadorSerie: [],
      arrayBuscadorPelicula: [],
      id_user: 0,
      userName: "",
      reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
		}
	},
	computed: {
    ...mapState(["urlProcesos"]),
  },
	 watch: {
		 searchMovie(val){
			 console.log(val); 
			 this.clickAfueraVar = false; 
			 if(this.searchMovie.length > 0){
				 	this.buscadorGeneral()
			 }else{
				 this.clickAfueraVar = true; 
			 }
		 }
	 }
	 ,
	methods: {
  
		registerOpen(){
	this.$swal({
                html:`
        <form autocomplete="on"><input type="text" id="swrusername" placeholder="Nombre de usuario"
         class="swal2-input" autocomplete="on">
         <input type="text" id="swremail" placeholder="Tu correo electrónico" 
         class="swal2-input" autocomplete="on">
         <input type="password" id="swrpassword" placeholder="Contraseña"
          class="swal2-input" autocomplete="on">
          <input type="password" id="swrrpassword" placeholder="Contraseña de nuevo" 
          class="swal2-input" autocomplete="on">
          </form>
				<a id="reset-password" class="ui button secondary ml-xs"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Restablecer la contraseña</font></font></a>
				<a id="user-register" class="ui button secondary ml-xs"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrarse</font></font></a>
				` ,
                  showConfirmButton: true,
				  showCloseButton: true,
				  confirmButtonClass: 'swal2-confirm ui button primary mr-xs',
				 buttonsStyling: false, 
         confirmButtonText: `Registrarse`,
         showLoaderOnConfirm: true,
          preConfirm: (register) => {
            var username = document.getElementById("swrusername").value; 
            var email = document.getElementById("swremail").value; 
            var pass = document.getElementById("swrpassword").value; 
             var pass2 = document.getElementById("swrrpassword").value; 
            if(username == ''){
              this.$swal.showValidationMessage(
             `Introducir Nombre de Usuario`
              )
            }else if(email == ''){
               this.$swal.showValidationMessage(
               `Introducir Email`
              )
            }
           else if(!this.reg.test(email)){
                  this.$swal.showValidationMessage(
               `Email invalido`
              )
            } 
            else if(pass == ''){
                this.$swal.showValidationMessage(
               `Introducir contraseña`
              )
            }else if(pass2 == ''){
                this.$swal.showValidationMessage(
               `Introducir repetir contraseña`
              )
            }else if(pass != pass2){
                this.$swal.showValidationMessage(
               `Las contraseñas no coinciden`
              )
            }
            
            else{
                 return fetch(this.urlProcesos+'wp-json/registrar/usuario/post?username='+username+'&email='
                 +email+'&pass='+pass)
             .then((r) => r.json())
                    .then((res) => {
                     if(res[0].error == ''){
                //       console.log(res) 
                         return res
                     }else{
                          this.$swal.showValidationMessage(
                              res[0].error
                              )
                     }
                      
                    }
                    );
            }
     
          }, 
           allowOutsideClick: () => !this.$swal.isLoading(), 
           }).then((result) => {
              if (result.isConfirmed) {
            //    console.log(result)
             
           //   var inFifteenMinutes = new Date(new Date().getTime() + 15 * 60 * 1000);
              Cookies.set('user_session', result.value[0], {
                  expires: 1
              });
              this.$store.commit('enableordisableCookie', ({
                cookie: result.value[0], 
                confirm: true
              }));
            window.location.reload()
              }
            })
        
		},
		loginOpen(){
 				this.$swal({
                html:`
        <form autocomplete="on"><input type="text" id="swusername" 
        placeholder="Email" class="swal2-input" autocomplete="on">
        <input type="password" id="swpassword" placeholder="Contraseña" 
        class="swal2-input" autocomplete="on"></form>
        <a id="reset-password" class="ui button secondary ml-xs">
        <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">Restablecer la contraseña</font></font></a>
        <a id="user-register" class="ui button secondary ml-xs">
        <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;">Iniciar Sesión</font></font></a>
				` ,
                  showConfirmButton: true,
                   allowEnterKey: true,
      allowEscapeKey: true,
				  showCloseButton: true,
				  confirmButtonClass: 'swal2-confirm ui button primary mr-xs',
				 buttonsStyling: false, 
         confirmButtonText: `Iniciar Sesión`,
         showLoaderOnConfirm: true,
          preConfirm: (register) => {
           
            var email = document.getElementById("swusername").value; 
            var pass = document.getElementById("swpassword").value; 
            
           if(email == ''){
               this.$swal.showValidationMessage(
               `Introducir Email`
              )
            }
           else if(!this.reg.test(email)){
                  this.$swal.showValidationMessage(
               `Email invalido`
              )
            } 
            else if(pass == ''){
                this.$swal.showValidationMessage(
               `Introducir contraseña`
              )
            }
            
            else{
                 return fetch(this.urlProcesos+'wp-json/login/usuario/post?email='+email+'&pass='+pass)
             .then((r) => r.json())
                    .then((res) => {
                     if(res[0].error == ''){
                      // console.log(res) 
                         return res
                     }else{
                          this.$swal.showValidationMessage(
                              res[0].error
                              )
                     }
                      
                    }
                    );
            }
     
          },  allowOutsideClick: () => !this.$swal.isLoading(), 
           }).then((result) => {
              if (result.isConfirmed) {
            //    console.log(result)
             
           //   var inFifteenMinutes = new Date(new Date().getTime() + 15 * 60 * 1000);
              Cookies.set('user_session', result.value[0], {
                  expires: 1
              });
              this.$store.commit('enableordisableCookie', ({
                cookie: result.value[0], 
                confirm: true
              }));
            window.location.reload()
              }
            })
		},
		linkOcultar(){
		//		console.log("me fui"); 
				this.searchMovie = ""		
		},
			movieSearch(){
				if(this.searchMovie.length > 0){
				 	this.buscadorGeneral()
			 }else{
				 this.clickAfueraVar = true; 
			 }
			}, 
			clickAfuera(){
				this.clickAfueraVar = true; 
      }, 
     
			clickAdentro(){
				if(this.searchMovie.length > 0){
				this.clickAfueraVar = false; 
				}
				
			}, 
			async buscadorGeneral() {
						await fetch(
						this.urlProcesos +
							"wp-json/buscador/general/post/?q=" + this.searchMovie
						)
						.then((r) => r.json())
						.then((res) => {
							
							this.arrayBuscadorSerie = res[0].series
							this.arrayBuscadorPelicula = res[0].peliculas
						//	console.log(this.arrayBuscadorGeneral);
							
						});
             },
    },
    components:{
Cookies, DropdownPerfilMenu, DropdownPerfilNotify
    },
		directives: {
    ClickOutside
  }, 
  mounted() {
   // console.log(window.location.origin)
   //console.log(this.$store.state.arraySession)
    var co = Cookies.get("user_session"); 
    if(co != undefined){
      this.$store.commit('enableordisableCookie', ({
                cookie: co,
                confirm: true
              }));
               co = JSON.parse(co)
 //  console.log(co.user_id)
   this.id_user = co.user_id; 
   this.userName = co.user_login
    }

 
    
  },
};
</script>

<style>
.ocultarBusqueda{
	display: none;
}
.mostrarBusqueda{
	display: block;
}
.swal2-validation-message{
background: #452424!important;
    color: #fff!important;
    font-size: 14px!important;

    align-items: center!important;
    justify-content: center!important;
    padding: 15px 20px!important;
    overflow: hidden!important;
    margin: 20px 0 0 !important;
    border-radius: 2px!important;
}




</style>