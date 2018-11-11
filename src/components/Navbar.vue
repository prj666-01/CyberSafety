<template>

  <div id="na">
    <b-navbar toggleable="md" type="dark" variant="primary">
      <b-navbar-toggle target="nav_collapse">
    </b-navbar-toggle>
  <b-navbar-brand href="#/">Home</b-navbar-brand>
  <b-collapse is-nav id="nav_collapse">
    <b-navbar-nav class="ml-auto">
      <b-nav-item @click="showLogin" v-show= "signIn">Sign In</b-nav-item>
      <b-nav-item @click="showSignUp" v-show= "signUp">Sign Up</b-nav-item>
       <b-nav-item @click="signOutFunction" v-show= "signOut">Sign Out</b-nav-item>
    </b-navbar-nav>
  </b-collapse>
    </b-navbar>

<!-- // Modal  -->
    <modal name="login">
    <h1>Login</h1>

    <b-form-input v-model="userName" type="text" placeholder="Username"></b-form-input>
    <b-form-input v-model="password" type="password" placeholder="Password"></b-form-input>
    <b-button @click="hideLogin">
      Close
    </b-button>
    <b-button @click="login">
      Login
    </b-button>
    <b-link @click="showforgetPwd">Forgot Password?</b-link>

    <span v-if ="error">Please check your username or password</span>
    </modal>

    <modal name="signup">
    <h1>Sign Up</h1>
    <b-form-input v-model="userName" type="text" placeholder="Username"></b-form-input>
    <b-form-input v-model="password" type="password" placeholder="Password"></b-form-input>
    <b-button @click="hideSignUp">
      Close
    </b-button>
    </modal>

<!-- // Reset Password -->
    <modal name="forgetPwd">
    <h1>Reset Password</h1>

    <!-- <b-form-input v-model="userName" type="text" placeholder="Username"></b-form-input> -->
    <b-form-input v-model="emailForReset" type="email" placeholder="email"></b-form-input>
    <b-button @click="hideLogin">
      Close
    </b-button>
    <b-button @click="resetPwd">
      Reset
    </b-button>
    <!-- <b-link>Forgot Password?</b-link> -->

    <span v-if ="error">Please check your username or password</span>
    </modal>
  </div>
</template>

<script>
import axios from 'axios';
import Modules from './CreateCourse.vue'
export default {
  name: 'na',
  components: {
    Modules,
  },
  mounted(){
    if(localStorage.SignedIn == "true"){
      this.signIn = false ;
      this.signUp = false ;
      this. signOut = true ;
    }
  },
  data () {
    return {
      users:[],
      userName :'',
      password : '',
      signedinUserId: 0,
      error : false,
      badgeNo : 0,
      signIn : true ,
      signUp : true ,
      signOut: false,
      emailForReset: ''
      
    }
  },
  methods: {
  showLogin () {
    this.$modal.show('login');
  },
  hideLogin () {
    this.$modal.hide('login');
  },
  showSignUp () {
    this.$modal.show('signup');
  },
  hideSignUp () {
    this.$modal.hide('signup');
  },
  login: function () {
    axios.get('http://myvmlab.senecacollege.ca:6255/api/users/', {
      auth: {
        username: 'Group-01',
        password: 'gkHQ4574'
      }
      }).then(response => {
         this.users = response.data;
           for(var i=0; i < this.users.length; i++){
             if(this.userName.toLowerCase() == this.users[i].Username.toLowerCase() && this.password == this.users[i].Password){
               this.signedinUserId = this.users[i].User_Id;
                this.$emit('userInfo',{'id': this.signedinUserId,'badge_id':this.users[i].Badge_Id});
                this.hideLogin();
                localStorage.setItem("SignedIn", true);
                localStorage.setItem("SignedInUser", JSON.stringify(this.users[i]));
                this.signIn = false ;
                this.signUp = false ;
                this. signOut = true ;
              }
             else {
                this.error = true;
             }
            }

          });
   },
   signOutFunction: function(){
    this.signIn = true ;
    this.signUp = true ;
    this.signOut = false ; 
    this.$emit('logout', this.signOut);
    this.reset();
    localStorage.clear();
    this.$router.push({name: "Home"});
   },
   reset: function(){
    this.userName ='';
    this.password = '';
    this.signedinUserId= 0;
    this.error = false;
   },
   showforgetPwd: function(){
     this.hideLogin();
     this.$modal.show('forgetPwd');
   },
   resetPwd: function(){
     alert("Email will be sent to " + this.emailForReset+ " with reset instructions");
   }
  }
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
</style>
