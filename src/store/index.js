import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    urlProcesos: 'https://api.pelisflix.com/'
  },
  mutations: {
    scrollToTop() {
      window.scrollTo(0,0);
    }
  },
  actions: {
  },
  modules: {
  }
})
