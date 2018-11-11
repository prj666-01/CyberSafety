<template>
  <div id="home">
    <Navbar @userInfo="savUser" @logout="signOut"></Navbar>
      <b-container class=" text-center" id="head">
        <h2>Welcome to Cyberseafty Education Platform</h2>
        <h2> The Virtual Learning Portal </h2>
        <h2> Taking the "e" out of eLearning</h2>
      </b-container>
  <b-button variant="info"   v-show= "oneBadge" @click= "sendId">
    Create a new course
  </b-button>
  <b-button  block variant="info" v-show= "noBadge">
    View available courses
  </b-button>
  <b-button  block variant="info" v-show= "oneBadge">
    Present a course
  </b-button>
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
        query: { userId:  this.signedinUserId}
       
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
#head {
   margin-top:120px;
}

</style>

