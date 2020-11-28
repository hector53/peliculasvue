<template>
<div>

    <div class="ui grid mt-0 mb-md">
		<div class="left floated sixteen wide tablet eight wide computer column">
			<h1 class="page-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mis colecciones</font></font></h1>
		</div>
		<div class="right floated sixteen wide tablet eight wide computer wide column" id="di-all-items">
						<div class="watch-together-button">
					<button class="ui primary button" id="newCollection" onlyusers="" @click="nuevaColeccion()"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear nueva colección</font></font></button>
				</div>
				</div>
	</div>

    <div class="dark-segment collection-list">
		<ul class="clearfix">
           <li class="segment-poster-sm" v-for="(movie, index) in arrayMisColecciones" :key="index">
				<div class="poster poster-sm">
                     <router-link @click.native="$store.commit('scrollToTop')"
                    :to="{ name: 'ColeccionDetalle', params: {username: userName, slug: movie.slug} }">
					
						<span class="date"></span>
						<div class="poster-subject">
							
							<p class="poster-meta">
								<span class="episode-no">0 añadidas</span>
							</p>
							<h2>{{movie.titulo}}</h2>
						</div>
						
					</router-link>
				</div>
			</li>
            		</ul>
	</div>


	<div class="dark-segment collection-list">
		
		<div v-if="id_user == null" class="alert alert-danger" role="alert"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		La creación de una colección es exclusiva de los miembros. </font><font style="vertical-align: inherit;">Inicie sesión para crear sus propias colecciones.
		</font></font>
        </div>	    	
        
    </div>

	

</div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import Cookies from "js-cookie";
export default {
  name: "MisColecciones",
  data() {
    return {
         id_user: null, 
         userName: null,
         arrayMisColecciones: []
    };
  },
  computed: {
    ...mapState(["urlProcesos"]),
  },
  methods: {
       async getMisColecciones(){
            await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=g&id_user="+this.id_user)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arrayMisColecciones = res[0].coleccion
                      this.$store.state.skeleton = 1
                    }
                    );
           },
      nuevaColeccion(){
           if(this.id_user == null){
 vm.$children[0].$refs.HeaderMovies.loginOpen()
           }else{
               //popup para crear la nueva coleccion
               	this.$swal({
                html:`
       <p><font style="vertical-align: inherit;">
       <font style="vertical-align: inherit;">Título de la colección</font>
       </font></p><input id="swal-input1" class="swal2-input">
       <p class="mb-0"><font style="vertical-align: inherit;">
       <font style="vertical-align: inherit;">Explicación</font>
       </font></p><textarea id="swal-input2" class="swal2-textarea"></textarea>
                ` ,
                title: 'Crear Nueva Colección',
                  showConfirmButton: true,
                   allowEnterKey: true,
      allowEscapeKey: true,
				  showCloseButton: true,
				  confirmButtonClass: 'swal2-confirm ui button primary mr-xs',
				 buttonsStyling: false, 
         confirmButtonText: `Crear`,
         showLoaderOnConfirm: true,
          preConfirm: (register) => {
           
            var titulo = document.getElementById("swal-input1").value; 
            var descripcion = document.getElementById("swal-input2").value; 
            
           if(titulo == ''){
               this.$swal.showValidationMessage(
               `Introducir Titulo`
              )
            }
           
            else if(descripcion == ''){
                this.$swal.showValidationMessage(
               `Introducir Explicación`
              )
            }
            
            else{
                 return fetch(this.urlProcesos+'wp-json/colecciones/crear_coleccion/post?q=c&id_user='+this.id_user
                 +'&titulo='+titulo+'&descripcion='+descripcion)
             .then((r) => r.json())
                    .then((res) => {
                     if(res[0].error == ''){
                       
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
                this.getMisColecciones()
            
            
              }
            })
           }
       
       }
  },
  components: {Cookies},
  mounted() {
      var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
       this.userName = co.user_login
        //listar colecciones 
        this.getMisColecciones()
        }
  },
};
</script>
