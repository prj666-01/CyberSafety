<template>
  <div id="try">
    <modal v-show="signupModal">
      <div  slot="header" class="imgcontainer">
        <span class="close" title="Close Modal" @click="closeModal" style=" color: whitesmoke;">&times;</span>
        <div><h2 style="display: inline; text-align:center">Sign Up</h2></div>
         </div >
			<div slot="body">
            <div class="modal-dialog">
              <div class="loginmodal-container">
                 <input type="text" name="user"  v-model="signupObject.username" placeholder="Username" autofocus required="required">
                 <input type="text" name="email"  v-model="signupObject.email" placeholder="Email" required="required">
                <input type="password" name="pass" v-model="signupObject.password" placeholder="Password" required="required">
                <input type="button" name="login" @click="signup" id = "buttonBtn" class="login loginmodal-button" value="SignUp"> 
                <!-- <div class="login-help">
                  <a href="#">Register</a> - <a href="#">Forgot Password</a>
                </div> -->
              </div>
            </div>
			</div>
      <div slot="footer">
        <div class="loginmodal-container" style="color: red;">
           Enter a valid input
        </div>
      </div>
		</modal>
    <modal v-show="signinModal">
       <div  slot="header" class="imgcontainer">
        <span class="close" title="Close Modal" @click="closeModal" style=" color: whitesmoke;">&times;</span>
        <div><h2 style="display: inline; text-align:center">Sign In</h2></div>
         </div >
      <!-- <div style="display: inline; float:right; font-size: 20px; cursor:pointer;" @click="closeModal"><span aria-hidden="true">&times;</span></div></h2> -->
			<div slot="body">
        <div class="modal-dialog">
				  <div class="loginmodal-container">
            <input type="text" name="user"  v-model="username" placeholder="Username" autofocus required="required">
            <input type="password" name="pass" v-model="password" placeholder="Password" required="required">
            <input type="button" name="login" @click="signin" id = "buttonBtn" class="login loginmodal-button" value="SignIn" style=" pointer-events: auto;" >
				    <div class="login-help">
					     <a   style="display: block; pointer-events: auto;" >Forgot Password</a>
				    </div>
				  </div>
			  </div>
			</div>
      <div slot="footer">
        <div class="loginmodal-container" style="color: red;">
          Username/Password Invalid
        </div>
      </div>
		</modal>
    <!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo" style="font-size:2em">Knowledgeflow</a>
					<nav id="nav">
						<a @click="showModal('signup')" v-show="showSignupButton" style = "cursor:pointer">Sign Up</a>
            <a @click="showModal('signin')" v-show="showSigninButton" style = "cursor:pointer">Sign in</a>
            <a  v-show="showSignoutButton" @click="showNav()" style = "cursor:pointer">Sign Out</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
      
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header style="color:#42b983; margin-bottom:40px;">
						<h2>Welcome to Cyberseafty Education Platform</h2>
            <h2> The Virtual Learning Portal </h2>
            <h2> Taking the "e" out of eLearning</h2>
					</header>

					<div class="flex">

						<div v-show="createCourse">
						<!-- <span class="icon fa-car" ></span> -->
            <img src="/dist/images/icon1.png" alt="icon 01" />
            <a href="#" class="button" style="display:block;margin-top:20px;">Course Builder</a>
						</div>

						<div v-show="viewCourse">
							<!-- <span class="icon fa-camera"></span> -->
              <img src="/dist/images/icon2.png" alt="Pic 02" />
              <a href="#" class="button"  style="display:block;margin-top:20px" @click="gotoViewCourse()">View Available Courses</a>
              <!-- <a href="#" class="button">View Available Courses</a> -->
						</div>

						<div v-show="presentCourse">
							<!-- <span class="icon fa-bug"></span> -->
              <img src="/dist/images/icon3.png" alt="Pic 03" />
							<a href="#" class="button"  style="display:block;margin-top:20px">Present A Course</a>
						</div>

					</div>

				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div >
								<img src="/dist/images/pic01.png" alt="Pic 01" style="width:150px;height:150px;"/>
							</div>
							<header>
								<h3>About Knowledge FLow</h3>
							</header>
							<p>Virtual Learning Portal <br />Taking the "e" out of eLearning</p>
							<footer>
								<a href="#" class="button">Learn More</a>
							</footer>
						</article>
						<article>
							<div>
								<img src="/dist/images/pic02.png" alt="Pic 02" style="width:150px;height:150px;" />
							</div>
							<header>
								<h3>Our Goal</h3>
							</header>
							<p>we are going to eliminate cyberbullying, privacy abuses, trolling <br>
              and cyberharassment in schools and in the workplace.</p>
							<footer>
								<a href="#" class="button">Learn More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h3>Get in touch</h3>

					<form action="#" method="post">

						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Message" class="button alt" type="button"></li>
						</ul>
					</form>
				</div>
			</footer>
  </div>
</template>
<script>
import modal from './Modal.vue';
import { EventBus } from '../scripts/event.js';
import axios from 'axios';
//import func from './vue-temp/vue-editor-bridge';  

export default {
  name: 'try',
  components: {
      modal
  },
  data () {
    return {
      signinModal: false,
      signupModal: false,
      firstTimeModal: false,
      signupObject:{},
      users:[],
      showOneButton: false,
      showThreeButtons: true,
			username: '',
      password:'',
      viewCourse: false,
      createCourse: false,
      presentCourse: false,
      showSigninButton: true,
      showSignupButton: true,
      showSignoutButton: false,
      signedinUserId: 0
    }
  },
  methods:{
    showNav : function(event) {
      // alert("sining out")
      this.showSigninButton=true;
      this.showSignupButton = true;
      this.showSignoutButton = false;
      this.viewCourse = false;
      this.createCourse =false;
      this.presentCourse = false;
    },
    showModal: function(modalName) {
      if(modalName == 'signin'){
        this.signinModal = true;
      } else if(modalName == 'signup'){
        this.signupModal = true;
      }
     
    },
    closeModal: function() {
      this.signinModal = false;
      this.signupModal = false;
      this.firstTimeModal = false;
    },
    gotoViewCourse: function(){
      var path = "view/"+this.signedinUserId;
      console.log(path);
      this.goTo(path);
    },
    signin: function (event) {
       if (this.username == undefined || this.password  == undefined ){
          EventBus.$emit('error', 'test');
        }
        else{
          alert("signin");
          axios.get('http://myvmlab.senecacollege.ca:6255/api/users/', {
            
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
          this.users = response.data;
           console.log(this.users)
             
            for(var i=0; i < this.users.length; i++){
              if(this.username.toLowerCase() == this.users[i].Username.toLowerCase() && this.password == this.users[i].Password){
                this.signedinUserId = this.users[i].id;
                if(this.username.toLowerCase() == "colin"){
                  this.goTo("/admin");
                } else {
                  //  console.log(this.users[i])
                    this.closeModal();
                    this.viewCourse = true;  
                    this.showSigninButton= false;
                    this.showSignupButton = false;
                    this.showSignoutButton = true; 
                  if(this.users[i].Badge_Id == "0"){
                     alert("not completed required courses");
                  } else {
                    this.closeModal();
                    this.viewCourse = true;
                    this.createCourse = true;
                    this.presentCourse = true;
                    this.showSigninButton= false;
                    this.showSignupButton = false;
                    this.showSignoutButton = true; 
                  }
                } 
              }else {
                  EventBus.$emit('error', 'test');
              }
             }
         
           });
       }
    },
    signup: function () {
        if (this.signupObject.username == undefined || this.signupObject.email == undefined || this.signupObject.password  == undefined ){
          EventBus.$emit('error', 'test');
        }
        else{
            axios.post('http://myvmlab.senecacollege.ca:6255/api/users/', {
            auth: {
              username: 'Group-01',
              password: 'gkHQ4574'
              },
     
            username: this.signupObject.Username,
            email: this.signupObject.Email,
            password: this.signupObject.Password,
            }).then(response => {
                this.info = response.data;
                console.log(this.info);
                // this.closeModal();
                // this.viewCourse = true;  
                // this.showSigninButton= false;
                // this.showSignupButton = false;
                // this.showSignoutButton = true;  
            })
       
        }
      
    },
   
  
    goTo(route) {
      window.location = route;
    }
  }
}
</script>

<style scoped lang="scss">
.imgcontainer {
    background:  #42b983;
    text-align: center;
    margin-top: 30px;
    padding: 20px;
    color: whitesmoke;
    position: relative;
    
}
.close {
 
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

/****** LOGIN MODAL ******/
.loginmodal-container {
  margin-top: 20px;
  margin-bottom: 40px;
  padding:33px;
  max-width:450px;
  width: 100% !important;
  height: 100%;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
  color:#2c3e50;
 pointer-events: auto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1em;
  font-family: roboto;
}

.loginmodal-container input[type=button] {
  width: 100%;
  margin-top: 20px;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  color: #2c3e50;
}

.loginmodal-container input[type=text]:focus, input[type=password]:focus {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  color: #2c3e50;
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
 border-radius: 3px; 
 -webkit-user-select: none;
  user-select: none; 
}

.loginmodal-button {
  cursor: pointer;
}


.login-help{
  font-size: 12px;
  cursor: pointer;
  text-align: center;
}


</style>
