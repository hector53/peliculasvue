<template>
<div class="inner-content container" id="page-forum_topic">



<div class="ui grid">
	<nav class="forum-breadcrumb" aria-label="Migaja de pan">
		<ol>
			<li aria-current="page">
               	<router-link @click.native="$store.commit('scrollToTop')" 
								:to="{name:'Foro'}">
                    <font style="vertical-align: inherit;">
                    <font class="" style="vertical-align: inherit;">Foro</font></font>
                    </router-link></li>
			<li aria-current="page"><font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">{{seccionTitulo}}</font></font></li>
		</ol>
	</nav>
</div>
<!-- // .grid -->

<div class="ui grid">
		
		<div class="left floated eleven wide column">
			<div class="story-header">
				<figure class="list-story-category" style="    height: 80px;
    width: 70px;">
					<img :src="seccionImagen" alt="Discusión General" class="lazy-wide loading" data-was-processed="true">
				</figure>
				<h1 class="title-primary p-0 m-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{seccionTitulo}}</font></font></h1>
				<div class="description-primary pb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{seccionContenido}}</font></font></div>
			</div>
		</div>
		<!-- // .left -->
	
		<div class="right floated five wide column">
			<div class="watch-together-button">
        <router-link @click.native="$store.commit('scrollToTop')" class="ui primary button mt-sm" 
        :to="{name:'ForoVerTema', params: {foro_slug: $route.params.foro_slug, tema_slug: 'new' } }">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Abrir tema nuevo</font>
          </font>
        </router-link>
				
			</div>
		</div>
		<!-- // .right -->
	
	</div>
<!-- // #grid -->

<div class="ui grid">

	<div class="wide column">

		<nav class="sub-navigation mb-lg" aria-label="">
			<ul class="left floated sixteen wide tablet four wide computer column">
				<li><a href="forum" class="active" data-navigo=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">temas populares</font></font></a></li>
				<li><a href="forum/latest" data-navigo=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Temas Recientes</font></font></a></li>
									<li><a href="forum/favorites" data-navigo=""><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">mis favoritos</font></font></a></li>
							</ul>
		</nav><div class="story-list-items mb-lg">
	<div class="title-base">
		<h3 class="title-tertiary pt-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Discusiones más populares de la semana</font></font></h3>
	</div>
	<ul>
		<li class="story-list-item" v-for="(movie, index) in arrayTemas" :key="index">
			<div class="list-story-upvote-grouper">
				<button aria-label="Votar Positivo" title="Votar Positivo"
                 class="story-upvote-button upvoted" 
                 >
					<svg width="10" height="6" viewBox="0 0 10 6"
                     xmlns="http://www.w3.org/2000/svg"><path d="M0 6l5-6 5 6z"></path>
                     </svg>
				</button>
				<span class="story-vote-count"><font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">208</font></font></span>
				<button aria-label="Votar Negativo" title="Votar Negativo" class="story-downvote-button" 
                itemscope="true" itemtype="http://schema.org/LikeAction" data-fid="75" data-vote="2">
					<svg width="10" height="6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0l5 6 5-6z"></path></svg>
				</button>
			</div>
			<figure class="list-story-category">
				<a href="forum/genel" aria-label="deben cargarse matrices" data-navigo="">
					<img :src="movie.imagen" 
                    alt="deben cargarse matrices" class="lazy-wide loading"
                     data-was-processed="true">
				</a>
			</figure>
			<div class="add-to-fav" data-tooltip="Agregar a Favoritos"
             data-inverted="" data-position="left center">
				<button aria-label="Agregar a los favoritos" data-fid="75"
                 data-favorite="1" class="story-starred"></button>
			</div>
			<h3 class="title-tertiary truncate mt-0 mb-0">
                  <router-link @click.native="$store.commit('scrollToTop')" 
								:to="{name:'ForoVerTema', params: {foro_slug: $route.params.foro_slug, tema_slug: movie.slug+'.'+movie.id} }">
                 <font style="vertical-align: inherit;">
                     <font class="" style="vertical-align: inherit;">{{movie.titulo}}</font>
                     </font></router-link></h3>
			<p class="description-quaternary mb-0 truncate">
               
                    <font style="vertical-align: inherit;">
                      {{movie.contenido}}
                    </font>
                    
                         </p>
			<p class="description-quaternary mb-0">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        {{movie.cantidadReply}} comentarios · Publicado {{movie.fecha}} </font>
                        <font style="vertical-align: inherit;">por </font>
                        </font><a href="profil/uygarkara" data-navigo="">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">{{movie.autor}}</font>
                            </font></a><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> .</font>
                </font>
            </p>
		</li>
    			
    				</ul>
</div>

			</div>
</div>
			</div>
</template>

<script>

// @ is an alias to /src
import {mapState} from 'vuex'

export default {
  name: 'ForoVerSeccion',
    props: {
    userName: {
      type: String,
      required: true,
    },
     
     id_user: {
      type: String,
      required: true,
    },
    
  
  },
   data (){
        return {
    
    arrayTemas: [], 
    seccionId: null,
    seccionTitulo: null, 
    seccionContenido: null, 
    seccionImagen: null, 
    seccionSlug: null
	
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
	
	
    methods: {
     async   getTemas_seccion(){
            await fetch(
            this.urlProcesos +
            "wp-json/foro/all/?q=getTemabySlug&id_user="+this.id_user+"&slug="+this.$route.params.foro_slug
            )
            .then((r) => r.json())
            .then((res) => {
            console.log(res);
              this.$store.state.skeleton = 1
              this.seccionId = res[0].secciones[0].id; 
              this.seccionTitulo = res[0].secciones[0].titulo; 
              this.seccionContenido = res[0].secciones[0].contenido; 
              this.seccionImagen = res[0].secciones[0].imagen; 
              this.seccionSlug = res[0].secciones[0].slug; 
              this.arrayTemas = res[0].secciones[0].temas; 

            });
        }
           },
     components: {},
  mounted() {
   
    
        this.getTemas_seccion()
           
  },
}
</script>
<style >
.fontSize{
    font-size: 11px!important;
}

.list-story-category img {
    
    height: 100%!important;
  
}
.story-header .list-story-category {
    left: 10px!important;
}


</style>