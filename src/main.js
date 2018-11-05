import Vue from 'vue'
import App from './App.vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import HorizontalStepper from 'vue-stepper';

Vue.use(HorizontalStepper);
Vue.use(BootstrapVue);
// var session_url = "http://myvmlab.senecacollege.ca:6255/manali/api.php";

var mixin = {
  data: {
		users: [],
		newUser: {username: "", email: "", mobile: ""},
	},
  methods: {
    foo: function () {
      // console.log('foo')
    }
    // getAllUsers: function(){
    //
		// 	axios.get("http://myvmlab.senecacollege.ca:6255/api/get/users/1")
		// 	.then(function(response){
		// 		if (response.data.error) {
		// 			vm.errorMessage = response.data.message;
		// 		}else{
		// 			vm.users = response.data;
		// 		}
		// 	});
    // },
    // updateSigninCounter: function(username){
    //   axios.get("http://localhost:8081/api.php?action=updateSigninCounter&username="+ username,{},{
		// 		// auth:{
		// 		// 	username: 'Group-01',
		// 		// 	password : 'gkHQ4574'
		// 		// }
		// 	})
		// 	.then(function(response){
		// 		if (response.data.error) {
		// 			vm.errorMessage = response.data.message;
		// 		}else{
		// 			console.log("updated");
		// 		}
		// 	});
    // }
  }
}

// new Vue({
//   el: '#app',
//   render: h => h(App)
// })

var vm = new Vue({
  el: '#app',
  mixins: [mixin],
  render: h => h(App)
})
global.vm = vm;
