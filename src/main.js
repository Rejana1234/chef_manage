import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

//sweet alert import

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

Vue.config.productionTip = false;

store.dispatch('attempt', localStorage.getItem('token'));

new Vue({
  router,
   store,
  render: h => h(App),
}).$mount('#app')
