<template>
<div class="inner-content container" id="page-collection">

<div class="bg-cover-faker">
					<div class="right floated sixteen wide tablet three wide computer wide column" v-if="error==false">
				<div class="collection-delete" >
					<button class="ui primary button"
           @click="eliminarColeccion()" v-if="$route.params.username == userName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Eliminar colección</font></font></button>
				</div>

        <div class="collection-delete" style="margin-top: 10px" >
					<button class="ui scrolling button dropdown top right pointing"
          :class="{'disabled' : disabled, 'secondary': publica == 0, 'primary' : publica == 1}"
           @click="hacerPublica()" v-if="$route.params.username == userName & p == 1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hacer Pública</font></font></button>
				</div>
			</div>
			<div class="ui grid mt-0" v-if="error==false">
		<div class="left floated sixteen wide tablet sixteen wide computer column" style="margin-top: 40px;">
			<h1 class="page-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{titulo_coleccion}}</font></font></h1>
			<div class="sub-title pt-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{descripcion_coleccion}}</font></font></div>		</div>
	</div>

		<div id="collection-archive" class="dark-segment mt-lg" v-show="skeleton==1" v-if="error==false">


<ul class="clearfix mb-0">
	    
	    <li class="segment-poster" v-for="(movie, index) in arrayMiColeccion" :key="index" >
			<div class="poster poster-md">
				<div class="poster-media">
				<div class="blurring dimmable image dimmed"
				    @mouseover="mouse_over(movie.id, 1)"
    				@mouseleave="mouse_over(movie.id, 2)"
				
				>
				      <div class="ui dimmer transition" :id="'dimmer'+movie.id"
					  
					 style="display: flex!important;" >
				        <div class="content">
				          <div class="center">
				            <div class="ui red button colDelete" v-if="$route.params.username == userName"
							@click="borrarItemColeccion(movie.id_seguimiento)">Borrar Colección</div>
				          </div>
				        </div>
				      </div>
				  <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: movie.post_type, params: {slug: movie.slug} }">
						<img :src="movie.imagen2" class="imagenPoster">
						<div class="poster-overlay">
							<span class="item rating"><svg class="mofycon"><use xlink:href="#icon-star"></use></svg> 6.5</span>
							<span class="item year">{{movie.year}}</span>
						</div>
					</router-link>
				</div>
				<div class="poster-subject">
				  <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: movie.post_type, params: {slug: movie.slug} }">
				
					<h2 class="truncate">{{movie.titulo}}</h2></router-link>
					<p class="poster-meta truncate">
						<span class="genres">
							{{movie.genero}}						</span>
					</p>
				</div>
			</div>
		</div></li>
		</ul>







 <ComentariosFlix v-if="skeleton==1 && error == false"  :post_id="id_coleccion" :id_user="id_user" :userName="$route.params.username" />


    
		</div>

    <div class="alert alert-danger" role="alert" v-if="error">
        {{errorMsj}}
		</div>

			<skeleton-loading v-show="skeleton==0">
            <row style="width:95%; margin:auto"
                :gutter="{
                    bottom: '15px'
                }"
            >
                <square-skeleton 
                    :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						 width: '50px',
                    }"
                >
                </square-skeleton>

            </row>
			<row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						 width: '150px',
                    }"
                >
                </square-skeleton>


			</row>
				<row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						
                    }"
                >
                </square-skeleton>


			</row>

				<row style="width:95%; margin:auto">
                    <column :span="8" :gutter="0">
                    <square-skeleton :backColor="'#1b1d26'"
						:count="1"
						:boxProperties="{
							top: '10px',
							height: '400px',
							
						}"
					>
					</square-skeleton>
                     </column>
                <column :span="20" :gutter="10">
                      	<square-skeleton :backColor="'#1b1d26'"
                            :count="5"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                             
                                
                            }"
                        >
                        </square-skeleton>
                        <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                               width: '150px',
                                
                            }"
                        >
                        </square-skeleton>
                         <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '60px',
                                height: '26px',
                               width: '100px',
                                
                            }"
                        >
                        </square-skeleton>
                         <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                               width: '100px',
                                
                            }"
                        >
                        </square-skeleton>
                </column>
		 	  


			</row>
            <row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="2"
                    :boxProperties="{
                        top: '10px',
                        height: '46px',
						
                    }"
                >
                </square-skeleton>


			</row>
        </skeleton-loading>
	

</div>
			</div>
</template>

<script>

// @ is an alias to /src
import {mapState} from 'vuex'
import Cookies from "js-cookie";
import ComentariosFlix from '@/components/Comentarios/ComentariosFlix.vue'
export default {
  name: 'ColeccionDetalle',
   data (){
        return {
    id_user: null, 
	userName: null, 
	arrayMiColeccion: [], 
	titulo_coleccion: null, 
	descripcion_coleccion: null, 
	id_coleccion: null, 
	error: null, 
  mouseOver: false, 
  error: false, 
  errorMsj: "", 
  disabled: false,
  publica: 0, 
  p: 0
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
	
	
    methods: {
		borrarItemColeccion(id){
		this.$swal.fire({
  title: 'Estas seguro de borrar este item de la colección?',
  text: "Esto no se puede revertir",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si borrar'
}).then((result) => {
  if (result.isConfirmed) {
    fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=dic&id_seguimiento="+id)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      if(res[0].error == ""){
						        const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      Toast.fire({
                        icon: 'success',
                        title: 'Borrado con exito'
					  }); 
					  this.getMisColecciones(this.id_user)
					  }
                     
                    }
					);
					 this.$store.state.skeleton = 0
  }
})
		 
	
   
    },
   async hacerPublica(){
    
 

      this.disabled = true

       await  fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=gcpublic&username="+this.$route.params.username+"&slug="
          +this.$route.params.slug+"&id_user="+this.id_user+"&id_coleccion="+this.id_coleccion+"&publica="+this.publica)
                    .then((r) => r.json())
                    .then((res) => {
                 //    console.log(res)
                          if(res[0].publica == 0){
                              this.$notify({ group: 'notificacionLikes',
                              text: 'Coleccion ya no esta disponible publicamente', 
                              type: 'info', 
                                duration: 2000, 
                                speed: 1000, 
                              
                              })
                          }else{
                             this.$notify({ group: 'notificacionLikes',
                              text: 'Coleccion disponible publicamente', 
                              type: 'success', 
                                duration: 2000, 
                                speed: 1000, 
                              
                              })
                          }
                          this.publica = res[0].publica
                           this.disabled = false
                    }
                    );
    }, 
		mouse_over(id, out){
			
			var element = document.getElementById("dimmer"+id)
		//	console.log(element)
		
			if(out == 1){
				element.classList.add('visible')
				element.classList.add('active')
	
			}
			if(out == 2){
				element.classList.remove('visible')
				element.classList.remove('active')
				element.classList.add('hidden')
			}
			
			
			
		

		},
         async getMisColecciones(id_user){
         
			this.arrayMiColeccion = []
            await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=gc&username="+this.$route.params.username+"&slug="
          +this.$route.params.slug+"&id_user="+id_user)
                    .then((r) => r.json())
                    .then((res) => {
						
                      console.log(res)
                      if(res[0].error == ""){
						  this.titulo_coleccion = res[0].titulo; 
						  this.descripcion_coleccion = res[0].descripcion; 
              this.id_coleccion = res[0].id_coleccion; 
          
              this.arrayMiColeccion = res[0].agregadas
              this.p = res[0].p
              this.publica = res[0].publica

              this.ContVisit()
					  }else{
              this.$router.push({  name: 'Colecciones' })
              this.error = true
              this.errorMsj = res[0].error
            }
                      this.$store.state.skeleton = 1
                    }
                    );
           }, 
           eliminarColeccion(){
             
             this.$swal.fire({
  title: 'Estas seguro de borrar la colección, perderas todo lo que hayas agregado en ella?',
  text: "Esto no se puede revertir",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si borrar'
}).then((result) => {
  if (result.isConfirmed) {
    this.$store.state.skeleton = 0
    fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=delC&id_coleccion="+this.id_coleccion)
                    .then((r) => r.json())
                    .then((res) => {

                      console.log(res)
                      if(res[0].error == ""){
						        const Toast = this.$swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      Toast.fire({
                        icon: 'success',
                        title: 'Borrado con exito'
					  }); 
					 
            }
      	this.$router.push({ name: 'Colecciones' })
      
                    }
					);
					 
  }
})
		 
	
   
		
           }, 

 async ContVisit(){
                 await fetch(this.urlProcesos+'wp-json/visitas/contador/?q=4&id_post='
                 +this.id_coleccion)
                    .then((r) => r.json())
                    .then((res) => {
                   //     console.log(res);
                    }
                    );
            }


           },
     components: {Cookies, ComentariosFlix},
  mounted() {
   
      var co = Cookies.get("user_session"); 
        if(co != undefined)
        {
        co = JSON.parse(co)
    this.id_user = co.user_id; 
       this.userName = co.user_login
        //listar colecciones 
       this.getMisColecciones(co.user_id)
        }else{
this.getMisColecciones(0)
        }

        
  },

  created() {
    this.$store.state.skeleton = 0
  },
}
</script>
<style >
.imagenPoster{
  height: 355px!important;
}

</style>