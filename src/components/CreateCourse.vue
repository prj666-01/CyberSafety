<template>
  <div>
    <h1>Create Course</h1>
      <v-text-field label="Author" v-model="author"></v-text-field>
      <v-text-field label="Teaching Level" v-model="teachingLevel"></v-text-field>
      <v-text-field label="Description" v-model="description"></v-text-field>

      <h1>Add Modules</h1>
      <div class="text-xs-center">
      <v-btn @click="addText">Text</v-btn>
      <v-btn @click="addVideo">Video</v-btn>
      <v-btn @click="addAudio">Audio</v-btn>
      <v-btn @click="addPresentation">Presentation</v-btn>
      <v-btn @click="addQuiz">Quiz</v-btn>
      <div v-for="(module, n) in modules">
        <span class="module">{{ module }}</span>
        <v-btn @click= "removeModule(n)"> Remove</v-btn>
      </div>
      <p>
      <v-btn :to="{name: 'MyCourses'}" @click="submit">Submit</v-btn>
      <v-btn @click="clearStorage">Clear all</v-btn>
      </p>
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      modules: [],
      author: '',
      teachingLevel: '',
      description: '',
      text: 'TEXT',
      video: 'VIDEO',
      audio: 'AUDIO',
      presetation: 'PRESENTATION',
      quiz: 'QUIZ',
      newModule: null
    }
  },
  methods: {
    addText() {
      if(this.modules.length >= 5){
        alert('Max 5 modules allowed!')
      } else {
        this.$router.push({name: "TextModule"});
      }
    },
    addVideo() {
      if(this.modules.length >= 5){
        alert('Max 5 modules allowed!')
      } else {
      this.$router.push({name: "VideoModule"});
      //this.newModule = '';
      //this.saveModules();
      }
   },
   addAudio() {
     if(this.modules.length >= 5){
        alert('Max 5 modules allowed!')
     } else {
       this.$router.push({name: "AudioModule"});
    }
   },
   addPresentation() {
     if(this.modules.length >= 5){
        alert('Max 5 modules allowed!')
     } else {
       this.$router.push({name: "PresModule"});
    }
   },
   addQuiz() {
     if(this.modules.length >= 5){
        alert('Max 5 modules allowed!')
     } else {
    this.modules.push(this.quiz);
    this.newModule = '';
    this.saveModules();
    }
   },
   removeModule(x) {
     this.modules.splice(x, 1);
     this.saveModules();
   },
   saveModules() {
     const parsed = JSON.stringify(this.modules);
     localStorage.setItem('modules', parsed);
   },
   submit() {
     localStorage.author = this.author;
     localStorage.description = this.description;
     localStorage.teachingLevel = this.teachingLevel;
   },
   clearStorage() {
     localStorage.modules = [];
     localStorage.author = '';
     localStorage.description = '';
     localStorage.teachingLevel = '';
   }
  },
  mounted: function () {
    this.$nextTick(function () {
      if (localStorage.getItem('modules')) {
        try {
          this.modules = JSON.parse(localStorage.getItem('modules'));
        } catch(e) {
          localStorage.removeItem('modules');
        }
      }
    })
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
