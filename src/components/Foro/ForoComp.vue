<template>
<div class="inner-content container" id="page-forum_topic">



<div class="ui grid">
	<nav class="forum-breadcrumb" aria-label="Migaja de pan">
		<ol>
			<li aria-current="page"><a href="forum" data-navigo=""><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Foro</font></font></a></li>
			<li aria-current="page"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Página de inicio</font></font></li>
		</ol>
	</nav>
</div>
<!-- // .grid -->

<div class="ui grid">

	<div class="left floated eight wide column">
		<h1 class="title-primary pt-sm"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Foros</font></font></h1>
		<div class="description-primary pb-0"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Foros de discusión donde puede expresar sus opiniones y hacer preguntas sobre todos los programas de televisión, películas y nuestro sitio.</font></font></div>
	</div>
	<!-- // #left -->

	<div class="right floated eight wide column">
		<div class="watch-together-button">
			<a href="forum/new" class="ui primary button mt-sm" onlyusers=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abrir tema nuevo</font></font></a>
		</div>
	</div>
	<!-- // #right -->

</div>
<!-- // #grid -->

<div class="ui dark card">
		<h2 class="header">
			<span class="segment-title">Secciones</span>
					</h2>
		<div class="content">
			<table class="ui inverted unstackable table">
			
				<tbody>
					<tr v-for="(movie, index) in arraySecciones" :key="index">
						
						<td class="poster">
                           <router-link @click.native="$store.commit('scrollToTop')" 
								:to="{name:'ForoVerSeccion', params: {foro_slug: movie.slug} }">
                        <img :src="movie.imagen" :alt="movie.titulo"></router-link></td>
						<td class="details">
							 <router-link @click.native="$store.commit('scrollToTop')" 
								:to="{name:'ForoVerSeccion', params: {foro_slug: movie.slug} }">
                                {{movie.titulo}}</router-link>
							<div class="category">{{movie.contenido}}</div>
						</td>
						<td class="type"><div class="ui black tiny label fontSize" >{{movie.cantidadTemas}} Temas</div></td>
						<td class="trend_point fontSize">{{movie.cantidadReply}} Comentarios</td>
					</tr>
																		
												</tbody>
			</table>
		</div>
	</div>





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
						<li class="story-list-item">
			<div class="list-story-upvote-grouper">
				<button aria-label="Puan Ver" title="Puan Ver" class="story-upvote-button upvoted" itemscope="true" itemtype="http://schema.org/LikeAction" data-fid="75" data-vote="1">
					<meta content="Puan Ver" itemprop="name">
					<meta content="/forum/genel/yuklenmesi-gereken-diziler-337841" itemprop="url">
					<svg width="10" height="6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg"><path d="M0 6l5-6 5 6z"></path></svg>
				</button>
				<span class="story-vote-count"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">208</font></font></span>
				<button aria-label="Puan Düşür" title="Puan Düşür" class="story-downvote-button" itemscope="true" itemtype="http://schema.org/LikeAction" data-fid="75" data-vote="2">
					<meta content="Puan Düşür" itemprop="name">
					<meta content="/forum/genel/yuklenmesi-gereken-diziler-337841" itemprop="url">	
					<svg width="10" height="6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg"><path d="M0 0l5 6 5-6z"></path></svg>
				</button>
			</div>
			<figure class="list-story-category">
				<a href="forum/genel" aria-label="deben cargarse matrices" data-navigo="">
					<img src="uploads/forum/cover-general-discussion.png" alt="deben cargarse matrices" class="lazy-wide loading" data-was-processed="true">
				</a>
			</figure>
			<div class="add-to-fav" data-tooltip="Favorilerden Kaldır" data-inverted="" data-position="left center">
				<button aria-label="Agregar a los favoritos" data-fid="75" data-favorite="1" class="story-starred"></button>
			</div>
			<h3 class="title-tertiary truncate mt-0 mb-0"><a href="forum/genel/yuklenmesi-gereken-diziler-337841" data-navigo=""><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">deben cargarse matrices</font></font></a></h3>
			<p class="description-quaternary mb-0 truncate"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cualquiera puede escribir la secuencia que quiere que se cargue en este tema. </font><font style="vertical-align: inherit;">Es más apropiado para mí recopilar las solicitudes bajo un título en términos de priorización.</font></font></p>
			<p class="description-quaternary mb-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1253 comentarios · Publicado hace 1 año </font><font style="vertical-align: inherit;">por </font></font><a href="profil/uygarkara" data-navigo=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Uygar</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .</font></font></p>
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
import Cookies from "js-cookie";

export default {
  name: 'ForoComp',
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
    
    arraySecciones: []
	
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
	
	
    methods: {
     async   getSecciones(){
            await fetch(
            this.urlProcesos +
            "wp-json/foro/all/?q=getSecciones&id_user="+this.id_user
            )
            .then((r) => r.json())
            .then((res) => {
            console.log(res);
            this.arraySecciones = res[0].secciones
            this.$store.state.skeleton = 1
            });
        }
           },
     components: {},
  mounted() {
   
        this.getSecciones()
           
  },
}
</script>
<style >
.fontSize{
    font-size: 11px!important;
}

</style>