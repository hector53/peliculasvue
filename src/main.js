import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Cookies from 'js-cookie'
Vue.use(Cookies ); 
import vueScrollto from 'vue-scrollto'
Vue.use(vueScrollto ); 

import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2 ); 

import VueSkeletonLoading from 'vue-skeleton-loading';
 
Vue.use(VueSkeletonLoading);


import Notifications from 'vue-notification'
Vue.use(Notifications)

Vue.notify({
  group: 'notificacionLikes',
  title: 'Error',
  text: 'Hello user! This is a notification!', 
  closeOnClick: true
})


import './assets/css/swiper.css'
import './assets/css/main.css'
import './assets/css/yds.min.css'
import './assets/css/yds-theme.min.css'
import './assets/css/icon.min.css'
import '../node_modules/nprogress/nprogress.css'

Vue.config.productionTip = false


const vm = new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')

global.vm = vm; //Define you app variable globally