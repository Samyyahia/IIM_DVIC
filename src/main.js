import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import { firebaseApp } from '../firebase.config'

Vue.config.productionTip = false

// eslint-disable-next-line no-unused-expressions
firebaseApp

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
