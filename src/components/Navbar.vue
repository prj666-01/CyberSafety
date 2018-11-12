<template>
  <div id="na">
    <header id="header">
				<div class="inner">
				
						<b-navbar toggleable="md">
              <b-navbar-toggle target="nav_collapse">
              </b-navbar-toggle>
              <b-collapse is-nav id="nav_collapse" >
                <b-navbar-nav class="ml-auto">
                  	<a href="#" class="logo" style="font-size:2em; margin-left:40px;">Knowledgeflow</a>
                  <b-nav-item @click="showLogin" v-show= "signIn" class="nav-links"><a style="color:white;">Sign In</a></b-nav-item>
                  <b-nav-item @click="showSignUp" v-show= "signUp" class="nav-links"><a style="color:white;">Sign Up</a></b-nav-item>
                  <b-nav-item @click="signOutFunction" v-show= "signOut" class="nav-links"><a style="color:white;">Sign Out</a></b-nav-item>
                </b-navbar-nav>
              </b-collapse>
            </b-navbar>
          <!-- </nav> -->
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

<!-- // Modal  -->
    <modal name="login" style="z-index:10050;  overflow-y: auto;">
      <div class="imgcontainer">
        <div><h2 style="display: inline; text-align:center">Sign In</h2></div>
      </div>
      <div  class="container">
				<div class="loginmodal-container">
          <b-form-group>
            <b-form-input v-model="userName" type="text" placeholder="Enter Username" style="cursor:pointer;"  required></b-form-input>
          </b-form-group>
          <b-form-group>
            <b-form-input v-model="password" type="password" placeholder="Enter Password" style="cursor:pointer;"  required></b-form-input>
          </b-form-group>
          <div class="btn-toolbar">
            <b-button variant="primary" @click="login">Sign In</b-button>
            <b-button @click="hideLogin" variant="primary" style="margin-left:20px;">Close</b-button>
          </div>
        </div>
        <b-link @click="showforgetPwd">Forgot Password?</b-link>
        <span v-if ="error" style="text-color:red;">Incorrect Username/Password</span>
      </div>
    </modal>
<!--  // Sing up Modal -->
     <modal name="signup" style="z-index:10050;  overflow-y: auto;">
      <div class="imgcontainer">
        <div><h2 style="display: inline; text-align:center">Sign Up</h2></div>
      </div>
      <div  class="container">
				<div class="loginmodal-container">
          <b-form-group>
          <b-form-input v-model="firstName" type="text" placeholder="Enter First Name" style="cursor:pointer;" required></b-form-input>
          </b-form-group>
          <b-form-group>
          <b-form-input v-model="lastName" type="text" placeholder="Enter Last Name" style="cursor:pointer;" required></b-form-input>
          </b-form-group>
          <b-form-group>
            <b-form-input v-model="userName" type="text" placeholder="Enter Username" style="cursor:pointer;" required></b-form-input>
          </b-form-group>
           <b-form-group>
            <b-form-input v-model="email" type="email" placeholder="Enter Email" style="cursor:pointer;" required></b-form-input>
          </b-form-group>
          <b-form-group>
            <b-form-input v-model="password" type="password" placeholder="Enter Password" style="cursor:pointer;" required></b-form-input>
          </b-form-group>
          <div class="btn-toolbar">
            <b-button variant="primary" @click="signup" >Sign Up</b-button>
            <b-button @click="hideSignUp" variant="primary" style="margin-left:20px;">Close</b-button>
          </div>
        </div><br/>
      </div>
    </modal>

     <modal name="forgetPwd" style="z-index:10050;">
      <div class="imgcontainer">
        <div><h2 style="display: inline; text-align:center">Forgot Password</h2></div>
      </div>
      <div  class="container">
				<div class="loginmodal-container">
          <b-form-group>
            <b-form-input v-model="password" type="email" placeholder="Enter Password" style="cursor:pointer;"></b-form-input>
          </b-form-group>
          <div class="btn-toolbar">
            <b-button variant="primary" @click="resetPwd">Reset Password</b-button>
            <b-button @click="hideLogin" variant="primary" style="margin-left:20px;">Close</b-button>
          </div>
        </div>
      </div>
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
    this.reset();
    this.$modal.show('login');
  },
  hideLogin () {
    this.$modal.hide('login');
  },
  showSignUp () {
    this.reset();
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

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
body {
  background-color: #EEEEEE;
  font-family: 'Montserrat', sans-serif;
  display: grid;
  grid-template-rows: auto;
  justify-items: center;
  padding-bottom: 100px;
}
body, html {
  margin: 0;
  height: 100%;
}
#app {
    width: 100%;
}
h1 {
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: center;
}

.imgcontainer {
    background:  #42b983;
    /* background: #007bff; */
    text-align: center;
    margin-bottom: 20px;
    padding: 20px;
    color: whitesmoke;
    position: relative;
    
}
#header {
		color: #fff;
		cursor: default;
		height: 3.25em;
		left: 0;
		line-height: 3.25em;
		position: absolute;
		text-align: right;
		top: 2em;
		width: 100%;
		z-index: 10001;
    /* background: #42b983 */
	}

		#header .inner {
			margin: 0 auto;
			position: relative;
		}

		#header .logo {
			color: #ffffff;
			display: inline-block;
			font-weight: 400;
			height: inherit;
			left: 0;
			line-height: inherit;
			position: absolute;
			top: 0;
			font-size: 1em;
		}

			#header .logo strong {
				color: #ffffff;
				font-weight: 600;
			}

      #navPanel {
		-moz-transform: translatex(20em);
		-webkit-transform: translatex(20em);
		-ms-transform: translatex(20em);
		transform: translatex(20em);
		-moz-transition: -moz-transform 0.2s ease-in-out, visibility 0.2s ease-in-out;
		-webkit-transition: -webkit-transform 0.2s ease-in-out, visibility 0.2s ease-in-out;
		-ms-transition: -ms-transform 0.2s ease-in-out, visibility 0.2s ease-in-out;
		transition: transform 0.2s ease-in-out, visibility 0.2s ease-in-out;
		-webkit-overflow-scrolling: touch;
		visibility: hidden;
		overflow-y: auto;
		position: fixed;
		right: 0;
		top: 0;
		background: #6cc091;
		color: #daefe3;
		height: 100%;
		max-width: 80%;
		width: 20em;
		padding: 0.5em 1.25em;
		z-index: 10010;
	}
.nav-links  a , .nav-links a :visited {
  color: whitesmoke;
}
</style>
