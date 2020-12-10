<template>
<div class="inner-content container" id="page-index">
	
<section class="story-detail">

	

	<div class="ui grid">
		<nav class="forum-breadcrumb" aria-label="Breadcrumb">
			<ol>
				<li>	<router-link @click.native="$store.commit('scrollToTop')" 
								:to="{name:'Foro'}">Foro</router-link></li>
				<li>
                    <router-link @click.native="$store.commit('scrollToTop')" 
					:to="{name:'ForoVerSeccion', params: {foro_slug: $route.params.foro_slug} }">
                   {{seccionTitulo}}</router-link>
                </li>
			</ol>
		</nav>
	</div>
	<!-- // .grid -->

	<div class="ui grid" v-for="(movie, index) in arrayTema" :key="index">

		<div class="left floated thirteen wide column">
			<div class="story-header">
				<VotoForo :id_user="id_user" :id_tema="String(movie.id)" />
				<figure class="list-story-category" style="left: 40px!important;">
					<a href="forum/genel" title="Genel Tartışma" data-navigo="">
						<img :src="movie.imagen" alt="Genel Tartışma" class="lazy-wide loading" data-was-processed="true">
					</a>
				</figure>
				<h1 class="title-primary p-0 m-0">{{temaTitulo}}</h1>
				<div class="description-primary pb-0">{{temaReply}} comentarios </div>
			</div>
		</div>
		<!-- // .left -->

		<div class="right floated three wide column">
			<div class="add-to-fav" data-tooltip="Favorilerden Kaldır" data-inverted="" data-position="left center">
				<button aria-label="Favorilere Ekle" data-fid="75" data-favorite="1" class="story-starred"></button>
			</div>
		</div>
		<!-- // .right -->

	</div>
	<!-- // .grid -->

	<div class="ui grid">

		<section class="left floated sixteen wide tablet eleven wide computer column">

			<div class="generic-box mb-lg story-box story-itself">

				<div class="ui relaxed divided list">
					<div class="item">
						<i class="large middle aligned icon">
							<a href="profil/uygarkara" title="Uygar" data-navigo="">
								<img class="ui circular image"
                                :src="imagenPerfil" alt="Uygar" width="32" height="32">
							</a>
						</i>
						<div class="content">
							<h3 class="title-tertiary m-0"><a href="profil/uygarkara" title="Uygar" data-navigo="">{{temaAutor}}</a></h3>
							<div class="user-level">18. Seviye</div>
						</div>
												<div class="story-post-actions">
							<div class="ui top right pointing dropdown" tabindex="0">
								<svg class="mofycon"><use xlink:href="#icon-arrow-down"></use></svg>
								<div class="menu" tabindex="-1">
																											<a class="item" href="#">Şikayet Et</a>
								</div>
							</div>
						</div>
											</div>
				</div>

				<div class="sep"></div>
								<article class="description-primary-white mb-md" v-html="temaContenido">
							       
                                    </article>

				<footer class="description-tertiary ui grid">
					<time class="left floated six wide column" datetime="2019-02-14 01:39:37">{{temaFecha}}</time>
					<div class="right aligned floated six wide column post-share">
						<a rel="nofollow" data-tooltip="Facebook'ta Paylaş" data-inverted="" data-position="bottom center" title="Facebook'ta Paylaş" href="https://www.facebook.com/sharer.php?u=https://yabancidizi.pw/forum/genel/yuklenmesi-gereken-diziler-337841" target="_blank" class="mr-sm">
							<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" role="img">
								<title>Facebook'ta Paylaş</title>
								<desc>Facebook'ta Paylaş İkonu</desc>
								<path d="M15.574 0h-13.149c-1.34 0-2.426 1.086-2.426 2.426v13.149c0 1.34 1.086 2.426 2.426 2.426h6.485l.011-6.432h-1.671c-.217 0-.393-.176-.394-.393l-.008-2.073c-.001-.218.176-.396.394-.396h1.668v-2.003c0-2.325 1.42-3.591 3.494-3.591h1.702c.218 0 .394.177.394.394v1.748c0 .218-.176.394-.394.394h-1.044c-1.128 0-1.346.536-1.346 1.323v1.734h2.478c.236 0 .419.206.392.441l-.246 2.073c-.024.198-.192.348-.392.348h-2.222l-.011 6.432h3.859c1.34 0 2.426-1.086 2.426-2.426v-13.149c0-1.34-1.086-2.426-2.426-2.426z"></path>
							</svg>
						</a>
						<a rel="nofollow" data-tooltip="Twitter'da Paylaş" data-inverted="" data-position="bottom center" title="Twitter'da Paylaş" href="https://www.twitter.com/intent/tweet?text=https://yabancidizi.pw/forum/genel/yuklenmesi-gereken-diziler-337841" class="mr-sm">
							<svg width="18" height="18" viewBox="0 0 18 15" xmlns="http://www.w3.org/2000/svg" role="img">
								<title>Twitter'da Paylaş</title>
								<desc>Twitter'da Paylaş İkonu</desc>
								<path d="M17.714 1.742c-.4.177-.815.317-1.241.419.469-.446.822-1.004 1.021-1.627.057-.178-.136-.332-.297-.236-.593.352-1.231.615-1.897.784l-.119.015c-.121 0-.239-.045-.332-.127-.709-.625-1.621-.969-2.568-.969-.41 0-.823.064-1.229.19-1.258.39-2.229 1.428-2.534 2.709-.114.48-.145.961-.092 1.429l-.035.109-.107.049-.014-.001c-2.754-.256-5.238-1.583-6.994-3.736-.09-.11-.261-.096-.333.026-.344.59-.525 1.264-.525 1.951 0 1.052.423 2.043 1.157 2.766-.309-.073-.608-.188-.885-.343-.134-.075-.3.021-.301.175-.019 1.563.896 2.954 2.267 3.58l-.083.001c-.217 0-.437-.021-.654-.062-.151-.029-.278.115-.231.261.445 1.389 1.641 2.413 3.072 2.645-1.188.797-2.571 1.218-4.011 1.218h-.449c-.138 0-.255.09-.29.224-.035.132.029.271.147.34 1.622.944 3.473 1.443 5.352 1.443 1.645 0 3.184-.326 4.574-.97 1.274-.59 2.4-1.434 3.347-2.508.882-1 1.571-2.155 2.049-3.432.456-1.217.697-2.516.697-3.756v-.059c0-.199.09-.386.247-.514.596-.484 1.115-1.054 1.543-1.694.113-.169-.065-.381-.251-.298z"></path>
							</svg>
						</a>
						<a rel="nofollow" data-tooltip="WhatsApp'ta Paylaş" data-inverted="" data-position="bottom center" title="Twitter'da Paylaş" href="whatsapp://send?text=https://yabancidizi.pw/forum/genel/yuklenmesi-gereken-diziler-337841&amp;t=Yüklenmesi gereken diziler">
							<svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg" role="img">
								<title>WhatsApp'ta Paylaş</title>
								<desc>WhatsApp'ta Paylaş İkonu</desc>
								<path d="M9.002 0c4.962 0 8.998 4.038 8.998 9s-4.035 9-8.998 9c-1.83 0-3.528-.544-4.951-1.487l-3.459 1.106 1.122-3.344c-1.079-1.482-1.713-3.306-1.713-5.275 0-4.964 4.035-9 8.998-9h.005zm5.237 12.709c.217-.614.217-1.137.154-1.249-.064-.111-.238-.174-.503-.307-.264-.132-1.55-.767-1.793-.852-.238-.09-.466-.059-.646.196-.253.354-.502.714-.703.931-.159.169-.417.19-.635.1-.291-.121-1.106-.407-2.111-1.302-.779-.693-1.307-1.556-1.46-1.815-.153-.264-.016-.417.106-.56l.392-.434c.133-.153.207-.233.291-.413.09-.174.026-.354-.038-.487-.063-.133-.592-1.424-.809-1.947-.174-.417-.307-.433-.572-.444l-.302-.01c-.344 0-.703.101-.92.323-.264.27-.92.899-.92 2.19s.942 2.54 1.069 2.715c.133.174 1.836 2.862 4.481 3.958 2.068.857 2.682.777 3.152.677.687-.149 1.549-.657 1.766-1.27z"></path>
							</svg>
						</a>
					</div>
				</footer>

			</div>
			
						
			   <ComentariosForo v-if="temaID"  :post_id="String(temaID)" :id_user="id_user" :userName="userName" />

		
		</section>

		<aside class="right floated sixteen wide tablet five wide computer column">
				<ForoTemasRelacionados v-if="temaID" :id_tema="temaID"  />
		</aside>

	</div>
	<!-- // .grid -->
	</section>
			</div>
</template>

<script>

// @ is an alias to /src
import {mapState} from 'vuex'
import ComentariosForo from '@/components/Comentarios/ComentariosForo.vue'
import VotoForo from '@/components/Foro/VotoForo.vue'
import ForoTemasRelacionados from '@/components/Foro/ForoTemasRelacionados.vue'
export default {
  name: 'ForoVerTema',
    props: {
    userName: {
      type: String,
      required: true,
    },
     
     id_user: {
      type: String,
      required: true,
    },
  seccionTitulo: {
      type: String,
      required: true,
    },
  },
   data (){
        return {
    
    arrayTema: [], 
    seccionId: null,
    temaTitulo: null, 
    temaContenido: null, 
    temaImagen: null, 
    temaSlug: null, 
    temaReply: 0, 
    temaAutor: null, 
    temaFecha: null, 
    imagenPerfil: null, 
    temaID: null
	
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
	
	
    methods: {
     async   getTemas_seccion(){
         console.log(  this.urlProcesos +
            "wp-json/foro/all/?q=getDetailTema&id_user="+this.id_user+"&slug="+this.$route.params.tema_slug
            )
            await fetch(
            this.urlProcesos +
            "wp-json/foro/all/?q=getDetailTema&id_user="+this.id_user+"&slug="+this.$route.params.tema_slug
            )
            .then((r) => r.json())
            .then((res) => {
            console.log(res);
              this.$store.state.skeleton = 1
              this.arrayTema = res[0].tema
              this.temaID = res[0].tema[0].id
              this.temaTitulo = res[0].tema[0].titulo
              this.temaImagen = res[0].tema[0].imagen
              this.temaContenido = res[0].tema[0].contenido
              this.temaSlug = res[0].tema[0].slug
              this.temaReply = res[0].tema[0].cantidadReply
              this.temaAutor = res[0].tema[0].autor
              this.temaFecha = res[0].tema[0].fecha
              this.imagenPerfil = res[0].tema[0].imagenPerfil

            });
        }
           },
     components: {ComentariosForo, VotoForo, ForoTemasRelacionados},
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



</style>