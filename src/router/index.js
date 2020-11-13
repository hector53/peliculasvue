import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import MoviesDetails from '../views/MoviesDetails.vue'
import SeriesDetails from '../views/SeriesDetails.vue'
import SeriesDetailsCap from '../views/SeriesDetailsCap.vue'
import VerSeries from '../views/VerSeries.vue'
import VerPeliculas from '../views/VerPeliculas.vue'
import NProgress from 'nprogress';
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/ver-series/',
    name: 'VerSeries',
    component: VerSeries
  },
  {
    path: '/ver-peliculas/',
    name: 'VerPeliculas',
    component: VerPeliculas
  },
  {
    path: '/peliculas/:slug', 
    name: 'detallePeliculas', 
    component: MoviesDetails
  },
  {
    path: '/series/:slug', 
    name: 'detalleSeries', 
    component: SeriesDetails
    }, 
{
    path: '/series/:slug/temporada/:id_temp', 
    name: 'detalleSeriesTemporadas', 
    component: SeriesDetails
},
{
path: '/series/:slug/temporada/:id_temp/capitulo/:id_cap', 
name: 'detalleSeriesTemporadasCapitulos', 
component: SeriesDetailsCap
}
]

const router = new VueRouter({
  mode: 'history',
  baseUrl: '',
  base: process.env.BASE_URL,
  routes
})
router.beforeResolve((to, from, next) => {
  if (to.name) {
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  NProgress.done()
})

export default router
