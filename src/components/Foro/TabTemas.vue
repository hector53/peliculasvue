<template>
<div>
   
<SkeletonMio v-if="showSkeleton" />
 <div class="ui grid" v-else>

	<div class="wide column">

		<nav class="sub-navigation mb-lg" aria-label="">
            <ul class="left floated sixteen wide tablet four wide computer column">
                <li><a href="forum" :class="{'active' : tab1}" data-navigo="" @click.prevent="tabClick(1)">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">temas populares</font>
                        </font></a>
                </li>
                <li><a href="forum/latest" data-navigo="" :class="{'active' : tab2}" @click.prevent="tabClick(2)" >
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Temas Recientes</font>
                    </font></a>
                </li>
                <li v-if="id_user > 0 "><a href="forum/favorites" data-navigo="" :class="{'active' : tab3}" @click.prevent="tabClick(3)" >
                <font style="vertical-align: inherit;">
                    <font class="" style="vertical-align: inherit;">mis favoritos</font>
                    </font></a>
                </li>
            </ul>
		</nav><div class="story-list-items mb-lg">
	<div class="title-base">
		<h3 class="title-tertiary pt-sm"><font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">{{textoTemas}}</font></font></h3>
	</div>
	<ul>
		<li class="story-list-item" v-for="(movie, index) in arrayTemasC" :key="index">
		<VotoForo :id_user="id_user" :id_tema="String(movie.id)" />
			<figure class="list-story-category">
				<router-link @click.native="$store.commit('scrollToTop')" 
					:to="{name:'ForoVerSeccion', params: {foro_slug: movie.slugForo} }">
                  
					<img src="https://api.pelisflix.com/wp-content/uploads/cover-general-discussion.png" 
                    alt="deben cargarse matrices" class="lazy-wide loading"
                     data-was-processed="true">
				</router-link>
			</figure>
			<div class="add-to-fav" data-tooltip="Agregar a Favoritos"
             data-inverted="" data-position="left center">
				<button aria-label="Agregar a los favoritos" :alt="movie.fav" data-fid="75"
                 data-favorite="1" @click="addFavorite(movie.id)"
                  :id="'botonFav_'+movie.id" :class="{'story-starred' : movie.fav > 0}" ></button>
			</div>
			<h3 class="title-tertiary truncate mt-0 mb-0">
                  <router-link @click.native="$store.commit('scrollToTop')" 
	:to="{name:'ForoVerTema', params: {foro_slug: movie.slugForo, tema_slug: movie.slug+'.'+movie.id} }">
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
                        </font>
                         <router-link class="item"  @click.native="$store.commit('scrollToTop')" 
                            :to="{ name: 'PerfilUser', params: {user: movie.autor} }">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">{{movie.autor}}</font>
                            </font></router-link><font style="vertical-align: inherit;">
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
import VotoForo from '@/components/Foro/VotoForo.vue'
import SkeletonMio from '@/components/SkeletonMio/SkeletonMio.vue'
export default {
  name: 'ForoVerSeccion',
   props: ['userName', 'id_user', 'temasForo',  ],
    
   data (){
        return {
            tab1: true, 
            tab2: false,
            tab3: false,
            textoTemas: "Temas mas populares de la semana", 
            arrayTemasC: [], 
            showSkeleton: false
	
        }
    },
      computed:{
        ...mapState(['urlProcesos', 'skeleton'])
	},
	
	
    methods: {
        tabClick(val){
            if(val == 1){
                this.tab1 = true; 
                this.tab2 = false; 
                this.tab3 = false; 
                this.textoTemas = "Temas mas populares de la semana"
                if(this.temasForo==0){
                    this.getTemas(1)
                }else{
                    this.getTemas(4)
                }
                this.showSkeleton = true
            }
            if(val == 2){
                this.tab1 = false; 
                this.tab2 = true; 
                this.tab3 = false; 
                this.textoTemas = "Temas Recientes de la Semana"
                 if(this.temasForo==0){
                    this.getTemas(2)
                }else{
                    this.getTemas(5)
                }
                this.showSkeleton = true
            }
            if(val == 3){
                this.tab1 = false; 
                this.tab2 = false; 
                this.tab3 = true; 
                this.textoTemas = "Mis Temas Favoritos"
                  if(this.temasForo==0){
                    this.getTemas(3)
                }else{
                    this.getTemas(6)
                }
                this.showSkeleton = true
            }

        },
   async   addFavorite(id){
              if(this.id_user == null){
 vm.$children[0].$refs.HeaderMovies.loginOpen()
 return false
}
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
         // console.log(res);
            if(res == 0){
                 element.classList.add('story-starred')
            }else{
               element.classList.remove('story-starred')
            } 
           
           
            });
      }, 

       async   getTemas(c){
           console.log(c)
            await fetch(
            this.urlProcesos +
            "wp-json/foro/all/?q=getTemas&id_user="+this.id_user+"&slug="+this.$route.params.foro_slug
            +"&c="+c
            )
            .then((r) => r.json())
            .then((res) => {
            console.log(res);
               this.arrayTemasC = res
             this.showSkeleton = false

            });
        }
 
           },
     components: {VotoForo, SkeletonMio},
  mounted() {
      console.log(this.temasForo)
      if(this.temasForo==0){
           this.getTemas(1)
      }else{
          this.getTemas(4)
      }
  
           
  },
}
</script>
<style >


</style>