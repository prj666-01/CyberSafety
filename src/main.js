import Vue from 'vue'
import App from './App.vue'
import VeeValidate from 'vee-validate'
import 'vue-trix'
import router from './router'
import VModal from 'vue-js-modal'
import BootstrapVue from 'bootstrap-vue'
//for regular bootstrap
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
//for vueeditor
import { VueEditor } from "vue2-editor";

Vue.use(VModal);
Vue.use(VueEditor);
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