<template>
<div>
<h1>My Courses</h1>
<div>
    <b-card-group class="mb-4" deck v-for="item in courseInfo">
        <b-card title="Description"
                header-tag="header"
                footer-tag="footer">
            <h6 slot="header"
                class="mb-0">{{ item.Course_Title }}</h6>
            <em slot="footer">{{ item.Date_Created }}</em>
            <p class="card-text">{{ item.Course_Description }}</p>
            <b-button @click="comingSoon"
                      class="mr-2"
                      variant="success">Present Course</b-button>
            <b-button @click="comingSoon"
                      class="mr-2"
                      variant="info">Edit Course</b-button>
            <b-button @click="comingSoon"
                      class="mr-2"
                      variant="danger">Delete Course</b-button>
        </b-card>
    </b-card-group>
</div>

</div>
</template>

<script>
import axios from 'axios';

export default {
  components: {

  },
  data() {
    return {
      courseInfo: null,
      user_Id: 0
    }
  },
  methods: {
    comingSoon () {
      alert("coming soon!");
    },
    getFromMiddleMan: function() {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/users/' + this.user_Id + '/courses', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.courseInfo = response.data)
        })
      }
  },
  mounted() {
    this.user_Id = this.$route.query.userId;
    this.getFromMiddleMan();
  }
}
</script>

<style scoped>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

h1 {
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: center;
}

</style>
