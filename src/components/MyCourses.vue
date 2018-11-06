<template>
  <v-layout column>
    <div v-for="course in corinfo">
      <v-layout row>
        <v-flex xs12 sm6 offset-sm3>
          <v-card class="mt-2">
            <v-card-title primary-title>
              <div>
                <h1>{{course.Course_Title}}</h1>
                <div class="headline">{{ usrinfo.First_Name }} {{ usrinfo.Last_Name }} {{ usrinfo.Teaching_Level }}</div>               
                <span class="grey--text">{{ course.Course_Description }}</span>
              </div>
            </v-card-title>

            <v-card-actions>
              <v-btn flat color="red">Share</v-btn>
              <v-spacer></v-spacer>
              <v-btn flat color="green" @click="show = !show">Modules
              </v-btn>
            </v-card-actions>
            <v-slide-y-transition>
              <v-card-text v-show="show">
                <div v-for="module in modinfo">
                <p>
                  <span class="module">{{ module.Module_Title }}</span>
                </p>
                </div>
              </v-card-text>
            </v-slide-y-transition>
          </v-card>
        </v-flex>
      </v-layout>
    </div>
  </v-layout>
  <!-- <div class="MyCourses">
    <h1>My Courses</h1>
    <div class="text-xs-center">
      {{ author }}
      {{ teachingLevel }}
      {{ description }}
    <div>
      <h3>Modules</h3>
      <div v-for="(module, n) in modules">
      <p>
        <span class="module">{{ module }}</span>
      </p>
    </div>
    </div>
  </div>
  </div> -->
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
      axios.get('https://myvmlab.senecacollege.ca:6255/home/student/website/api/get/user', {
      }).then(response => {
        (this.usrinfo = response.data)
      })
      axios.get('https://myvmlab.senecacollege.ca:6255/home/student/website/api/get/course/{:(usrinfo.User_Id)}', {
      }).then(response => {
        (this.corinfo = response.data)
      })
      axios.get('https://myvmlab.senecacollege.ca:6255/home/student/website/api/get/module/{:(corinfo.Course_Id)}', {
      }).then(response => {
        (this.modinfo = response.data)
      })
    }
  },
  mounted() {
    console.log(this.test);
    this.getFromMiddleMan();  
  }
}
</script>
