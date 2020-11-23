import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    urlProcesos: 'https://api.pelisflix.com/',
    skeleton:0, 
<<<<<<< HEAD
    DesYearI: 2000, 
    DesYearE: 2020, 
    DesImdbI: 0, 
    DesImdbE: 10, 
    DesGenSerie: "", 
    DesPais: ""
=======
    DesYearI: 0, 
    DesYearE: 2020, 
    DesImdbI: 0, 
    DesImdbE: 0, 
    DesGenSerie: "", 
    DesPais: "", 
    s: "serie"
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
  },
  mutations: {
    scrollToTop() {
      window.scrollTo(0,0);
      this.state.skeleton = 0;
<<<<<<< HEAD
    //  console.log(this.state.skeleton)
=======
      console.log(this.state.skeleton)
>>>>>>> 888b87a8bfb0fc3a63d65e774fcb3970105dbf30
    }, 
   
  },
  actions: {
  },
  modules: {
  }
})
