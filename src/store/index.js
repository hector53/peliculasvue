import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    urlProcesos: 'https://api.pelisflix.com/',
    skeleton:0, 
    DesYearI: 0, 
    DesYearE: 2020, 
    DesImdbI: 0, 
    DesImdbE: 0, 
    DesGenSerie: "", 
    DesPais: "", 
    s: "serie", 
    sessionCookie: false, 
    arraySession: {}, 
    dropdownHeader: false
  },
  mutations: {
    scrollToTop() {
      window.scrollTo(0,0);
      this.state.skeleton = 0;
 //     console.log(this.state.skeleton)
    }, 
    enableordisableCookie(state, payload) {
        if(payload.confirm == true){
          this.state.arraySession = payload.cookie
          this.state.sessionCookie = true
      //    console.log(this.state.arraySession)
        }else{
          this.state.arraySession = {}
          this.state.sessionCookie = false
        }
           
    }
   
  },
  actions: {
  },
  modules: {
  }
})
