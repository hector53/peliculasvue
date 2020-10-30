import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    urlProcesos: 'http://app-moviewp.ofs6ea9lw6-e9249nx8d6kr.p.runcloud.link/'
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
