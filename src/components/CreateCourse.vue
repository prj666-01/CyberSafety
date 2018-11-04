<template>
  <div>
    <h1>Add course information</h1>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group id="title"
                    label="Course Title:"
                    label-for="title">
        <b-form-input id="titleId"
                      type="text"
                      v-model="form.courseTitle"
                      required
                      placeholder="Enter Title">
        </b-form-input>
      </b-form-group>
      <b-form-group id="author"
                    label="Author Name:"
                    label-for="author">
        <b-form-input id="authorId"
                      type="text"
                      v-model="form.courseAuthor"
                      required
                      placeholder="Enter name">
        </b-form-input>
      </b-form-group>
      <b-form-group id="description"
                    label="Course Description:"
                    label-for="description">
        <b-form-input id="descriptionId"
                      type="text"
                      v-model="form.courseDescription"
                      required
                      placeholder="Enter name">
        </b-form-input>
      </b-form-group>
      <b-form-group id="teachingingLevel"
                    label="Teaching Level:"
                    label-for="teachingLevel">
        <b-form-select id="teachinLevelId"
                      :options="teachingLevel"
                      required
                      v-model="form.courseTeachingLevel">
        </b-form-select>
      </b-form-group>
      <h1>Add modules</h1>
      <div class="text-center">
      <b-button @click="addTextModule" class="mr-2" variant="primary">Text</b-button>
      <b-button class="mr-2" variant="primary">Video</b-button>
      <b-button class="mr-2" variant="primary">Quiz</b-button>
      <b-button class="mr-2" variant="primary">Audio</b-button>
      <b-button class="mr-2" variant="primary">Presentation</b-button>
    </div><br><br><br>
      <h1>Submit course</h1>
      <div class="mt-2 text-center">
      <b-button class="mr-2" type="submit" variant="success">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
      </div>
    </b-form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data () {
    return {
      form: {
        courseTitle: '',
        courseAuthor: '',
        courseDescription: '',
        courseModules: [],
        courseTeachingLevel: null
      },
      teachingLevel: [
        { text: 'Select One', value: null },
        'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'
      ],
      show: true
    }
  },
  mounted() {
      this.getFromMiddleMan();
  },
  methods: {
    addTextModule: function () {

    },
    onSubmit (evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
      this.$router.push({name: "MyCourses"});
    },
    onReset (evt) {
      evt.preventDefault();
      this.form.courseTitle = '';
      this.form.courseAuthor = '';
      this.form.courseDescription = '';
      this.form.courseTeachingLevel = null;
      /* reset/clear native browser form validation state */
      this.show = false;
      this.$nextTick(() => { this.show = true });
    },
    sendToMiddleMan: function(){
        axios.post('http://ruihui.me/create-course/middle-man.php', {
            Course_Title: this.courseTitle,
            Course_Author: this.courseAuthor,
            Course_Description: this.courseDescription,
            Teaching_Level: this.courseTeachingLevel,
            Course_Modules: this.courseModules
        }).then(response => {
            (this.info = response.data)
        })
    },
    getFromMiddleMan: function() {
        axios.post('http://ruihui.me/create-course/middle-man.php', {
        }).then(response => {
            (this.info = response.data)
        })
    }
  }
}
</script>
