<template>
  <div id="app">

  <main id="wrapper">
		<!--header logo y register-->
			<HeaderMovie ref="HeaderMovies" />
		<!-- fin header logo y register-->

		<div id="wrapper-inner">
			<div class="triggered-overlay"></div>
				<!--Sidebar Menu-->
				<SidebarMovie />
				<!-- fin Sidebar Menu-->


			<div id="content">
		
				<router-view :key="$route.fullPath" v-show="skeleton==1"></router-view>
				<skeleton-loading v-show="skeleton==0">
            <row style="width:95%; margin:auto"
                :gutter="{
                    bottom: '15px'
                }"
            >
                <square-skeleton 
                    :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						 width: '50px',
                    }"
                >
                </square-skeleton>

            </row>
			<row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						 width: '150px',
                    }"
                >
                </square-skeleton>


			</row>
				<row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="1"
                    :boxProperties="{
                        top: '10px',
                        height: '26px',
						
                    }"
                >
                </square-skeleton>


			</row>

				<row style="width:95%; margin:auto">
                    <column :span="8" :gutter="0">
                    <square-skeleton :backColor="'#1b1d26'"
						:count="1"
						:boxProperties="{
							top: '10px',
							height: '400px',
							
						}"
					>
					</square-skeleton>
                     </column>
                <column :span="20" :gutter="10">
                      	<square-skeleton :backColor="'#1b1d26'"
                            :count="5"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                             
                                
                            }"
                        >
                        </square-skeleton>
                        <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                               width: '150px',
                                
                            }"
                        >
                        </square-skeleton>
                         <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '60px',
                                height: '26px',
                               width: '100px',
                                
                            }"
                        >
                        </square-skeleton>
                         <square-skeleton :backColor="'#1b1d26'"
                            :count="1"
                            :boxProperties="{
                                top: '10px',
                                height: '26px',
                               width: '100px',
                                
                            }"
                        >
                        </square-skeleton>
                </column>
		 	  


			</row>
            <row style="width:95%; margin:auto">
				<square-skeleton :backColor="'#1b1d26'"
                    :count="2"
                    :boxProperties="{
                        top: '10px',
                        height: '46px',
						
                    }"
                >
                </square-skeleton>


			</row>
        </skeleton-loading>
      	    
			</div>
		</div>
		<FooterMovie />


	</main>
		<SymbolsMovie />

  </div>
</template>

<script>
// @ is an alias to /src
import HeaderMovie from '@/components/MoviesHome/HeaderMovie.vue'
import SidebarMovie from '@/components/MoviesHome/SidebarMovie.vue'
import FooterMovie from '@/components/MoviesHome/FooterMovie.vue'
import SymbolsMovie from '@/components/MoviesHome/SymbolsMovie.vue'
import {mapState} from 'vuex'

export default {
  name: 'App',
  computed:{
        ...mapState(['skeleton'])
    },
  components: {
    HeaderMovie, SidebarMovie, FooterMovie, SymbolsMovie
  }
}
</script>

<style>

</style>
