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
        <a href="new"  class="ui primary button mt-sm" @click.prevent="temaNuevo()"
        >
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Abrir tema nuevo</font>
          </font>
        </a>
				
			</div>
		</div>
		<!-- // .right -->
	
	</div>
<!-- // #grid -->

<TabTemas :temasForo="0"  :id_user="id_user" :userName="userName"  />


			</div>
</template>

<script>

// @ is an alias to /src
import {mapState} from 'vuex'
import TabTemas from '@/components/Foro/TabTemas.vue'
export default {
  name: 'ForoVerSeccion',
    props: ['userName', 'id_user'],
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
   async   addFavorite(id){
     
      var element = document.getElementById("botonFav_"+id)
     // var test = String(element)
    /*  if(element.classList.length == 0){
                 element.classList.add('story-starred')
            }else{
               element.classList.remove('story-starred')
            }*/
     
        await  fetch(
            this.urlProcesos +
            "wp-json/foro/all/?q=addFav&id_user="+this.id_user+"&id_tema="+id
            )
            .then((r) => r.json())
            .then((res) => {
         //   console.log(res);
            if(res == 0){
                 element.classList.add('story-starred')
            }else{
               element.classList.remove('story-starred')
            } 
           
           
            });
      }, 
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
        }, 
        temaNuevo(){
                  if(this.id_user == null){
 vm.$children[0].$refs.HeaderMovies.loginOpen()
 return false
}
            this.$store.commit('scrollToTop');
          	this.$router.push({name:'ForoVerTema', params: {foro_slug: this.$route.params.foro_slug, tema_slug: 'new' } })
            
        }
           },
     components: { TabTemas},
  mounted() {
   
    
        this.getTemas_seccion()
        console.log(this.seccionId)
           
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
.changebg{
  background-color: white!important;
}

</style>