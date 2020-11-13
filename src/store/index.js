import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    urlProcesos: 'https://api.pelisflix.com/',
    skeleton:0
  },
  mutations: {
    scrollToTop() {
      window.scrollTo(0,0);
      this.state.skeleton = 0;
    //  console.log(this.state.skeleton)
    }, 
   
  },
  actions: {
  },
  modules: {
  }
})
