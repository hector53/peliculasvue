import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    urlProcesos: 'https://api.pelisflix.com/',
    skeleton:0, 
    DesYearI: 2000, 
    DesYearE: 2020, 
    DesImdbI: 0, 
    DesImdbE: 10, 
    DesGenSerie: "", 
    DesPais: ""
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
