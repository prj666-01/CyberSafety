<template>

  <div id="app">
    <!-- <b-navbar toggleable="md" type="dark" variant="primary">
      <b-navbar-toggle target="nav_collapse">
    </b-navbar-toggle>

  <b-navbar-brand href="#/">Home</b-navbar-brand>

  <b-collapse is-nav id="nav_collapse">
    <b-navbar-nav class="ml-auto">
      <b-nav-item-dropdown text="Options" right>
        <b-dropdown-item href="#/MyCourses">My Courses</b-dropdown-item>
        <b-dropdown-item href="#/CreateCourse">Create Course</b-dropdown-item>
        <b-dropdown-item href="#">Modify Course</b-dropdown-item>
        <b-dropdown-item href="#">Deactivate Course</b-dropdown-item>
        <b-dropdown-item href="#">Clone Course</b-dropdown-item>
        <b-dropdown-item href="#">Course Status</b-dropdown-item>
        <b-dropdown-item href="#">Merge Course</b-dropdown-item>
        <b-dropdown-item href="#">Present Course</b-dropdown-item>
        <b-dropdown-item href="#">View Course</b-dropdown-item>
      </b-nav-item-dropdown>
      <b-nav-item @click="showLogin" >Login</b-nav-item>
      <b-nav-item @click="showSignUp">Signup</b-nav-item>
    </b-navbar-nav>
  </b-collapse>
    </b-navbar> -->
    <router-view />

  <!-- //   <modal name="login">
  //   <h1>Login</h1>
  //   <b-form-input v-model="userName" type="text" placeholder="Username"></b-form-input>
  //   <b-form-input v-model="password" type="password" placeholder="Password"></b-form-input>
  //   <b-button @click="hideLogin">
  //     Close
  //   </b-button>
  //   <b-button @click="login">
  //     Login
  //   </b-button>
  //   <span v-if ="error">Please check your username or password</span>
  //   </modal>

  //   <modal name="signup">
  //   <h1>Sign Up</h1>
  //   <b-form-input v-model="userName" type="text" placeholder="Username"></b-form-input>
  //   <b-form-input v-model="password" type="password" placeholder="Password"></b-form-input>
  //   <b-button @click="hideSignUp">
  //     Close
  //   </b-button>
  //   </modal> -->
   </div>
</template>

<script>
import axios from 'axios';
import Modules from './components/CreateCourse.vue'
export default {
  name: 'app',
  components: {
    Modules
  },
  data () {
    return {

      users:[],
      userName :'',
      password : '',
      signedinUserId: 0,
      error : false,
      
    }
  },
  // methods: {
  // showLogin () {
  //   this.$modal.show('login');
  // },
  // hideLogin () {
  //   this.$modal.hide('login');
  // },
  // showSignUp () {
  //   this.$modal.show('signup');
  // },
  // hideSignUp () {
  //   this.$modal.hide('signup');
  // },
  // login: function () {
  //     //if (this.username == undefined || this.password  == undefined ){
  //        // EventBus.$emit('error', 'test');
  //      // }
  //      // else{
  //        alert("signin");
  //        axios.get('http://myvmlab.senecacollege.ca:6255/api/users/', {

  //        auth: {
  //        username: 'Group-01',
  //        password: 'gkHQ4574'
  //        }
  //      }).then(response => {
  //        this.users = response.data;
  //         // console.log(this.users)
           
  //          for(var i=0; i < this.users.length; i++){
  //           // console.log(this.userName)
  //            if(this.userName.toLowerCase() == this.users[i].Username.toLowerCase() && this.password == this.users[i].Password){
  //              this.signedinUserId = this.users[i].id;
              
  //             //  if(this.userName.toLowerCase() == "colin"){
  //             //    this.goTo("/admin");
  //             //  } else {
  //             //    //  console.log(this.users[i])
  //             //      // this.closeModal();
  //             //      // this.viewCourse = true;
  //             //      // this.showSigninButton= false;
  //             //      // this.showSignupButton = false;
  //             //      // this.showSignoutButton = true;
  //                if(this.users[i].Badge_Id == "0"){
  //                   console.log(this.users[i].Badge_Id);
  //                   alert("not completed required courses");
  //                } else {
  //                   console.log(this.users[i].Badge_Id)
  //                  alert("show all options")
  //                  // this.closeModal();
  //                  // this.viewCourse = true;
  //                  // this.createCourse = true;
  //                  // this.presentCourse = true;
  //                  // this.showSigninButton= false;
  //                  // this.showSignupButton = false;
  //                  // this.showSignoutButton = true;
  //                }
  //             //  }
  //               this.hideLogin()
  //             }
  //            else {
  //               //  EventBus.$emit('error', 'test');
  //               this.error = true;
  //               // alert("No user .... Check user name or password.");
  //            }
  //           }

  //         });
  //     // }
  //  }
  // }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
body {
  background-color: #EEEEEE;
  font-family: 'Montserrat', sans-serif;
  display: grid;
  grid-template-rows: auto;
  justify-items: center;
  padding-top: 50px;
}
body, html {
  margin: 0;
  height: 100%;
}
#app {
    width: 90%;
}
h1 {
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: center;
}
nav {
}
nav a {
}
</style>
