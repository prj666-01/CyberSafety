<template>
  <div>
    <h1>My Courses</h1>
    <p>course info:{{corinfo}}</p>
    <p>user info:{{usrinfo}}</p>
    <p>module info:{{modinfo}}</p>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      courses: ['1','2','3','4','5'],
      modules: ['1','2','3','4','5','6'],
      user: [],
      author: 'Colin McManus',
      usrinfo: '',
      corinfo: '',
      modinfo: '',
      teachingLevel: '12',
      description: 'This is a test module',
      text: 'TEXT',
      video: 'VIDEO',
      audio: 'AUDIO',
      presetation: 'PRESENTATION',
      quiz: 'QUIZ',
      newModule: null,
      show: false
    }
  },
  methods: {
    getFromMiddleMan: function() {
      axios.post('http://myvmlab.senecacollege.ca:6255/api/get/users', {
      }).then(response => {
        (this.usrinfo = response.data)
      })
      axios.post('http://myvmlab.senecacollege.ca:6255/api/get/course/{:(usrinfo.User_Id)}', {
      }).then(response => {
        (this.corinfo = response.data)
      })
      axios.post('http://myvmlab.senecacollege.ca:6255/api/get/modulesByCourse/{:(corinfo.Course_Id)}', {
      }).then(response => {
        (this.modinfo = response.data)
      })
    }
  },
  mounted() {
    this.getFromMiddleMan();  
  }
}
</script>
