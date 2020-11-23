<template>
<div class="left floated sixteen wide tablet four wide computer column" id="filter-sidebar">

			<div class="section-heading">Seleccione Tipo</div>

			<div class="global-box pl-0 pt-0">

				<div class="ui middle aligned divided list">
					
<<<<<<< HEAD
					<div class="item just-title active">
						<a href="kesfet/bnVsbA==" rel="nofollow" data-navigo="">
							<h2 class="truncate pt-0">Serie</h2>
						</a>
					</div>
					<div class="item just-title">
					 <router-link @click.native="$store.commit('scrollToTop')"  :to="{ name: 'Descubrir', props: {tipo: 'pelicula'} }" >
                   	
							<h2 class="truncate pt-0">Película</h2>
						</router-link>
=======
					<div class="item just-title" :class="{ 'active' : tipo == 'serie' }">
						<a @click.prevent="buscarPelicula('serie')" rel="nofollow" >
							<h2 class="truncate pt-0">Serie</h2>
						</a>
					</div>
					<div class="item just-title" :class="{ 'active' : tipo == 'pelicula' }">
					 <a @click.prevent="buscarPelicula('pelicula')"  rel="nofollow"  >
                   	
							<h2 class="truncate pt-0">Película</h2>
						</a>
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
					</div>
				</div>
			</div>

			<div class="section-heading">Por Años</div>

			<div class="global-box pl-0 pt-0">
                
				<div class="filter-range">
<<<<<<< HEAD
					<p id="range-years">Entre <span>{{yearI}}</span> y <span>{{yearE}}</span></p>
=======
					<p id="range-years">Entre <span>{{yearIni}}</span> y <span>{{yearFin}}</span></p>
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
                <VueRangeSlider ref="sliderYear" v-model="rangeYear" 
                 :min="2000"
                 :max="2020" 
				 v-on:drag-end="buscarYear()"
                />
				
				</div>
			</div>

			<div class="section-heading">Puntuación IMDB</div>

			<div class="global-box pl-0 pt-0">
				<div class="filter-range">
<<<<<<< HEAD
					<p id="range-imdb"><span>{{imdbI}}</span> a <span>{{imdbE}}</span> puntos</p>
=======
					<p id="range-imdb"><span>{{imdbIni}}</span> a <span>{{imdbFin}}</span> puntos</p>
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
                 <vue-range-slider ref="sliderImdb" v-model="rangeImdb"   :min="0"   :max="10"
				 v-on:drag-end="buscarImdb()"
				     ></vue-range-slider>
				</div>
			</div>

			<div class="section-heading">Por Genero</div>

			<div class="global-box pl-0 pt-0">
				<div class="ui middle aligned divided list">
					<div class="item just-title" :class="{'active' : genS == item.slug}"
					v-for="(item, index) in arrayGeneros" :key="index">
					<a  @click.prevent="buscarGenSerie(item.slug)">
					<h2 class="truncate pt-0">{{item.name}}</h2>
					</a>
					</div>
                    	
								
				</div>
			</div>	
			<div class="section-heading">Por País</div>

			<div class="global-box pl-0 pt-0">
				<div class="ui middle aligned divided list">
					<div class="item just-title"  :class="{'active' : pais == item.value}" v-for="(item, index) in arrayPaises" :key="index">
						<a  @click.prevent="buscarPais(item.value)" >
							<h2 class="truncate pt-0">{{item.name}}</h2>
						</a>
					</div>
				    		
														</div>
			</div>
</div>
</template>


<script>
import 'vue-range-component/dist/vue-range-slider.css'
import VueRangeSlider from 'vue-range-component'

export default {
  name: 'DescubrirSidebar',
   props: {
        arrayGeneros:{
            type: Array, 
            required: true,
		},
		  arrayPaises:{
            type: Array, 
            required: true,
		},
		  yearI:{
            type: Number, 
            required: true,
		},
		 yearE:{
            type: Number, 
            required: true,
		},
		  imdbI:{
            type: Number, 
            required: true,
		},
		 imdbE:{
            type: Number, 
            required: true,
		},
		 genS:{
            type: String, 
            required: true,
		},
		 pais:{
            type: String, 
            required: true,
		},
<<<<<<< HEAD
=======
		 tipo:{
            type: String, 
            required: true,
		},
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
		urlTest:{
			type: Object,
			required: true
		}
		 
    },
   data (){
        return {
            rangeYear: [this.yearI, this.yearE],
            rangeImdb: [this.imdbI, this.imdbE],
<<<<<<< HEAD
            yearIni: 2000,
            yearFin: 2020, 
            imdbIni: 0, 
            imdbFin: 10, 
			tipo: 'serie', 
			genSerie: this.genS
=======
            yearIni: this.yearI,
            yearFin: this.yearE, 
            imdbIni: this.imdbI, 
            imdbFin: this.imdbE, 
			genSerie: this.genS, 
			tipoS : this.tipo
			
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30


        }
    },
    watch: {
        rangeYear(range) {
            this.yearIni = range[0]; 
			this.yearFin = range[1]
			
        },
        rangeImdb(range) {
            this.imdbIni = range[0]; 
            this.imdbFin = range[1]
        }
    },
    components: {
    VueRangeSlider
  },
    methods: {
<<<<<<< HEAD
        changeYear(){
         //   console.log(rangeYear)
		}, 
=======
        buscarPelicula(tipo){
			this.tipoS = tipo;
				let params = new URLSearchParams(location.search);
		if(this.tipoS == params.get('s')){
			//son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
		}else{
				//son diferentes aqui si hago
				this.urlTest = {}
			    this.urlTest.s = tipo; 
				this.$store.commit('scrollToTop');
				this.$router.push({  name: 'Descubrir', query: this.urlTest })
				 this.$store.state.DesYearI = 0
      this.$store.state.DesYearE = 0
      this.$store.state.DesImdbI = 0; 
      this.$store.state.DesImdbE = 0; 
      this.$store.state.DesGenSerie = "";
      this.$store.state.DesPais = "";
			}
		},
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
		buscarYear(){
//debo hacer q no puedan dar clic en los mismos parametros del range slider xq da error el vue router			
		let params = new URLSearchParams(location.search);
		if(this.yearIni == params.get('yearI') && this.yearFin == params.get('yearE') ){
			//son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
		}else{
				//son diferentes aqui si hago
			this.urlTest.yearI = this.yearIni; 
				this.urlTest.yearE = this.yearFin;
				this.$store.commit('scrollToTop');
				this.$router.push({  name: 'Descubrir', query: this.urlTest })
			}
		}, 

		buscarImdb(){
			let params = new URLSearchParams(location.search);
		if(this.imdbIni == params.get('imdbI') && this.imdbFin == params.get('imdbE') ){
			//son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
		}else{
				//son diferentes aqui si hago
				this.urlTest.imdbI = this.imdbIni; 
				this.urlTest.imdbE = this.imdbFin;
				this.$store.commit('scrollToTop');
				this.$router.push({  name: 'Descubrir', query: this.urlTest })
			}
		}, 
		buscarGenSerie(genero){
				let params = new URLSearchParams(location.search);
		if(genero == params.get('genS')  ){
			//son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
		}else{
				//son diferentes aqui si hago
				this.urlTest.genS = genero; 
				this.$store.commit('scrollToTop');
				this.$router.push({  name: 'Descubrir', query: this.urlTest })
			}
		},
		buscarPais(pais){
	let params = new URLSearchParams(location.search);
		if(pais == params.get('genS')  ){
			//son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
		}else{
				//son diferentes aqui si hago
				this.urlTest.pais = pais; 
				this.$store.commit('scrollToTop');
				this.$router.push({  name: 'Descubrir', query: this.urlTest })
			}
		}
        
    },
    mounted() {
		
		/*if(Object.keys(this.urlTest).length === 0 && this.urlTest.constructor === Object){
			//console.log("esta vacio");
			}else{
			//	console.log("no esta vacio");
			}*/
	},
	
}
</script>
<style>
.vue-range-slider.slider-component .slider-tooltip-wrap .slider-tooltip {
    
    display: none!important;
}
</style>