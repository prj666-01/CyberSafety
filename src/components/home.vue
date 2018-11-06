<template>
  <div id="try">
    <modal ref:modal2 v-show="modal2">
      <!-- <div v-show="showThreeButtons"> -->
        <h1 slot="header"><div style="display: inline">Please select option</div>
        <div style="display: inline; float:right; font-size: 20px; cursor:pointer;" @click="closeModal"><span aria-hidden="true">&times;</span></div></h1>
        <div slot="body">
          <div class="modal-dialog">
            <div class="loginmodal-container">
              <input type="button" name="login"  id = "buttonBtn" class="login loginmodal-button" value="View Courses">
              <input type="button" name="login" id = "buttonBtn" @click="goTo('/CreateCourse')" class="login loginmodal-button" value="Create Course">
              <input type="button" name="login" id = "present" class="login loginmodal-button" value="Present Course">
            </div>
          </div>
        </div>
  
		</modal>
    <modal ref:modal1 v-show="modal1">
			<h1 slot="header"><div style="display: inline">Sign In to Your Account</div>
      <div style="display: inline; float:right; font-size: 20px; cursor:pointer;" @click="closeModal"><span aria-hidden="true">&times;</span></div></h1>
			<div slot="body">
        <div class="modal-dialog">
				  <div class="loginmodal-container">
            <input type="text" name="user"  v-model="username" placeholder="Username">
            <input type="password" name="pass" v-model="password" placeholder="Password">
            <input type="button" name="login" @click="signin" id = "buttonBtn" class="login loginmodal-button" value="Signin">
				    <div class="login-help">
					    <a href="#">Register</a> - <a href="#">Forgot Password</a>
				    </div>
				  </div>
			  </div>
			</div>
      <div slot="footer">
        <div class="loginmodal-container" style="color: red;">
          Username/Password some message
        </div>
      </div>
		</modal>
    <!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo">Knowledgeflow</a>
					<nav id="nav">
						<a href="index.html">Sign Up</a>
            <a @click="showModal">Sign in</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
      
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Welcome to Knowledgeflow</h1>
					</header>

					<div class="flex ">

						<div>
							<span class="icon fa-car"></span>
							<h3>Create Course</h3>
							<p>Create your own course</p>
						</div>

						<div>
							<span class="icon fa-camera"></span>
							<h3>View Course</h3>
							<p>Take online courses with Knowledgeflow</p>
						</div>

						<div>
							<span class="icon fa-bug"></span>
							<h3>Present Course</h3>
							<p>Present your courses</p>
						</div>

					</div>

					<footer>
						<a href="#" class="button">Get Started</a>
					</footer>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="/dist/images/pic01.jpg" alt="Pic 01" />
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
							<div class="image round">
								<img src="/dist/images/pic02.jpg" alt="Pic 02" />
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
		<link rel="stylesheet" href="../../dist/assets/css/main.css" />
    
  </div>
</template>
<script>
import modal from './modal.vue';
import { EventBus } from '../scripts/event.js';

export default {
  name: 'try',
  components: {
      modal
  },
  data () {
    return {
      modal1:false,
      modal2:false,
      showOneButton: false,
      showThreeButtons: true,
			username: '',
			password:'',
      msg: 'Welcome to Your Vue.js App',
    }
  },
  methods:{
    showModal: function() {
      this.modal2 = false;
      this.modal1 = true;
      EventBus.$emit('showModal', 'test');
    },
    closeModal: function() {
      EventBus.$emit('closeModal', 'test');
    },
    signin: function (event) {
      vm.getAllUsers();
      for(var i=0; i < vm.users.length; i++){
        console.log(vm.users);
        if(this.username.toLowerCase() == vm.users[i].username.toLowerCase() && this.password == vm.users[i].password){
          alert("matched!!");
          if(this.username.toLowerCase() == "colin"){
            this.goTo("/admin");
          } else {
            alert()
            console.log(vm.users[i]);
            if(vm.users[i].badgeid == null){
              this.modal1 = false;
              this.modal2 = true;
            }else{
              this.modal2 = true;
              this.modal1 = false;
            }
          } 
        }else {
            EventBus.$emit('error', 'test');
          }
      }
    },
    goTo(route) {
      window.location = route;
    }
  }
}
</script>

<style scoped lang="scss">
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
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
  color:#2c3e50
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
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

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
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

// .loginmodal-button {
//   border: 1px solid #3079ed; 
//   border: 0px;
//   color:#2c3e50;
//   text-shadow: 0 1px rgba(0,0,0,0.1); 
//   background-color: #4d90fe;
//   padding: 17px 0px;
//   font-family: roboto;
//   font-size: 14px;
//    background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); 
// }

// .loginmodal-button:hover {
//    border: 1px solid #2f5bb7;
//   border: 0px;
//   text-shadow: 0 1px rgba(0,0,0,0.3);
//   background-color: #357ae8;
//    background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); 
// }

.loginmodal-container a {
  text-decoration: none;
  color: rgb(36, 33, 33);
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}

.login-btn {
  text-align:center;
  margin-top: 50px;
}

</style>
