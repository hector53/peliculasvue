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
	<div class="dark-segment" style="margin-top: 20px;">
        <input type="text" id="tituloTema" placeholder="Título del Tema" class="swal2-input" autocomplete="on">
        <div class="cubreEditor">
            <vue-editor v-model="content"></vue-editor>
        </div>
        <p style="   text-align: center;
    margin-top: 20px;">
            <button type="button" @click="addTema()" class="ui button  primary mr-xs centrarBoton" :class="{'loading' : loadingButton}" aria-label="">Publicar Tema</button>
        </p>
    </div>

	</section>
			</div>
</template>

<script>
import { VueEditor } from "vue2-editor";
// @ is an alias to /src
import {mapState} from 'vuex'
export default {
  name: 'ForoNewTema',
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
       content: "", 
       loadingButton: false
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
    methods: {
        addTema(){
            this.loadingButton = true
        }, 
        async quitarSkeleton(){
         await fetch(
            this.urlProcesos +
            "wp-json/foro/all/" )
            .then((r) => r.json())
            .then((res) => {
              this.$store.state.skeleton = 1
            });
            }
           },
     components: {VueEditor},
  mounted() {
          this.quitarSkeleton()
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

.cubreEditor{
        background: #ffffffe0;
    margin-top: 30px;
    width: 100%;
}
#tituloTema{
    color: white; 
}
.centrarBoton{
   color: #244542;
        
}

.centrarBoton:hover{
    background-color: #22fae1!important;
        color: #0c100f!important;
}

</style>