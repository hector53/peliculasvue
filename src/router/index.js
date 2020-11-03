import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import MoviesDetails from '../views/MoviesDetails.vue'
import SeriesDetails from '../views/SeriesDetails.vue'
import SeriesDetailsCap from '../views/SeriesDetailsCap.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
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

export default router
