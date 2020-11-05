import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'


import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2); 




import './assets/css/swiper.css'
import './assets/css/main.css'
import './assets/css/yds.min.css'
import './assets/css/yds-theme.min.css'
import './assets/css/icon.min.css'


Vue.config.productionTip = false


new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
