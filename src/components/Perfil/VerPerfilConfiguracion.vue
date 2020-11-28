<template>
<div class="inner-content container" id="page-profile">
	
		 
		 <div class="bg-cover-faker">

	<div class="ui grid mt-0">
		<div class="left floated sixteen wide tablet eight wide computer column">
			<h1 class="title-primary pt-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Configuración de mi cuenta</font></font></h1>
			<div class="description-primary pb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aquí puede cargar su foto de perfil, editar su información personal y cambiar su contraseña si lo desea.</font></font></div>
		</div>
		<div class="right floated sixteen wide tablet eight wide computer column" id="di-all-items">
			<div class="watch-together-button">
          <router-link class="ui secondary button"  @click.native="$store.commit('scrollToTop')" 
   :to="{ name: 'PerfilUser', params: {user: userName} }">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Volver al perfil</font></font></router-link>
			</div>
		</div>
	</div>

	<div id="series-tabs" class="ui pointing secondary menu">
		<a class="item" :class="{'active' : tab1}" @click.prevent="clickTab(1)" data-tab="first"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informacion personal</font></font></a>
		<a class="item" :class="{'active' : tab2}" @click.prevent="clickTab(2)" data-tab="second"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cambia la contraseña</font></font></a>
		<a class="item" :class="{'active' : tab3}" @click.prevent="clickTab(3)" data-tab="third"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Medios de comunicación social</font></font></a>
	</div>

	<div class="ui form" id="profile-settings">

		<div class="ui tab tab-segment" :class="{'active' : tab1}" data-tab="first">
			<form class="profile_settings" enctype="multipart/form-data">
				<div class="ui column grid mt-lg">
					<div class="sixteen wide tablet six wide computer column">
						<div class="section-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Foto de perfil</font></font></div>
						<div class="global-box story-itself p-lg">
							<div class="text-center flex-column" style="width: 100%;">
								<div>
									<label for="file">
										<img  :src="imagenPerfil"
										 id="avatar" class="ui circular image" style="width: 120px; height: 120px;">
									</label>
								</div>
								<div>
									<label for="file" role="button" class="ui secondary button mt-md"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sube una foto</font></font></label>
									<input type="file" id="file" @change="previewFiles" accept="image/x-png,image/gif,image/jpeg" style="display: none;">
								</div>
								<div class="mt-md description-quaternary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Puedes subir tu foto como JPG, GIF o PNG.</font></font></div>
							</div>
						</div>
					</div>

					<div class="sixteen wide tablet ten wide computer column">
						<div class="section-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informacion personal</font></font></div>
						<div class="global-box p-lg">
							<div class="field">
								<label for="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombres</font></font></label>
								<input type="text" name="name" id="name" placeholder="" v-model="nombreUser" autocomplete="name">
							</div>
							<div class="field">
								<label for="user_name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre de usuario</font></font></label>
								<input disabled="" type="text" name="user_name" v-model="userName" id="user_name" autocomplete="username">
								<small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Su dirección de perfil: https://yabancidizi.pw/profil/hectoracosta53 (El nombre de usuario no se puede cambiar).</font></font></small>
							</div>
							<div class="field">
								<label for="email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tu correo electrónico</font></font></label>
								<input type="email" name="email" placeholder="" v-model="emailUser" id="email" autocomplete="email">
							</div>
							
							<div class="field">
								<label for="bio"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Acerca de</font></font></label>
								<textarea rows="3" name="bio" id="bio" v-model="acercadeUser"></textarea>
							</div>
							<div>
								<button class="ui primary button" @click.prevent="clickUpdateConfig()"  type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Actualizar información</font></font></button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- // .tab-segment -->

		<div class="ui tab tab-segment" :class="{'active' : tab2}" data-tab="second">
			<form id="change_pass">
				<div class="ui column grid mt-lg">
					<div class="sixteen wide tablet six wide computer column">
						<div class="section-heading">Información</div>
						<div class="alert alert-info">Su contraseña debe tener al menos 4 caracteres</div>
					</div>
					<div class="sixteen wide tablet ten wide computer column">
						<div class="section-heading">Cambiar Contraseña</div>
						<div class="global-box p-lg">
							<div class="field">
								<label for="old">Contraseña Actual: </label>
								<input type="password" name="old" id="old" placeholder="" v-model="passOld" autocomplete="current-password">
							</div>
							<div class="field">
								<label for="new">Contraseña Nueva: </label>
								<input type="password" name="new" id="new" placeholder="" v-model="passNew" autocomplete="new-password">
							</div>
							<div>
								<button class="ui primary button"  @click.prevent="UpdatePassword()" type="submit">Actualizar Contraseña</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- // .tab-segment -->

		<div class="ui tab tab-segment" :class="{'active' : tab3}" data-tab="third">
			<form class="change_social">
				<div class="ui column grid mt-lg">
					<div class="sixteen wide tablet six wide computer column">
						<div class="section-heading">Información</div>
						<div class="alert alert-info">Si tiene cuentas de redes sociales, puede permitir que otros usuarios lo encuentren ingresando su nombre de usuario aquí.</div>
					</div>
					<div class="sixteen wide tablet ten wide computer column">
						<div class="section-heading">Redes Sociales</div>
						<div class="global-box p-lg">
							<div class="field">
								<label for="twitter_username">Nombre de Usuario Twitter</label>
								<input type="text" name="twitter_username" id="twitter_username" v-model="twitter_username" >
							</div>
							<div class="field">
								<label for="instagram_username">Nombre de Usuario Instagram</label>
								<input type="text" name="instagram_username" id="instagram_username"  v-model="instagram_username" >
							</div>
							<div class="field">
								<label for="facebook_username">Nombre de Usuario Facebook</label>
								<input type="text" name="facebook_username" id="facebook_username"  v-model="facebook_username" >
							</div>
							<div>
								<button class="ui primary button" @click.prevent="clickUpdateConfig()" type="submit">Actualizar Información</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- // .tab-segment -->

	</div>
	<!-- // #profile-settings -->

</div>
<!-- // .bg-cover-faker -->
			</div>
</template>

<script>
// @ is an alias to /src
import {mapState} from 'vuex'


export default {
  name: 'VerPerfilConfiguracion',
  props: {
		 id_user:{
            type: String, 
            required: true,
		},
		userName:{
            type: String, 
            required: true,
		},
	
    },
   data (){
        return {
            tab1: true, 
            tab2: false,
            tab3: false, 
			twitter_username: "",
			arrayConfig: [], 
			 imagenPerfil: "", 
            nombreUser: "", 
            emailUser: "", 
            acercadeUser: "", 
            twitter_username: "", 
            facebook_username: "", 
			instagram_username: "", 
			passOld: "", 
			passNew: "", 
			previewImage: null, 
			image:null
        
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
	async UpdatePassword(){
		if(this.passOld.length == 0){
				this.$swal({
					icon: 'error',
					title: 'Contraseña Antigua Vacia'
				})
				return false
		}
			if(this.passNew.length == 0){
				this.$swal({
					icon: 'error',
					title: 'Contraseña Nueva Vacia'
				})
				return false
		}
            await fetch(this.urlProcesos +
		  "wp-json/perfil/usuario/post/?q=UpdatePass&id="+this.id_user+
		  "&passOld="+this.passOld+"&passNew="+this.passNew)
                    .then((r) => r.json())
                    .then((res) => {
						console.log(res)
                        if(res[0].error == ''){
								const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      Toast.fire({
                        icon: 'success',
                        title: 'Contraseña Actualizada con Exito !'
					  }); 
					//  this.$router.go()
						}else{
								this.$swal({
									icon: 'error',
									title: res[0].error
								})
									return false
						}
                    }
                    );

		}, 
  async updateSocialUsers(){
            await fetch(this.urlProcesos +
		  "wp-json/perfil/usuario/post/?q=Update&id="+this.id_user+"&username="+this.userName+
		  "&twitter_username="+this.twitter_username
		  +"&facebook_username="+this.facebook_username+"&instagram_username="+this.instagram_username+
		  "&nombreUser="+this.nombreUser+"&emailUser="+this.emailUser+"&acercadeUser="+this.acercadeUser)
                    .then((r) => r.json())
                    .then((res) => {
                        if(res[0].error == ''){
								const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      Toast.fire({
                        icon: 'success',
                        title: 'Actualizado con Exito !'
					  }); 
					//  this.$router.go()
						}
                    }
                    );
           },

        clickUpdateConfig(){

                this.updateSocialUsers();
            
                
		},
		 async getUserData(){
            await fetch(this.urlProcesos +
          "wp-json/perfil/usuario/post/?q=getC&id="+this.id_user+"&username="+this.userName)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                     //   this.arrayUserData = res
                     this.imagenPerfil = res[0].imagen_perfil; 
                     this.nombreUser = res[0].nombre; 
                     this.emailUser = res[0].email; 
                     this.acercadeUser = res[0].acercade; 
                     this.twitter_username = res[0].twitter; 
                     this.facebook_username = res[0].facebook; 
                     this.instagram_username = res[0].instagram; 
                      this.$store.state.skeleton = 1
                    }
                    );
           },
       clickTab(num){
           if(num == 1){
                this.tab1 = true
                 this.tab2 = false
                  this.tab3 = false
           }
           if(num == 2){
                this.tab2 = true
                this.tab3 = false
                this.tab1 = false
           }
           if(num == 3){
                this.tab3 = true
                this.tab1 = false
                this.tab2 = false
           }
	   }, 
	    previewFiles(e) {
	 const image = e.target.files[0];
	 this.image = e.target.files[0];
	 console.log(image)
                const reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e =>{
					this.previewImage = e.target.result;
					this.$swal.fire({
					title: '¿Estas Seguro?',
					text: 'Se cambiara tu foto de perfil',
					imageUrl: this.previewImage,
					imageWidth: 120,
					imageHeight: 120,
					imageAlt: 'Imagen Perfil Nueva',
					  confirmButtonClass: 'swal2-confirm ui button primary mr-xs',
					  cancelButtonClass: 'swal2-cancel ui button secondary ml-xs',
				 buttonsStyling: false, 
				  showLoaderOnConfirm: true,
				 customClass: {
						image: 'ui circular image',
					}, 
					showCancelButton: true,
					confirmButtonText: 'Okey',
  					cancelButtonText: 'Cancelar',
				 preConfirm: (register) => {
					 const formData = new FormData();

					formData.append('file', this.image);
					formData.append('id_user', this.id_user);
            const requestOptions = {
					method: "POST",
					
					body: formData
				};
            return fetch(this.urlProcesos +
          "wp-json/upload/imagen_perfil/post/", requestOptions)
             .then((r) => r.json())
                    .then((res) => {
                    if(res[0].error == ''){
                     console.log(res) 
                         return res
                     }else{
						 console.log(res) 
                          this.$swal.showValidationMessage(
                              res[0].error
                              )
                     }
                      
                    }
                    );
     
          }, 
           allowOutsideClick: () => !this.$swal.isLoading(), 
           }).then((result) => {
              if (result.isConfirmed) {
					  this.imagenPerfil = this.previewImage
					  
              }
            })
                 
                };
   }
       },
     components: {
      
      }, 
  mounted() {
	this.getUserData()
	 
    },
    created(){
	}, 
	beforeMount(){
		
	}
}
</script>
<style >
.swal2-popup.swal2-toast {
    background: #831919!important;
}
</style> 