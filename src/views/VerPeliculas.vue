<template>
<div>
	
<div class="inner-content container" id="page-movies_list">
		
					<div data-gets="" data-type="hdr"></div>
<div class="ui grid mb-0 desktop-only">	
	<div class="left floated sixteen wide tablet eleven wide computer column pb-0">
		<div class="cat-tagsx">
		<a v-for="(item, index) in generos" :key="index"
        href="/kesfet/eyJjb250ZW50IjoiMSIsImNhdGVnb3J5Ijp7IjIiOiIyIn19"
         target="_blank" class="ui button secondary" 
         :data-tooltip="item.name" 
         :title="item.name">
        {{item.name}}
         </a>
	    </div>
		
	</div>
	



	<div class="right aligned floated five wide column pt-lg desktop-only">
<span class="section-heading pr-md">Mostrar:</span>
        <dropdown class="my-dropdown-toggle"
          :options="opcionesDrop" 
          :selected="opcionesDrop[5]" 
          v-on:updateOption="methodToRunOnSelect" 
          :placeholder="'Seleccione'"
          :closeOnOutsideClick="true">
</dropdown>


		
	
	</div>
</div>

<div class="dark-segment">
    <div class="clearfix new-tvseries ydslide" style="margin-bottom: 30px;"> 

        <SliderPeliculas :arrayPeliculas="peliculasSlider" />
    </div>
    

	

<div class="segment-title pt-0">Proximas a Estrenar</div>
    <ProximasEstrenar :arrayEstrenos="peliculasEstrenar" />
<br>

<div class="area latest-add-movies">
<h2 class="segment-title p-0 m-0">Ultimas Peliculas</h2>
<UltimasPeliculas :arrayUltimas="peliculasUltimas" />

<div class="ui pagination menu film"><a href="javascript:;" class="active item">1</a><a href="film-izle/2" class="item" data-navigo="" data-ci-pagination-page="2">2</a><a href="film-izle/3" class="item" data-navigo="" data-ci-pagination-page="3">3</a><a href="film-izle/4" class="item" data-navigo="" data-ci-pagination-page="4">4</a><a href="film-izle/2" class="item" data-navigo="" data-ci-pagination-page="2" rel="next">&gt;</a></div></div>
<PeliculasNotables :arrayNotables="peliculasNotables" />
</div>


<PeliculasEditor :arrayEditor="peliculasEditor" />

</div>

</div>
</template>

<script>
// @ is an alias to /src
import {mapState} from 'vuex'
import SliderPeliculas from '@/components/VerPeliculas/SliderPeliculas.vue'
import ProximasEstrenar from '@/components/VerPeliculas/ProximasEstrenar.vue'
import UltimasPeliculas from '@/components/VerPeliculas/UltimasPeliculas.vue'
import PeliculasNotables from '@/components/VerPeliculas/PeliculasNotables.vue'
import PeliculasEditor from '@/components/VerPeliculas/PeliculasEditor.vue'
import dropdown from 'vue-dropdowns';



export default {
  name: 'VerPeliculas',
   data (){
        return {
      VerPelicula: [], 
      generos: [], 
      peliculasSlider: [],
      peliculasEstrenar: [],
       peliculasUltimas: [],
       peliculasNotables: [],
       peliculasEditor: [],
       opcionesDrop: [
           {"id":"1", "name":"IMDB ↓"},
           {"id":"2", "name":"IMDB ↑"}, 
           {"id":"3", "name":"Año ↓"},
           {"id":"4", "name":"Año ↑"},
           {"id":"5", "name":"Agregada ↓"},
           {"id":"6", "name":"Agregada ↑"},
     
       ],
          
	  
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
        methodToRunOnSelect(payload) {
            this.object = payload;
      //      console.log(this.object)
          },
		async getVerPeliculas(){
            await fetch(this.urlProcesos +
          "wp-json/peliculas/ver/post/")
                    .then((r) => r.json())
                    .then((res) => {
                //      console.log(res)
                        this.generos = res[0].generos;
                        this.peliculasSlider = res[0].peliculas_slider;
                        this.peliculasEstrenar = res[0].peliculas_estrenar;
                        this.peliculasUltimas =  res[0].ultimas_peliculas;
                        this.peliculasNotables = res[0].peliculas_notables;
                        this.peliculasEditor = res[0].peliculas_editor;
                        this.$store.state.skeleton = 1
                    
                    }
                    );
           }, 
		
    },
     components: {
        dropdown, SliderPeliculas, ProximasEstrenar, UltimasPeliculas, PeliculasNotables,
        PeliculasEditor
          
         }, 
  mounted() {
	 this.getVerPeliculas()
    },
}
</script>
<style >
.poster.poster-ks a {
    display: flex;
    flex-direction: row-reverse;
    height: 100%!important;
    background-color: #1e2029;
    border-radius: 3px;
    transition: background-color .1s ease-in-out;
}
.poster.poster-ks img {
    display: block;
    max-width: 100%!important;
    min-width: 100%!important;
    -o-object-fit: cover;
    object-fit: cover;
    border-radius: 2px;
    margin: 0!important;
}
.poster.poster-ks a:hover {
    background-color: #252833;
}

</style> 