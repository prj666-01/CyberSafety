<template>
  <v-layout row>
    <v-flex xs12 sm6 offset-sm3>
      <v-card class="mt-2">
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          height="200px"
        >
        </v-img>
        <v-card-title primary-title>
          <div>
            <div class="headline">{{ author }} {{ teachingLevel }}</div>
            <span class="grey--text">{{ description }}</span>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-btn flat color="red">Share</v-btn>
          <v-btn flat color="blue">Explore</v-btn>
          <v-spacer></v-spacer>
          <v-btn flat color="green" @click="show = !show">Modules
          </v-btn>
        </v-card-actions>
        <v-slide-y-transition>
          <v-card-text v-show="show">
            <div v-for="(module) in modules">
            <p>
              <span class="module">{{ module }}</span>
            </p>
          </div>
          </v-card-text>
        </v-slide-y-transition>
      </v-card>
    </v-flex>
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
export default {
  data() {
    return {
      modules: [],
      user: [],
      author: '',
      teachingLevel: '',
      description: '',
      text: 'TEXT',
      video: 'VIDEO',
      audio: 'AUDIO',
      presetation: 'PRESENTATION',
      quiz: 'QUIZ',
      newModule: null,
      show: false
    }
  },
  mounted() {
     if (localStorage.author) {
       this.author = localStorage.author;
     }
     if (localStorage.teachingLevel) {
       this.teachingLevel = localStorage.teachingLevel;
     }
     if (localStorage.description) {
       this.description = localStorage.description;
     }
     if (localStorage.getItem('modules')) {
       try {
         this.modules = JSON.parse(localStorage.getItem('modules'));
       } catch(e) {
         localStorage.removeItem('modules');
       }
     }
   }
}
</script>
