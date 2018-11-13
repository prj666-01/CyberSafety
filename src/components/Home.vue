<template>
  <div id="home">
    <Navbar @userInfo="savUser" @logout="signOut"></Navbar>
      <section id="banner">
				<div class="inner">
					<header style="color:#42b983; margin-bottom:50px; padding-top:10px;">
						<h2>Welcome to Cyberseafty Education Platform</h2>
            <h2> The Virtual Learning Portal </h2>
            <h2> Taking the "e" out of eLearning</h2>
					</header>

					<div class="flex" >

						<div v-show="oneBadge">
						<!-- <span class="icon fa-car" ></span> -->
            <img src="../../assets/images/icon1.png" alt="icon 01" />
            <a class="button icon-link" style="display:block;margin-top:20px; color:white;"  @click= "sendId()">Course Builder</a>
						</div>

						<div v-show="noBadge">
							<!-- <span class="icon fa-camera"></span> -->
              <img src="../../assets/images/icon2.png" alt="Pic 02" />
              <a href="#" class="button icon-link"  style="display:block;margin-top:20px; color:white;">View Available Courses</a>
              <!-- <a href="#" class="button">View Available Courses</a> -->
						</div>

						<div v-show="oneBadge">
							<!-- <span class="icon fa-bug"></span> -->
              <img src="../../assets/images/icon3.png" alt="Pic 03" />
							<a href="#" class="button icon-link"  style="display:block;margin-top:20px; color:white;">Present A Course</a>
						</div>

					</div>

				</div>
			</section>
  <!-- <b-button variant="info"   v-show= "oneBadge" @click= "sendId">
    Create a new course
  </b-button>
  <b-button  block variant="info" v-show= "noBadge">
    View available courses
  </b-button>
  <b-button  block variant="info" v-show= "oneBadge">
    Present a course
  </b-button> -->
  <!-- </div> -->
  </div>
</template>
<script>
import Navbar from "./Navbar.vue";
export default {
  name: "home",
  components: {
    Navbar
  },
  data () {
    return {
      oneBadge: false,
      noBadge : false,
       signedinUserId : '',
       badgeId : ''
    }
  },
  props: {
    userID: Number
  },
  mounted(){
    if(localStorage.SignedIn == "true"){
      if(parseInt(JSON.parse(localStorage.SignedInUser).Badge_Id) == 0 ){
          this.oneBadge =  false;
         this.noBadge  = true;
      } else {
        this.oneBadge =  true,
        this.noBadge  = true
      }
    }
  },
  methods: {
    sendId: function() {
      // console.log("Made it to send id");
      this.$router.push({
        name: "CreateCourse",
        query: { userId: parseInt(JSON.parse(localStorage.SignedInUser).User_Id) }

      });
    },
    sendIdMyCourses: function() {
      // console.log("Made it to send id");
      this.$router.push({
        name: "MyCourses",
        query: { userId: parseInt(JSON.parse(localStorage.SignedInUser).User_Id) }

      });
    },
    savUser: function (event) {
      this.signedinUserId =event.id;
      this.badgeId = event.badge_id;
      if (this.badgeId == 0){
         this.oneBadge =  false,
         this.noBadge  = true
      }
      else {
        this.oneBadge =  true,
        this.noBadge  = true
      }
    },
    signOut : function(){
      this.oneBadge =  false,
      this.noBadge  = false
    }
  }
};
</script>
<style>
/* #head {
   margin-top:120px;
} */

	#banner {
		padding: 8em 0 9em 0;
		background-image: url(../../assets/images/banner.jpg);
		background-size: cover;
		background-position: bottom;
		background-attachment: fixed;
		background-repeat: no-repeat;
		text-align: center;
		position: relative;
	}

		#banner:before {
			content: '';
			background: rgba(75, 75, 93, 0.85);
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
		}

		#banner .inner {
			border-top: 2px solid rgba(255, 255, 255, 0.2);
			position: relative;
			z-index: 10005;
			padding-top: 8em;
		}

		#banner h1 {
			font-size: 3.5em;
			font-weight: 400;
			color: #fff;
			line-height: 1em;
			margin: 0 0 1em 0;
			padding: 0;
		}

		#banner h3 {
			font-weight: 400;
			color: #fff;
			margin: 0;
			font-size: 1.5em;
		}

		#banner .icon {
			color: #6cc091;
			font-size: 2em;
		}

		#banner p {
			font-size: 1em;
			color: rgba(255, 255, 255, 0.55);
			margin-bottom: 1.75em;
		}

		#banner .flex {
			-ms-flex-pack: center;
			-moz-justify-content: center;
			-webkit-justify-content: center;
			-ms-justify-content: center;
			justify-content: center;
			text-align: center;
			margin: 0 auto 4em auto;
		}

			#banner .flex div {
				border-right: 2px solid rgba(255, 255, 255, 0.2);
				padding: 0 8em;
			}

				#banner .flex div:last-child {
					border: none;
					padding-right: 0;
				}

				#banner .flex div:first-child {
					padding-left: 0;
				}

				#banner .flex div p {
					margin: 0;
				}

		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) {

			#banner {
				background-attachment: scroll;
			}

		}

		@media screen and (max-width: 1680px) {

			#banner .flex div {
				padding: 0 6em;
			}

		}

		@media screen and (max-width: 1280px) {

			#banner {
				padding: 7em 0 6em 0;
			}

				#banner .inner {
					padding-top: 6em;
				}

				#banner h1 {
					font-size: 3em;
				}

				#banner h3 {
					font-size: 1.25em;
				}

				#banner .flex div {
					padding: 0 3em;
				}

		}

		@media screen and (max-width: 980px) {

			#banner {
				background-attachment: scroll;
				padding: 5em 0 4em 0;
			}

				#banner .inner {
					padding-top: 4em;
				}

				#banner h1 {
					font-size: 2.5em;
				}

				#banner h3 {
					font-size: 1.25em;
				}

				#banner .flex div {
					font-size: .85em;
					padding: 0 1.5em;
				}

		}

		@media screen and (max-width: 736px) {

			#banner {
				padding: 4em 0 3em 0;
			}

				#banner .inner {
					padding-top: 3em;
				}

				#banner h1 {
					font-size: 2em;
				}

				#banner h3 {
					font-size: 1.25em;
				}

				#banner .flex {
					-moz-flex-direction: column;
					-webkit-flex-direction: column;
					-ms-flex-direction: column;
					flex-direction: column;
					margin: 0 auto 2em auto;
				}

					#banner .flex div {
						font-size: .85em;
						padding: 0;
						border: none;
						margin-bottom: 1em;
					}

		}

		@media screen and (max-width: 480px) {

			#banner h1 {
				font-size: 1.5em;
			}

		}
.flex {
		display: -ms-flexbox;
		-ms-flex-wrap: wrap;
		-ms-flex-pack: justify;
		-moz-justify-content: space-between;
		-webkit-justify-content: space-between;
		-ms-justify-content: space-between;
		justify-content: space-between;
		display: -moz-flex;
		display: -webkit-flex;
		display: -ms-flex;
		display: flex;
		-moz-flex-wrap: wrap;
		-webkit-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		width: 100%;
	}
	.icon-link {
		text-decoration: none;
		color: #fff;
		cursor: pointer;
	}
	.icon-link:visited{
		text-decoration: none;
		color: #fff;
		cursor: pointer;
	}
</style>

