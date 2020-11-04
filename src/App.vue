<template>
  <div id="app">

  <main id="wrapper">
		<!--header logo y register-->
			<HeaderMovie />
		<!-- fin header logo y register-->

		<div id="wrapper-inner">
			<div class="triggered-overlay"></div>
				<!--Sidebar Menu-->
				<SidebarMovie />
				<!-- fin Sidebar Menu-->


			<div id="content">
			<transition name="fade">
				<router-view :key="$route.fullPath"></router-view>
      	    </transition>
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

export default {
  name: 'App',
  components: {
    HeaderMovie, SidebarMovie, FooterMovie, SymbolsMovie
  }
}
</script>

<style>
</style>
