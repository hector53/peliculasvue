<template>
    <div>
        <aside id="primary-sidebar">
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
									<a href="https://yabancidizi.vip/trends" data-navigo="">
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-trending-new"></use>
											</svg>
										</span>Tendencias </a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/takvim" data-navigo="">
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-calendar-new"></use>
											</svg>
										</span>Calendario </a>
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
								<li>
									<a href="https://yabancidizi.vip/forum" data-navigo="">
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-comment-new"></use>
											</svg>
										</span>Foro </a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/koleksiyon" data-navigo="">
										<span>
											<svg class="mofycon">
												<use xlink:href="#icon-collections-new"></use>
											</svg>
										</span>Colecciones </a>
								</li>
							
							</ul>
						</section>
						<section class="guide-menu">
							<h5 class="section-heading">Haftalık Trendler</h5>
							<ul class="trending-thisweek">
								<li>
									<a href="https://yabancidizi.vip/dizi/friends-izle-1" data-navigo="">
										<h5 class="truncate" title="Friends izle">#Friends</h5>
										<small>+1628572 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/the-100-izle-1" data-navigo="">
										<h5 class="truncate" title="The 100 izle">#The 100</h5>
										<small>+943712 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/lucifer-izle" data-navigo="">
										<h5 class="truncate" title="Lucifer izle">#Lucifer</h5>
										<small>+900341 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/prison-break-izle" data-navigo="">
										<h5 class="truncate" title="Prison Break izle">#Prison Break</h5>
										<small>+690859 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/atiye-izle-7" data-navigo="">
										<h5 class="truncate" title="Atiye izle">#Atiye</h5>
										<small>+649395 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/la-casa-de-papel-izle-20" data-navigo="">
										<h5 class="truncate" title="La Casa De Papel izle">#La Casa De Papel</h5>
										<small>+504387 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/the-vampire-diaries" data-navigo="">
										<h5 class="truncate" title="The Vampire Diaries izle">#The Vampire Diaries</h5>
										<small>+491405 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/family-guy-izle" data-navigo="">
										<h5 class="truncate" title="Family Guy izle">#Family Guy</h5>
										<small>+485770 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/the-boys" data-navigo="">
										<h5 class="truncate" title="The Boys izle">#The Boys</h5>
										<small>+369160 puan</small>
									</a>
								</li>
								<li>
									<a href="https://yabancidizi.vip/dizi/brooklyn-nine-nine-izle" data-navigo="">
										<h5 class="truncate" title="Brooklyn Nine-Nine izle">#Brooklyn Nine-Nine</h5>
										<small>+358888 puan</small>
									</a>
								</li>
							</ul>
						</section>
						
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
export default {
  name: 'SidebarMovie'
}
</script>