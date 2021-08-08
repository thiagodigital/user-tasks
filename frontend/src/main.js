import Vue from 'vue'
import App from './App.vue'
import router from './services/router'
import store from './services/store'

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
