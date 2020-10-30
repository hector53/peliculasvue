<template>
    <div>
        <header id="header">
			<button class="mobile-menu-trigger"><span></span></button>
			<div id="logo">
				<a href="#" data-navigo="">Peliculas Turkass</a>
			</div>
			<div id="header-middle">
				<div id="search">
					<div>
						<span class="deleteicon"></span>
						<label for="tvSearch">
							<input type="search" name="search" class="form-control deletable" autocomplete="off"
								id="tvSearch" placeholder="Search Movies Here">
						</label>
						<button type="button" aria-label="Dizi veya film ara">
							<svg class="mofycon">
								<use xlink:href="#icon-search"></use>
							</svg>
						</button>
					</div>
					<div id="search-results" style="display: none;">
						<div class="section-heading">En İyi Sonuçlar</div>
						<div id="search-response"></div>
					</div>
				</div>
				<div id="user">
					<div class="left floated author">
						<a class="ui button secondary" onlyusers="">Login</a>
						<a id="user-register" class="ui button secondary hidden-xs">Register</a>
					</div>
				</div>
			</div>
		</header>
    </div>
</template>

<script>
export default {
  name: 'HeaderMovie'
}
</script>