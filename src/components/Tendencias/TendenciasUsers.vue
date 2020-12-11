<template>
<div class="ui dark-line card">
				<h2 class="header"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuarios</font></font></h2>
				<div class="content">
					<div class="global-box">
						<div class="ui middle aligned divided list">
					    	<div class="item artist" v-for="(movie, index) in arrayDatos" :key="index">
								<a href="#" data-navigo="">
									<div class="artist-photo">
                                        <img :src="movie.imagen"></div>
									<div class="content">
										<h5 class="truncate">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{movie.username}}</font>
                                                </font></h5><small><font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">@{{movie.username}}</font></font></small>										<div class="description">
											<div class="ui tiny progress" 
                                            data-percent="0" data-tooltip="LVL: 1 / EXP: 0	%" 
                                            data-inverted="">
												<div class="bar" 
                                                style="transition-duration: 300ms; width: 0%;"></div>
											</div>
										</div>
									</div>
									<span class="points">+{{movie.visitas}}</span>
								</a>
							</div>
						</div>
					</div>
				</div>
</div>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";

export default {
  name: "TendenciasUsers",
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
             await     fetch( this.urlProcesos +"wp-json/tendencias/all/?q=getU")
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