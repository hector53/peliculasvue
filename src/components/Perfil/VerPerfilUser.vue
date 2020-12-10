<template>
  <div class="inner-content container" id="page-profile">
    
    



    

    <section class="user-profile bg-cover-faker">
      <div class="ui grid">
        <div class="left floated sixteen wide tablet four wide computer column">
          <div class="generic-box">
            <section class="profile-section text-center">
              <figure class="user-profile-photo" role="presentation">
                <div class="polygon">
                  <font style="vertical-align: inherit"
                    ><font style="vertical-align: inherit">4</font></font
                  >
                </div>
                 <router-link  class="circle-progress-link" @click.native="$store.commit('scrollToTop')" 
                :to="{ name: 'PerfilUser', params: {user: userName} }" >
               
                  <img
                    :src="imagenPerfil"
                    alt="@hectoracosta53"
                  />
                  <div
                    class="circle-progress"
                    data-tooltip="5%"
                    data-inverted=""
                    data-percent="5"
                  >
                    <svg version="1.1" viewBox="0 0 100 100">
                      <circle
                        class="ring"
                        cx="-48"
                        cy="48"
                        fill-opacity="0"
                        r="46"
                        stroke-dashoffset="293"
                        stroke-dasharray="307.65"
                        transform="rotate(-90)"
                      ></circle>
                    </svg>
                  </div>
                </router-link>
              </figure>

              <h2 class="title-secondary">
               <router-link class="item"  @click.native="$store.commit('scrollToTop')" 
                :to="{ name: 'PerfilUser', params: {user: userName} }">
              
                  <font style="vertical-align: inherit"
                    ><font style="vertical-align: inherit" class="">
                      @{{userName}}
                    </font></font
                  ></router-link
                >
              </h2>

              <div class="user-earnings"></div>
            </section>

            <section class="profile-section">
              <div class="profile-summary">
                <div class="ui middle aligned divided list">
                  <div class="item">
                    <div class="right floated content text-white">
                      <a href="#" data-modal="following_modal"
                        ><font style="vertical-align: inherit"
                          ><font style="vertical-align: inherit">1</font></font
                        ></a
                      >
                    </div>
                    <div class="content">
                      <font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit"
                          >Siguiendo</font
                        ></font
                      >
                    </div>
                  </div>
                  <div class="item">
                    <div class="right floated content text-white">
                      <a href="#" data-modal="follower_modal"
                        ><font style="vertical-align: inherit"
                          ><font style="vertical-align: inherit">0</font></font
                        ></a
                      >
                    </div>
                    <div class="content">
                      <font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit"
                          >Seguidor</font
                        ></font
                      >
                    </div>
                  </div>
                  <div class="item">
                    <div class="right floated content text-white">
                      <font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit">8</font></font
                      >
                    </div>
                    <div class="content">
                      <font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit"
                          >Secciones vigiladas</font
                        ></font
                      >
                    </div>
                  </div>
                  <div class="item">
                    <div class="right floated content text-white">
                      <font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit">1</font></font
                      >
                    </div>
                    <div class="content">
                      <font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit"
                          >Su comentario</font
                        ></font
                      >
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <section class="profile-section text-center">
              <p class="description-quaternary">
                <font style="vertical-align: inherit"
                  ><font style="vertical-align: inherit"
                    >Fecha de afiliación: {{fecha_registro}}</font
                  ></font
                >
              </p>
            </section>
          </div>
        </div>

        <div
          id="profile-content"
          class="right floated sixteen wide tablet twelve wide computer column"
        >
          <div class="ui top tabular menu">
            <a class="item" :class="{'active' : tab1}" @click.prevent="clickTab(1)"  data-tab="series"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Serie</font></font
              ></a
            >
            <a class="item" :class="{'active' : tab2}" @click.prevent="clickTab(2)" data-tab="movies"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Películas</font></font
              ></a
            >
            <a class="item" :class="{'active' : tab3}" @click.prevent="clickTab(3)"  data-tab="artists"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Jugadores</font></font
              ></a
            >
            <a class="item" :class="{'active' : tab4}" @click.prevent="clickTab(4)"  data-tab="collections"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Colecciones</font></font
              ></a
            >
            <a class="item" :class="{'active' : tab5}" @click.prevent="clickTab(5)"  data-tab="discussions"
              ><font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">Discusiones</font></font
              ></a
            >
          </div>

          <div
            class="ui bottom attached tab segment"
            id="profile-series"
            data-tab="series"
            :class="{'active' : tab1}" 
          >
            <div class="dark-segment">
              <ul class="clearfix">
                <li class="segment-poster" id="data_3451"  v-for="(movie, index) in arraySeriesSeguidas" :key="index">
                  <div class="poster poster-md">
                    <div class="poster-media">
                       <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                        <img class="imagenSerie"
                          :src="movie.imagen2"
                          alt="Distancia social"
                        />
                        <div class="poster-overlay">
                          <span class="item rating"
                            ><svg class="mofycon">
                              <use xlink:href="#icon-star"></use></svg
                            ><font style="vertical-align: inherit"
                              ><font style="vertical-align: inherit">
                                {{movie.imdb}}</font
                              ></font
                            ></span
                          >
                          <span class="item year"
                            ><font style="vertical-align: inherit"
                              ><font style="vertical-align: inherit"
                                >{{movie.fecha}}</font
                              ></font
                            ></span
                          >
                        </div>
                      </router-link>
                    </div>
                    <div class="poster-subject">
                       <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                     
                     <h2 class="truncate">
                          <font style="vertical-align: inherit"
                            ><font style="vertical-align: inherit"
                              >{{movie.titulo}}</font
                            ></font
                          >
                        </h2></router-link
                      >
                      <p class="description-quaternary truncate">
                        <font style="vertical-align: inherit"
                          ><font style="vertical-align: inherit"
                            >{{movie.genero}}</font
                          ></font
                        >
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div
            class="ui bottom attached tab segment"
            id="profile-movies"
            data-tab="movies"
            :class="{'active' : tab2}" 
          >
            <div class="dark-segment">
              <ul class="clearfix">
                <li class="segment-poster" v-for="(movie, index) in arrayPeliculasSeguidas" :key="index" >
                  <div class="poster poster-md">
                    <div class="poster-media">
                     <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                        <img :src="movie.imagen2" class="imagenPoster" />
                        <div class="poster-overlay">
                          <span class="item rating"
                            ><svg class="mofycon">
                              <use xlink:href="#icon-star"></use></svg
                            ><font style="vertical-align: inherit"
                              ><font style="vertical-align: inherit"
                                >{{movie.imdb}}</font
                              ></font
                            ></span
                          >
                          <span class="item year"
                            ><font style="vertical-align: inherit"
                              ><font style="vertical-align: inherit"
                                >{{movie.fecha}}</font
                              ></font
                            ></span
                          >
                        </div>
                      </router-link>
                    </div>
                    <div class="poster-subject">
                      <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'detallePeliculas', params: {slug: movie.slug} }">
                      <h2 class="truncate">
                          <font style="vertical-align: inherit"
                            ><font style="vertical-align: inherit"
                              >{{movie.titulo}}</font
                            ></font
                          >
                        </h2></router-link
                      >
                      <p class="description-quaternary truncate">
                        <font style="vertical-align: inherit"
                          ><font style="vertical-align: inherit"
                            >{{movie.genero}}</font
                          ></font
                        >
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div
            class="ui bottom attached tab segment"
            id="profile-artists"
            data-tab="artists"
            :class="{'active' : tab3}" 
          >
            <div class="alert alert-danger" role="alert">
              <font style="vertical-align: inherit"
                ><font style="vertical-align: inherit">
                  El usuario no tiene ningún jugador seguido.
                </font></font
              >
            </div>
          </div>

          <div
            class="ui bottom attached tab segment"
            id="profile-collections"
            data-tab="collections"
            :class="{'active' : tab4}" 
          >
            <div class="collections">
       <router-link @click.native="$store.commit('scrollToTop')"  v-for="(movie, index) in arrayMisColecciones" :key="index"
          :to="{ name: 'ColeccionDetalle', params: {username: userName, slug: movie.slug} }">
					
             
                <div class="collection-item">
                  <figure v-for="(image, index) in movie.imagen" :key="index" >
                    <img :src="image.imagen"   />
                  </figure>
                 
                  <h3 class="title-quaternary mt-0 mb-sm">
                    <font style="vertical-align: inherit"
                      ><font style="vertical-align: inherit"
                        >{{movie.titulo}}</font
                      ></font
                    >
                  </h3>
                  <p class="description-secondary mb-xs">
                    <span class="mr-md"
                      ><font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit"
                          >{{movie.contador}} artículo
                        </font></font
                      ></span
                    >
                    <font style="vertical-align: inherit"
                      ><span
                        ><font style="vertical-align: inherit"> 0 </font></span
                      ></font
                    ><span>
                      <svg
                        width="18"
                        height="18"
                        viewBox="0 0 18 18"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.62 0h1.107l-.553 2.154-.553-2.154zm3.556.889l-1.336 1.853.296-2.195 1.04.341zm-4.971-.341l.297 2.195-1.336-1.853 1.039-.341zm9.21 9.117c.947 1.572 1.112 4.1-1.262 6.474-.743.743-1.559 1.165-2.434 1.278.138-.115.271-.237.399-.364 2.303-2.303 2.755-4.779 1.338-7.367l-2.065-3.632-.038-.046c.044-.236.173-.442.389-.61.188-.144.428-.202.662-.161.315.052.607.254.816.564l2.195 3.864zm-7.184-2.484l-2.911-2.909c.041-.167.11-.327.239-.458.364-.366 1.002-.366 1.365 0l1.81 1.811c-.433.416-.616.953-.503 1.556zm2.347-.615l2.039 3.589c1.199 2.192.813 4.225-1.177 6.219-2.796 2.797-5.17 1.631-7.618-.818l-3.864-3.864c-.279-.28-.279-.733 0-1.013.134-.135.316-.211.507-.211.19 0 .373.076.507.211l2.008 2.007c.154.145.395.141.544-.009.149-.149.153-.39.008-.544l-2.007-2.008-1.347-1.346c-.135-.134-.211-.316-.211-.507 0-.19.076-.373.211-.507.282-.279.736-.278 1.016.002l3.193 3.194c.073.074.173.116.277.116.104 0 .204-.042.277-.116.073-.073.115-.173.115-.276 0-.104-.041-.203-.115-.276l-3.197-3.198-.901-.901c-.135-.134-.211-.316-.211-.506s.076-.372.211-.506c.28-.279.733-.279 1.014 0l.903.904 3.194 3.194c.099.099.243.137.378.101.135-.036.241-.142.277-.277.036-.135-.002-.279-.101-.378l-3.196-3.198c-.181-.181-.252-.445-.185-.692.066-.247.259-.44.507-.507.247-.066.511.004.692.185l5.382 5.383c.067.141.211.229.367.224.156-.005.294-.102.351-.248.057-.145.023-.31-.088-.421l-1.039-2.197c-.344-.736.046-1.038.174-1.137.133-.102.303-.142.468-.111.248.041.481.206.639.44z"
                        ></path></svg
                      ><font style="vertical-align: inherit"></font
                    ></span>
                  </p>
                  <p class="mt-md">
                    <img
                      class="collection-owner-image"
                      src="https://avatars.dicebear.com/api/bottts/hectoracosta53.svg"
                    />
                    <span class="description-secondary"
                      ><font style="vertical-align: inherit"
                        ><font style="vertical-align: inherit"
                          >@{{userName}}</font
                        ></font
                      ></span
                    >
                  </p>
                </div>
              </router-link>

              


            </div>
          </div>

          <div
            class="ui bottom attached tab segment"
            id="profile-discussions"
            data-tab="discussions"
            :class="{'active' : tab5}" 
          >
           <div class="ui grid" >

	<div class="wide column">

		<div class="story-list-items mb-lg">
	<div class="title-base">
		<h3 class="title-tertiary pt-sm"><font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Mis Temas del Foro</font></font></h3>
	</div>
	<ul>
		<li class="story-list-item" v-for="(movie, index) in arrayMisTemasForo" :key="index">
		<VotoForo :id_user="id_user" :id_tema="String(movie.id)" />
			<figure class="list-story-category">
				<router-link @click.native="$store.commit('scrollToTop')" 
					:to="{name:'ForoVerSeccion', params: {foro_slug: movie.slugForo} }">
                  
					<img src="https://api.pelisflix.com/wp-content/uploads/cover-general-discussion.png" 
                    alt="deben cargarse matrices" class="lazy-wide loading"
                     data-was-processed="true">
				</router-link>
			</figure>
		
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
        </div>
      </div>
      <!-- // .grid -->
    </section>

  </div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import VotoForo from '@/components/Foro/VotoForo.vue'
export default {
  name: "VerPerfilUser",
   props: {
     id_user:{
            type: String, 
            required: true,
		},
		userName:{
            type: String, 
            required: true,
		},
    
    },
  data() {
    return {
        tab1: true, 
        tab2: false, 
        tab3: false, 
        tab4: false,
        tab5: false, 
        imagenPerfil: null, 
        fecha_registro: null, 
        arrayPeliculasSeguidas: [], 
        arraySeriesSeguidas: [], 
        arrayMisColecciones: [], 
        arrayMisTemasForo: []
    };
  },
  computed: {
    ...mapState(["urlProcesos"]),
  },
  methods: {
     async getUserData(){
            await fetch(this.urlProcesos +
          "wp-json/perfil/usuario/post/?q=getP&id="+this.id_user+"&username="+this.userName)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                     //   this.arrayUserData = res
                     this.imagenPerfil = res[0].imagen_perfil; 
                  this.fecha_registro = res[0].fecha_registro; 
                 
                    }
                    );
           },
             async getPeliculasSeguidas(){
            await fetch(this.urlProcesos +
          "wp-json/perfil/peliculas_seguidas/post/?id_user="+this.id_user)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arrayPeliculasSeguidas = res
                     
                    }
                    );
           },
             async getSeriesSeguidas(){
            await fetch(this.urlProcesos +
          "wp-json/perfil/series_seguidas/post/?id_user="+this.id_user)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arraySeriesSeguidas = res
                   
                    }
                    );
           },
            async getMisColecciones(){
            await fetch(this.urlProcesos +
          "wp-json/colecciones/crear_coleccion/post/?q=g2&id_user="+this.id_user)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arrayMisColecciones = res[0].coleccion
                      this.$store.state.skeleton = 1
                    }
                    );
           },
           async getMisTemasForo(){
            await fetch(this.urlProcesos +
          "wp-json/foro/all/?q=getMisTemas&id_user="+this.id_user)
                    .then((r) => r.json())
                    .then((res) => {
                      console.log(res)
                      this.arrayMisTemasForo = res
                      
                    }
                    );
           },
      clickTab(num){
         if(num == 1){
                this.tab1 = true; 
                this.tab2 = false; 
                this.tab3 = false; 
                this.tab4 = false; 
                this.tab5 = false; 
         }
         if(num == 2){
                this.tab1 = false; 
                this.tab2 = true; 
                this.tab3 = false; 
                this.tab4 = false; 
                this.tab5 = false; 
         }
          if(num == 3){
                this.tab1 = false; 
                this.tab2 = false; 
                this.tab3 = true; 
                this.tab4 = false; 
                this.tab5 = false; 
         }
          if(num == 4){
                this.tab1 = false; 
                this.tab2 = false; 
                this.tab3 = false; 
                this.tab4 = true; 
                this.tab5 = false; 
         }
          if(num == 5){
                this.tab1 = false; 
                this.tab2 = false; 
                this.tab3 = false; 
                this.tab4 = false; 
                this.tab5 = true; 
         }
      }

  },
  components: {VotoForo},
  mounted() {
     this.getUserData(); 
     this.getPeliculasSeguidas()
     this.getSeriesSeguidas()
     this.getMisColecciones()
     this.getMisTemasForo()
  },
  created() {
  },
};
</script>
<style >
.imagenSerie{
  width: 248px!important;
  height: 140px!important;
}
.user-profile .collections .collection-item figure img {
   
    height: 126px!important;
}
</style> 