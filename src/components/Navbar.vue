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
    <modal name="login" style="z-index:10050;  overflow-y: auto; height:430px;">
      <div class="imgcontainer">
        <span class="close" title="Close Modal" @click="hideLogin" style=" color: whitesmoke;">&times;</span>
        <div><h2 style="display: inline; text-align:center">Sign In</h2></div>
      
      </div>
      <div  class="container">
				<div class="loginmodal-container">
          <b-form-group>
            <b-form-input v-model="userName" type="text" placeholder="Enter Username" style="cursor:pointer;" :maxlength="30"></b-form-input>
          </b-form-group>
          <b-form-group>
            <b-form-input v-model="password" type="password" placeholder="Enter Password" style="cursor:pointer;" :maxlength="30"></b-form-input>
          </b-form-group>
         <div><span v-if ="error" style="color:red;clear: right;">Incorrect Username/Password</span></div>
          <div><span v-if ="error1" style="color:red;clear: right;">Please enter Username/Password</span></div>
          <div class="btn-toolbar">
            <b-button variant="primary" @click="login" style="margin:10px auto;" >Sign In</b-button>
            <!-- <b-button @click="hideLogin" variant="primary" style="margin-left:20px;">Close</b-button> -->
          </div>
        </div>
        
        <b-link @click="showforgetPwd" style="float:right;">Forgot Password?</b-link>
      </div>
    </modal>
<!--  // Sing up Modal -->
     <modal name="signup" style="z-index:10050; ">
      <div class="imgcontainer">
         <span class="close" title="Close Modal" @click="hideSignUp" style=" color: whitesmoke;">&times;</span>
         <div><h2 style="display: inline; text-align:center">Sign Up</h2></div>
 </div>
      <div  class="container"  >
				<div class="loginmodal-container">
        <b-row>
          <b-col sm="6">
              <b-form-input v-model="signupObject.First_Name" type="text" placeholder="Enter First Name" style="cursor:pointer;" required :maxlength="30"></b-form-input>
          </b-col>
          <b-col sm="6">
              <b-form-input v-model="signupObject.Last_Name" type="text" placeholder="Enter Last Name" style="cursor:pointer;" required :maxlength="30"></b-form-input>
          </b-col>
        </b-row>
          <b-form-group style="margin-top:20px;" >
            <b-form-input v-model="signupObject.Username" type="text" placeholder="Enter Username" style="cursor:pointer;" required :maxlength="30"></b-form-input>
          </b-form-group>
           <b-form-group>
            <b-form-input v-model="signupObject.Email"  type="email" name="email" placeholder="Enter Email Address" style="cursor:pointer;" required :maxlength="30"></b-form-input>
          </b-form-group>
          <b-form-group>
            <b-form-input v-model="signupObject.Password" type="password" placeholder="Enter Password" style="cursor:pointer;" required :maxlength="30"></b-form-input>
          </b-form-group>
          <b-form-checkbox id="checkbox1"
                     v-model="status"
                     value="accepted"
                     unchecked-value="not_accepted">
                    I accept and agree to the Terms of Service
          </b-form-checkbox>
          <div><span v-if ="error" style="color:red;">Please enter a valid user information</span></div>
          <div><span v-if ="error1" style="color:red;">Please enter a valid email address</span></div>
          <div class="btn-toolbar" style="margin:20px auto;">
             <!-- <b-button-group style="margin:10px auto;"> -->
            <b-button  size="lg" variant="primary" @click="signup" style="margin:10px auto;">Sign Up</b-button>
             <!-- </b-button-group> -->
             </div>
            
            <!-- <b-button @click="hideSignUp" variant="primary" style="margin:10px auto;">Close</b-button> -->
          
        </div><br/>
      </div>
    </modal>

     <modal name="forgetPwd" style="z-index:10050;  overflow-y: auto; height:330px;">
      <div class="imgcontainer">
        <span class="close" title="Close Modal" @click="hideLogin" style=" color: whitesmoke;">&times;</span>
        <div><h2 style="display: inline; text-align:center">Forgot Password</h2></div>
      </div>
      <div  class="container">
				<div class="loginmodal-container">
          <b-form-group>
            <b-form-input v-model="password" type="email" placeholder="Enter Email Address" style="cursor:pointer;"></b-form-input>
          </b-form-group>
          <div class="btn-toolbar">
            <b-button variant="primary" @click="resetPwd"  style="margin:10px auto;">Reset Password</b-button>
            <!-- <b-button @click="hideLogin" variant="primary" style="margin-left:20px;">Close</b-button> -->
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
      error1 : false,
      badgeNo : 0,
      signIn : true ,
      signUp : true ,
      signOut: false,
      emailForReset: '',
      signupObject:{}
      
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
    if (this.userName == undefined ||  this.password == undefined){
           this.error1 = true;
           this.error = false;
    }else{
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
                  this.error1=false;
                }
              }

            });
         }
   },
   signup : function(){
    //  alert(this.signupObject.Email)
    if (this.signupObject.Username == undefined || this.signupObject.Email == "" || this.signupObject.Password  == ""  || this.signupObject.Last_Name == undefined|| this.signupObject.First_Name == undefined){
           this.error = true;
        }
        
        else{
            var isValid = this.validEmail(this.signupObject.Email);
        if(isValid){
          this.signupObject.Is_Authenticated = "0";
          this.signupObject.Teaching_Level = "0";
          var myDate = new Date();
          // this.signupObject.Last_Login = myDate.getMonth()+ '-' +myDate.getDate()+ '-' +myDate.getFullYear()+ ' ' + myDate.getHours() + ':'+myDate.getMinutes()+':'+myDate.getSeconds();
          this.signupObject.Last_Login = "2018-11-10 18:22:25";
          this.signupObject.Badge_Id = "0";
          this.signupObject.Is_Administrator = "1";
          // console.log(this.signupObject);

          axios.post('http://myvmlab.senecacollege.ca:6255/api/users/',
              JSON.stringify(this.signupObject))
              .then(response => {
                // console.log(response);
                localStorage.setItem("SignedIn", true);
                localStorage.setItem("SignedInUser", JSON.stringify(response.data));
                this.hideSignUp();
                 this.showLogin ();
           });
          }
          else{
            this.error = false;
            this.error1 = true;
          }
        }
      
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
   },
   validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
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
.v--modal{
 min-height: 450px ;
  top: 85px !important;
}
</style>
