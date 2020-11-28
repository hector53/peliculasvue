<template>
<div class="inner-content container" id="page-collection">

<div class="bg-cover-faker">
					<div class="right floated sixteen wide tablet three wide computer wide column">
				<div class="collection-delete" data-id="60479">
					<button class="ui primary button"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Eliminar colección</font></font></button>
				</div>
			</div>
			<div class="ui grid mt-0">
		<div class="left floated sixteen wide tablet sixteen wide computer column">
			<h1 class="page-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{titulo_coleccion}}</font></font></h1>
			<div class="sub-title pt-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{descripcion_coleccion}}</font></font></div>		</div>
	</div>
		<div id="collection-archive" class="dark-segment mt-lg">
	    
    	<ul class="clearfix mb-0">
	    
	    <li class="segment-poster" id="data_2662">
			<div class="poster poster-md">
				<div class="poster-media">
									    <div class="blurring dimmable image">
				      <div class="ui dimmer transition hidden">
				        <div class="content">
				          <div class="center">
				            <div class="ui red button colDelete" data-id="2662" data-col="60479"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Eliminar de la colección</font></font></div>
				          </div>
				        </div>
				      </div>
				  						<a href="film/la-belle-poque" data-navigo="">
						<img src="uploads/series/la-belle-poque.jpg">
						<div class="poster-overlay">
							<span class="item rating"><svg class="mofycon"><use xlink:href="#icon-star"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 7.5</font></font></span>
							<span class="item year"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2019</font></font></span>
						</div>
					</a>
				</div>
				<div class="poster-subject">
					<a href="film/la-belle-poque" data-navigo=""><h2 class="truncate"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los buenos tiempos</font></font></h2></a>
					<p class="poster-meta truncate">
						<span class="genres"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
							Drama, Comedia, Romance						</font></font></span>
					</p>
				</div>
			</div>
		</div></li><li class="segment-poster" id="data_1632">
			<div class="poster poster-md">
				<div class="poster-media">
									    <div class="blurring dimmable image">
				      <div class="ui dimmer transition hidden">
				        <div class="content">
				          <div class="center">
				            <div class="ui red button colDelete" data-id="1632" data-col="60479"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Eliminar de la colección</font></font></div>
				          </div>
				        </div>
				      </div>
				  						<a href="dizi/the-mandalorian-izle-6" data-navigo="">
						<img src="uploads/series/the-mandalorian-izle-6.jpg">
						<div class="poster-overlay">
							<span class="item rating"><svg class="mofycon"><use xlink:href="#icon-star"></use></svg><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 8.8</font></font></span>
							<span class="item year"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2019</font></font></span>
						</div>
					</a>
				</div>
				<div class="poster-subject">
					<a href="dizi/the-mandalorian-izle-6" data-navigo=""><h2 class="truncate"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">El mandaloriano</font></font></h2></a>
					<p class="poster-meta truncate">
						<span class="genres"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
							Ciencia ficción, Fantasía						</font></font></span>
					</p>
				</div>
			</div>
		</div></li>	    
		</ul>
			</div>
	
	<div class="common-lists pt-md">
		
		<h4 class="sidebar-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Comentarios ( </font></font><span id="review-count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> )</font></font></h4>
	
						
		
			</div>
</div>
			</div>
</template>

<script>

// @ is an alias to /src
import {mapState} from 'vuex'
import Cookies from "js-cookie";
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
	error: null
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
         async getMisColecciones(){
			 console.log(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=gc&username="+this.userName+"&slug="
          +this.$route.params.slug)
            await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=gc&username="+this.userName+"&slug="
          +this.$route.params.slug)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      if(res[0].error == ""){
						  this.titulo_coleccion = res[0].titulo; 
						  this.descripcion_coleccion = res[0].descripcion; 
						  this.id_coleccion = res[0].id; 
						  
					  }
                      this.$store.state.skeleton = 1
                    }
                    );
           }
           },
     components: {Cookies},
  mounted() {
     this.$store.state.skeleton = 1
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
}
</script>