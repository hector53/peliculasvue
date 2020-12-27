import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import MoviesDetails from '../views/MoviesDetails.vue'
import SeriesDetails from '../views/SeriesDetails.vue'
import SeriesDetailsCap from '../views/SeriesDetailsCap.vue'
import VerSeries from '../views/VerSeries.vue'
import VerPeliculas from '../views/VerPeliculas.vue'
import Descubrir from '../views/Descubrir.vue'
import VerPerfil from '../views/VerPerfil.vue'
import Colecciones from '../views/Colecciones.vue'
import ColeccionDetalle from '../views/ColeccionDetalle.vue'
import Foro from '../views/Foro.vue'
import Tendencias from '../views/Tendencias.vue'
import Actores from '../views/Actores.vue'
import NProgress from 'nprogress';
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/tendencias/',
    name: 'Tendencias',
    component: Tendencias
  },
  {
    path: '/foro/',
    name: 'Foro',
    component: Foro
  },
  {
    path: '/foro/:foro_slug',
    name: 'ForoVerSeccion',
    component: Foro
  },
  {
    path: '/foro/:foro_slug/:tema_slug',
    name: 'ForoVerTema',
    component: Foro
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
    path: '/ver-peliculas/:pag',
    name: 'VerPeliculasPag',
    component: VerPeliculas
  },
  {
    path: '/colecciones/',
    name: 'Colecciones',
    component: Colecciones
  },
  {
    path: '/colecciones/:username/:slug',
    name: 'ColeccionDetalle',
    component: ColeccionDetalle
  },
  {
    path: '/perfil/:user',
    name: 'PerfilUser',
    component: VerPerfil
  },
  {
    path: '/descubrir/',
    name: 'Descubrir',
    component: Descubrir, 
    props: true
  },
  {
    path: '/descubrir/:pag',
    name: 'DescubrirPag',
    component: Descubrir
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
}, 
{
  path: '/actor/:slug',
  name: 'VerActor',
  component: Actores
},
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
