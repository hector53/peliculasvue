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
           
        }
    },
     computed:{
        ...mapState(['urlProcesos'])
    },
    methods: {
         async getNotABC(){
            await fetch(this.urlProcesos +
          "wp-json/series/ABC/post/?tipo=1")
                    .then((r) => r.json())
                    .then((res) => {
                        this.ABCList = res
                      
                    }
                    );
           }, 
           async getABC(){
               this.ABCList = [];
            await fetch(this.urlProcesos +
          "wp-json/series/ABC/post/?tipo=2&letra="+this.letra)
                    .then((r) => r.json())
                    .then((res) => {
                        this.ABCList = res
                         if(this.letra == "Z"){
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