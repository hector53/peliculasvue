<template>
    <div>
        <aside id="primary-sidebar" :class="{'triggered' : $store.state.dropdownHeader}"
		 v-click-outside="outSidebar">
				<div class="scroll-wrapper scrollbar-macosx" style="position: relative;">
					<div id="sidebar-inner" class="scrollbar-macosx scroll-content"
						style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 1178px;">
						<section class="guide-menu fluid">
							<h5 class="section-heading">Menú</h5>
							<ul class="guide-icon-menu">
								<li  :class="{'active': $route.name == 'Home'}" >
								
                                        <router-link  @click.native="$store.commit('scrollToTop')"  :to="{name:'Home'}"><span>
											<svg class="mofycon">
												<use xlink:href="#icon-home-new"></use>
											</svg>
                                        </span>Inicio</router-link>  
								</li>
								<li :class="{'active': $route.name == 'Descubrir'}">
                                <router-link  @click.native="$store.commit('scrollToTop')" :to="{name:'Descubrir'}"><span>
											<svg class="mofycon">
												<use xlink:href="#icon-discover-new"></use>
											</svg>
                                        </span>Descubrir</router-link> 
								</li>
								<li>
										 <router-link @click.native="$store.commit('scrollToTop')" 
								 :to="{name:'Tendencias'}">
									
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-trending-new"></use>
											</svg>
										</span>Tendencias </router-link>


								</li>
								<li>
								<router-link @click.native="$store.commit('scrollToTop')" 
								 :to="{name:'Calendario'}">
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-calendar-new"></use>
											</svg>
										</span>Calendario </router-link>
								</li>
								<li :class="{'active': $route.name == 'VerSeries'}">
									 <router-link @click.native="$store.commit('scrollToTop')" :to="{name:'VerSeries'}">
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-tv-new"></use>
											</svg>
										</span>Series 
									</router-link>
								</li>
								<li :class="{'active': $route.name == 'VerPeliculas'}">
								<router-link @click.native="$store.commit('scrollToTop')" :to="{name:'VerPeliculas'}">
									<span>
											<svg class="mofycon">
												<use xlink:href="#icon-film-new"></use>
											</svg>
										</span>Películas
									</router-link>
								</li>
								<li :class="{'active': $route.name == 'Foro'}">
								<router-link @click.native="$store.commit('scrollToTop')" 
								:to="{name:'Foro'}">
								
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-comment-new"></use>
											</svg>
										</span>Foro </router-link>
								</li>
								<li>
								 <router-link @click.native="$store.commit('scrollToTop')" 
								 :to="{name:'Colecciones'}">
									
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-collections-new"></use>
											</svg>
										</span>Colecciones </router-link>
								</li>
							
							</ul>
						</section>
						<SidebarTendencias />
						
					</div>
					<div class="scroll-element scroll-x">
						<div class="scroll-element_outer">
							<div class="scroll-element_size"></div>
							<div class="scroll-element_track"></div>
							<div class="scroll-bar"></div>
						</div>
					</div>
					<div class="scroll-element scroll-y">
						<div class="scroll-element_outer">
							<div class="scroll-element_size"></div>
							<div class="scroll-element_track"></div>
							<div class="scroll-bar"></div>
						</div>
					</div>
				</div>
			</aside>
    </div>
</template>


<script>
import ClickOutside from 'vue-click-outside'
import SidebarTendencias from '@/components/Sidebar/SidebarTendencias.vue'
export default {
  name: 'SidebarMovie', 
  methods: {
	  outSidebar(){
		//  this.$store.state.dropdownHeader = false
	  }
  },
     directives: {
    ClickOutside
  }, 
  components:{
      SidebarTendencias
	},
}
</script>