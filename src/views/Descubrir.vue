<template>
<div>

  	
	<div class="inner-content container" id="page-discover" >
			
				
<div class="bg-cover-faker">

	<div class="ui grid mb-0">
	
		<div class="left floated sixteen wide tablet eight wide computer column pb-0">
			<h1 class="page-title pt-sm pb-sm">Descubrir</h1>
			<div class="description-primary pb-0 mb-md" style="font-size:14px">Puedes encontrar películas nuevas y programas de television aquí
                </div>
			<div class="filter-mobile">
				<button type="button" id="trigger-filter-sidebar" class="ui primary button">Ordenar</button>
				<div class="fm-order">
					   <dropdown class="my-dropdown-toggle"
                          :options="opcionesDrop" 
                        :selected="ordenSelected" 
                         v-on:updateOption="buscarOrdenar" 
                        :placeholder="'Seleccione'"
                        :closeOnOutsideClick="true">
                    </dropdown>
				</div>
			</div>
		</div>
	
		<div class="right aligned floated eight wide column pt-lg desktop-only">
			<span class="section-heading pr-md">Ordenar:</span>
		 <dropdown class="my-dropdown-toggle"
                        :options="opcionesDrop" 
                        :selected="ordenSelected" 
                         v-on:updateOption="buscarOrdenar" 
                        :placeholder="'Seleccione'"
                        :closeOnOutsideClick="true">
                    </dropdown>
		</div>
	</div>
	
	<div id="filtered-tags">
		<a class="ui label" @click="cerrarYear()" rel="nofollow" v-show="$store.state.DesYearI > 0 && $store.state.DesYearE <= 2020" >
			Año: {{$store.state.DesYearI}} - {{$store.state.DesYearE}} 
			<span class="mofycon-delete"></span>
		</a>

    	<a class="ui label" @click="cerrarImdb()" rel="nofollow" v-show="$store.state.DesImdbI >= 0 && $store.state.DesImdbE > 0 " >
			IMDB: {{$store.state.DesImdbI}} - {{$store.state.DesImdbE}} 
			<span class="mofycon-delete"></span>
		</a>

    	<a class="ui label" @click="cerrarGenSerie()" rel="nofollow" v-show="$store.state.DesGenSerie != '' " >
			Genero: {{$store.state.DesGenSerie}}
			<span class="mofycon-delete"></span>
		</a>

    <a class="ui label" @click="cerrarPais()" rel="nofollow" v-show="$store.state.DesPais != '' " >
			País: {{$store.state.DesPais}}
			<span class="mofycon-delete"></span>
		</a>
	</div>
  
	<div class="ui grid mb-lg mt-0" >

		<DescubrirSidebar   :arrayGeneros="generos" :arrayPaises="paises" 
    :yearI="yearI" :yearE="yearE" :urlTest="urlTest" :imdbI="imdbI" :imdbE="imdbE"
    :genS="genSerie" :pais="pais" :tipo="tipo" />



<SkeletonMio v-show="skeletonmio == true" style="width: 75%;" />  
		<DescubrirContent  v-show="skeletonmio == false"  :arraySeries="series" 
    :totalPaginas="totalPaginas" :paginaActual="paginaActual" 
    :num_actual_ini="num_actual_ini" :num_actual_fin="num_actual_fin"
    :parametros="parametros" :urlTest="urlTest" :tipo="tipo"
    />

  
	</div>

</div>			
</div>
</div>
</template>

<script>
// @ is an alias to /src
import {mapState} from 'vuex'
import dropdown from 'vue-dropdowns';
import DescubrirSidebar from '@/components/Descubrir/DescubrirSidebar.vue'
import DescubrirContent from '@/components/Descubrir/DescubrirContent.vue'
import SkeletonMio from '@/components/SkeletonMio/SkeletonMio.vue'
export default {
  name: 'Descubrir',
   data (){
        return {
      arrayBuscador: [], 
	 opcionesDrop: [
           {"id":"1", "name":"IMDB ↓", "order": "imdbMe"},
           {"id":"2", "name":"IMDB ↑", "order": "imdbMa" }, 
           {"id":"3", "name":"Año ↓", "order": "yearMe"},
           {"id":"4", "name":"Año ↑", "order": "yearMa"},
           {"id":"5", "name":"Agregada ↓", "order": "addMe"},
           {"id":"6", "name":"Agregada ↑", "order": "addMa"},
       ],
       ordenSelected: "", 
       tipo: "pelicula", 
       generos:[], 
       skeletonmio: true,
       paises: [], 
       series: [], 
       totalPaginas: 0, 
       registrosxPag: 10,
      paginaActual: 1, 
       num_actual_ini: 1,
        num_actual_fin: 3,
        ini: 0, 
        fin: 10,
        yearI:2000, 
        yearE: 2020, 
        imdbI: 0, 
        imdbE: 10,
        genSerie: "",
        pais: "",
        parametros: false, 
        urlTest: {
          
        }
        }
    },
      computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
      buscarOrdenar(payload) {
           console.log(payload.id);
           let params = new URLSearchParams(location.search);
              if(payload.id == 1){
                //IMDB menor
                    
                    if(params.get('Order') == 'imdbMe' ){
                    //son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
                    }else{
                    //son diferentes aqui si hago
                    this.urlTest.Order = payload.order
                    this.$store.commit('scrollToTop');
                    this.$router.push({  name: 'Descubrir', query: this.urlTest })
                
                    }
              }
              if(payload.id == 2){
                //IMDB Mayor
                 if(params.get('Order') == 'imdbMa' ){
                    //son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
                    }else{
                    //son diferentes aqui si hago
                    this.urlTest.Order = payload.order
                    this.$store.commit('scrollToTop');
                    this.$router.push({  name: 'Descubrir', query: this.urlTest })
                
                    }
              }
              if(payload.id == 3){
                //Año menor
                 if(params.get('Order') == 'yearMe' ){
                    //son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
                    }else{
                    //son diferentes aqui si hago
                    this.urlTest.Order = payload.order
                    this.$store.commit('scrollToTop');
                    this.$router.push({  name: 'Descubrir', query: this.urlTest })
                
                    }
              }
              if(payload.id == 4){
                //Año Mayor
                 if(params.get('Order') == 'yearMa' ){
                    //son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
                    }else{
                    //son diferentes aqui si hago
                    this.urlTest.Order = payload.order
                    this.$store.commit('scrollToTop');
                    this.$router.push({  name: 'Descubrir', query: this.urlTest })
                
                    }
              }
              if(payload.id == 5){
                //Agregada menor
                 if(params.get('Order') == 'addMe' ){
                    //son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
                    }else{
                    //son diferentes aqui si hago
                    this.urlTest.Order = payload.order
                    this.$store.commit('scrollToTop');
                    this.$router.push({  name: 'Descubrir', query: this.urlTest })
                
                    }
              }
              if(payload.id == 6){
                //Agregada Mayor
                 if(params.get('Order') == 'addMa' ){
                    //son los mismos parametros los q dan clic y los que vienen de arriba por lo tanto no hago nada
                    }else{
                    //son diferentes aqui si hago
                    this.urlTest.Order = payload.order
                    this.$store.commit('scrollToTop');
                    this.$router.push({  name: 'Descubrir', query: this.urlTest })
                
                    }
              }


          }, 
      cerrarYear(){
     delete this.urlTest.yearI;
     delete this.urlTest.yearE;
          this.$store.state.DesYearI = 0
      this.$store.state.DesYearE = 0
     	this.$store.commit('scrollToTop');
		
			this.$router.push({ name: 'Descubrir',  query: this.urlTest })
      },
       cerrarImdb(){
     delete this.urlTest.imdbI;
     delete this.urlTest.imdbE;
 
    
      this.$store.state.DesImdbI = 0; 
      this.$store.state.DesImdbE = 0; 
     	this.$store.commit('scrollToTop');
		
			this.$router.push({ name: 'Descubrir',  query: this.urlTest })
      },
      cerrarGenSerie(){
      delete this.urlTest.genS;
      this.$store.state.DesGenSerie = ""; 
     	this.$store.commit('scrollToTop');
			this.$router.push({ name: 'Descubrir',  query: this.urlTest })
      },
      cerrarPais(){
delete this.urlTest.pais;
      this.$store.state.DesPais = ""; 
     	this.$store.commit('scrollToTop');
			this.$router.push({ name: 'Descubrir',  query: this.urlTest })
      },
		async getDescubrir(){
      const valores = window.location.search;
           const urlParams = new URLSearchParams(valores);
           let params = new URLSearchParams(location.search);
            
           //parametros 
          var yearsI = params.get('yearI'); 
          var yearsE = params.get('yearE'); 
          var imdbI = params.get('imdbI'); 
          var imdbE = params.get('imdbE'); 
          var genS = params.get('genS'); 
          var pais = params.get('pais'); 
          var Order = params.get('Order'); 
          
          console.log(this.urlProcesos +
          "wp-json/buscador/descubrir/post/?t="+this.tipo
          +"&yearI="+yearsI+"&yearE="+yearsE+"&imdbI="+imdbI+"&imdbE="+imdbE
          +"&genS="+genS+"&pais="+pais+"&Order="+Order
          +"&xPag="+this.registrosxPag+"&ini="+this.ini+"&fin="+this.fin)
            await fetch(this.urlProcesos +
          "wp-json/buscador/descubrir/post/?t="+this.tipo
          +"&yearI="+yearsI+"&yearE="+yearsE+"&imdbI="+imdbI+"&imdbE="+imdbE
          +"&genS="+genS+"&pais="+pais+"&Order="+Order
          +"&xPag="+this.registrosxPag+"&ini="+this.ini+"&fin="+this.fin)
                    .then((r) => r.json())
                    .then((res) => {
               //      console.log(res)
                     this.$store.commit('scrollToTop');
                     this.generos = res[0].generos; 
                     this.paises = res[0].paises;
                     this.series = res[0].series;
                     this.$store.state.skeleton = 1
                this.skeletonmio = false
                     this.totalPaginas =  res[0].totalPaginas;
                      this.paginaActual = parseInt(this.$route.params.pag); 
                     if(this.$route.params.pag > 1){
                       
                   
                       this.fin = this.registrosxPag
                       this.num_actual_fin = 5
                       if(this.$route.params.pag > 4){
                         if(this.$route.params.pag == this.totalPaginas){
                     
                           this.num_actual_ini = this.paginaActual - 2
                           this.num_actual_fin = this.totalPaginas
                         }else
                         {
                            this.num_actual_ini = this.paginaActual - 2
                          this.num_actual_fin = this.paginaActual + 2
                       
                         }
                         
                       }
                       
                     }else
                     {
                       this.paginaActual = 1
                       this.num_actual_fin = 3
                     
                     }
                     
                    }
                    );
           }, 
		
    },
     components: {
         dropdown, DescubrirSidebar, DescubrirContent, SkeletonMio
         }, 
         created() {

          
        //   console.log(window.location.search)
           const valores = window.location.search;
           const urlParams = new URLSearchParams(valores);
           let params = new URLSearchParams(location.search);

           if(urlParams.has('s')==false){
              this.tipo = 'pelicula'
           }else{
                  this.tipo = params.get('s')
           }
      if(urlParams.has('Order')==false){
        this.ordenSelected = this.opcionesDrop[5]
      }else{

        if(params.get('Order') == 'imdbMe'){
          this.parametros = true; 
            this.ordenSelected = this.opcionesDrop[0]
            this.urlTest.Order = "imdbMe"
        }
        if(params.get('Order') == 'imdbMa'){
          this.parametros = true; 
            this.ordenSelected = this.opcionesDrop[1]
            this.urlTest.Order = "imdbMa"
        }
        if(params.get('Order') == 'yearMe'){
          this.parametros = true; 
            this.ordenSelected = this.opcionesDrop[2]
             this.urlTest.Order = "yearMe"
        }
        if(params.get('Order') == 'yearMa'){
          this.parametros = true; 
            this.ordenSelected = this.opcionesDrop[3]
             this.urlTest.Order = "yearMa"
        }
        if(params.get('Order') == 'addMe'){
          this.parametros = true; 
            this.ordenSelected = this.opcionesDrop[4]
             this.urlTest.Order = "addMe"
        }
        if(params.get('Order') == 'addMa'){
          this.parametros = true; 
            this.ordenSelected = this.opcionesDrop[5]
             this.urlTest.Order = "addMa"
        }
        
      }
        


           
           const
  keys = urlParams.keys(),
  values = urlParams.values(),
  entries = urlParams.entries();
//console.log(urlParams.has('yearI'))
if(urlParams.has('yearI')==false && urlParams.has('yearE')==false
&& urlParams.has('imdbI')==false && urlParams.has('imdbE')==false
&& urlParams.has('genS')==false && urlParams.has('pais')==false && urlParams.has('s')==false
){
  //no hay ni un parametro 
  this.$store.state.s = "serie"
      this.$store.state.DesYearI = 0
      this.$store.state.DesYearE = 0
      this.yearI = 2000; 
      this.yearE = 2020;
      this.$store.state.DesImdbI = 0; 
      this.$store.state.DesImdbE = 0; 
      this.imdbI = 0; 
      this.imdbE = 10; 
      this.$store.state.DesGenSerie = "";
      this.genSerie = ""
      this.$store.state.DesPais = "";
      this.pais = ""
     // console.log(this.$store.state.DesYearI)
}else{
  var yearsI = parseInt(params.get('yearI')); 
  var yearsE = parseInt(params.get('yearE')); 
  var imdbI = parseInt(params.get('imdbI')); 
  var imdbE = parseInt(params.get('imdbE')); 
  var genS = params.get('genS'); 
    var pais = params.get('pais'); 
    var s = params.get('s'); 
  //existe algun parametro de los mios 
    for (const value of keys) {
        if(value == 'yearI' || value == 'yearE' || value == 'imdbI' || value == 'imdbE'
        || value == 'genS'   || value == 'pais' || value == 's'
        ){
          if(urlParams.has('yearI')==true && urlParams.has('yearE')==true){
            //años
             this.urlTest.yearI = yearsI
             this.urlTest.yearE = yearsE
             this.$store.state.DesYearI = yearsI
              this.$store.state.DesYearE = yearsE
              this.yearI = yearsI
              this.yearE = yearsE
          }
         
           if(urlParams.has('imdbI')==true && urlParams.has('imdbE')==true){
              //imdb
              this.urlTest.imdbI = imdbI
             this.urlTest.imdbE = imdbE
              this.$store.state.DesImdbI = imdbI; 
             this.$store.state.DesImdbE = imdbE;
                 this.imdbI = imdbI;
                this.imdbE = imdbE; 
          }

          
           if(urlParams.has('genS')==true ){
              //Genero Serie
              this.urlTest.genS = genS
             this.$store.state.DesGenSerie = genS
                this.genSerie = genS
          }

           if(urlParams.has('pais')==true ){
              //Genero Serie
              this.urlTest.pais = pais
             this.$store.state.DesPais = pais
                this.pais = pais
          }
          if(urlParams.has('s')==true ){
              //Genero Serie
              this.urlTest.s = s
             this.$store.state.s = s
                this.tipo = s
          }
          
         
          
          this.parametros = true; 
        }
    }
}


           this.$store.state.skeleton = 1
        
         },
  mounted() {

   

if(this.$route.params.pag > 1){
  
    this.ini = (parseInt(this.$route.params.pag) - 1) * this.registrosxPag;
    
}else{

    this.ini = 0; 
}


this.getDescubrir();
    },
}
</script>
