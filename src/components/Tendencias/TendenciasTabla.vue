<template>
<div class="ui dark card">
		<h2 class="header">
			<span class="segment-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tendencias de todos los tiempos</font></font></span>
					</h2>
		<div class="content">
			<table class="ui inverted unstackable table">
				<thead>
					<tr>
						<th>#</th>
						<th class="poster"></th>
						<th class="details"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Detalle</font></font></th>
						<th class="type"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo</font></font></th>
						<th width="140px" class="imdb"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IMDb</font></font></th>
						<th width="140px" class="trend_point"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vistas</font></font></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(movie, index) in arrayDatos" :key="index">
						<td>#{{index}}</td>
						<td class="poster">
                            <router-link @click.native="$store.commit('scrollToTop')"
                             :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                            <img :src="movie.imagen"
                             :alt="movie.titulo">
                             </router-link>
                             </td>
						<td class="details">
							<router-link @click.native="$store.commit('scrollToTop')"
                             :to="{ name: 'detalleSeries', params: {slug: movie.slug} }">
                             {{movie.titulo}}</router-link>
							<div class="category">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        {{movie.generos}}</font></font></div>
						</td>
						<td class="type"><div class="ui black tiny label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Serie</font></font></div></td>
						<td class="imdb"><svg class="mofycon"><use xlink:href="#icon-star">
                            </use></svg>{{movie.imdb}}</td>
						<td class="trend_point">+ {{movie.visitas}}</td>
					</tr>
								
						</tbody>
			</table>
		</div>
</div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";

export default {
  name: "TendenciasTabla",
   props: [],
  data() {
    return {
        arrayDatos: [], 
    };
  },
  computed: {
    ...mapState(["urlProcesos", "skeleton"]),
  },

  methods: {
      async getDatos(){
             await     fetch( this.urlProcesos +"wp-json/tendencias/all/?q=getT")
            .then((r) => r.json())
            .then((res) => {
                console.log(res)
                this.arrayDatos = res
            });
      }
    },
  components: {},
  mounted() {
      this.getDatos()
      
  },
};
</script>
<style >
</style>