<template>
<div class="dark-segment" >

    
    <div class="segment-title largest" :id="'go-'+letra">{{letra}}</div>
    
		<ul class="clearfix new-tvseries" >
			<li class="segment-poster-sm"  v-for="(item, index) in ABCList" :key="index">
                
						<div class="poster poster-xs">
	 <router-link   @click.native="$store.commit('scrollToTop')" :to="{ name: 'detalleSeries', params: {slug: item.slug} }">
								<div style="position:relative">
									<img :alt="item.titulo" class="lazy-wide loaded" :src="item.imagen" >
								</div>
								<div class="poster-subject">
									<h2 class="truncate">{{item.titulo}}</h2>
								</div>
							</router-link >
						</div>
			</li>
            
		</ul>
        
        <button type="button" class="ui button load-more series-load-more"
                :class="{'disabled' : btnCargarMas}" data-page="1" @click.prevent="cargarMas()">
                    <svg
                        class="mofycon">
                        <use xlink:href="#icon-plus"></use>
                    </svg>Cargar Más</button>
</div>

</template>

<script>
import {mapState} from 'vuex'

export default {
  name: 'VerSeriesABCList',
     props: {
        letra:{
            type: String, 
            required: true,
        },
    },
    data (){
       return {
            ABCList: [], 
            btnCargarMas: false,
           pag: 0
        }
    },
     computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
         cargarMas(){
            this.pag++; 
            this.btnCargarMas = true; 
              if(this.letra == '#'){
          this.getNotABC();
      }else
      {
          //console get letras
       //   console.log("get letras")
          this.getABC();
          
      }
        }, 
         async getNotABC(){
            await fetch(this.urlProcesos +
          "wp-json/series/ABC/post/?tipo=1&pag="+this.pag)
                    .then((r) => r.json())
                    .then((res) => {
                          if(this.pag == 0){
                         this.ABCList = res
                        
                        }
                        if(this.pag > 0){
                    //        console.log(this.ABCList)
                            //sumar resultados al array
                            res.forEach(child => {
                               // console.log(child)
                                this.ABCList.push(child); 
                            });
                      //      console.log(this.ABCList)
                                this.btnCargarMas = false; 
                        }
                      
                    }
                    );
           }, 
           async getABC(){
             
            await fetch(this.urlProcesos +
          "wp-json/series/ABC/post/?tipo=2&letra="+this.letra+"&pag="+this.pag)
                    .then((r) => r.json())
                    .then((res) => {

                       if(this.pag == 0){
                         this.ABCList = res
                        
                        }
                        if(this.pag > 0){
                       //     console.log(this.ABCList)
                            //sumar resultados al array
                            res.forEach(child => {
                               // console.log(child)
                                this.ABCList.push(child); 
                            });
                       //     console.log(this.ABCList)
                                this.btnCargarMas = false; 
                        }



                        
                         if(this.letra == "J"){
                             this.$store.state.skeleton = 1
                         }
                    }
                    );
           }, 
    },
    mounted() {
      if(this.letra == '#'){
          this.getNotABC();
      }else
      {
          this.getABC();
          
      }
    }
}
</script>