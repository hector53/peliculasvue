<template>
 <div class="inner-content container" id="page-index">


<h1 class="page-title pt-sm pb-lg">Series del Mes</h1>

	
<div class="calendar-item" v-for="(movie, index) in arrayCalendario" :key="index">
			<div class="date">
				<span>{{movie.diaSemana}}</span><strong>{{movie.dia}}</strong>{{movie.mesActual}}
			</div>
			<div class="calendar-item-list">
				<div class="dark-segment">
					<ul class="clearfix">
                        
                    <li class="segment-poster-sm" v-for="(movie2, index) in movie.items" :key="index" v-show="movie.items != 0">
                        <div class="poster poster-xs">
                            <router-link @click.native="$store.commit('scrollToTop')"
                            :to="{ name: 'detalleSeriesTemporadasCapitulos', 
                            params: {slug: movie2.slug, id_temp: movie2.temporada, id_cap: movie2.capitulo } }">
                                <div class="poster-subject">
                                    <h2 class="truncate">{{movie2.titulo}}</h2>
                                    <p class="poster-meta">
                                        <span class="episode-no">Temporada {{movie2.temporada}} · Capitulo {{movie2.capitulo}}</span>
                                    </p>
                                </div>
                                <img alt="..." class="lazy-wide loaded" :src="movie2.imagen" data-src="/uploads/series/vikings-izle-1.jpg?v=0.01" data-was-processed="true">
                            </router-link>
                        </div>
                    </li>
            
                 </ul>
				</div>
			</div>
		</div>				
				

			</div>
</template>

<script>
import {mapState} from 'vuex'

export default {
  name: 'Calendario', 
  data() {
    return {
      arrayCalendario: []
    };
  }, 
   computed:{
        ...mapState(['urlProcesos'])
    },
   components:{
      
	},
	methods: {
  async getCalendar(){

              await fetch(this.urlProcesos+'wp-json/calendario/all/')
                    .then((r) => r.json())
                    .then((res) => {
                        console.log(res);
                     this.arrayCalendario = res
                    }
                    );

        }
	}, 
	 mounted() {
this.$store.state.skeleton = 1
this.getCalendar()
  },
}
</script>