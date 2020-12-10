<template>
<div class="inner-content container" id="page-forum_topic">



<div class="ui grid">
	<nav class="forum-breadcrumb" aria-label="Migaja de pan">
		<ol>
			<li aria-current="page"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Foro</font></font></li>
			<li aria-current="page"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inicio</font></font></li>
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



<TabTemas :temasForo="1"  :id_user="id_user" :userName="userName"  />


			</div>
</template>

<script>
import TabTemas from '@/components/Foro/TabTemas.vue'
// @ is an alias to /src
import {mapState} from 'vuex'
import Cookies from "js-cookie";

export default {
  name: 'ForoComp',
  props: ['userName', 'id_user', ],

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
     components: {TabTemas},
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