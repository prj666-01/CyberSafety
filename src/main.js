import Vue from 'vue'
import App from './App.vue'
import VeeValidate from 'vee-validate'
import 'vue-trix'
import router from './router'
import VModal from 'vue-js-modal'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css' 

Vue.use(Vuetify)
Vue.use(VModal)
Vue.use(BootstrapVue);
Vue.use(VeeValidate);
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
  data: {
    showModal: false
  }
}).$mount('#app')
