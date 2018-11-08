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
      <div v-show="hideSubmitInfo">
      <h1>Submit Information</h1>
      <div class="mt-2 text-center">
      <b-button @click="addCourse" class="mr-2" type="submit" variant="success">Submit</b-button>
      <b-button type="reset" variant="danger">Clear</b-button>
      </div>
      </div>
    </b-form>

    <div v-show="!hideModuleAdd">
    <h1>Add modules to course {{ this.courseTitle }}</h1>
    <b-container>
      <b-row>
          <b-col>
            <b-button @click="addTextModule" variant="primary">
            Text
            </b-button>
          </b-col>
          <b-col>
            <b-button disabled  variant="primary">
              Video
            </b-button>
          </b-col>
          <b-col>
            <b-button disabled variant="primary">
              Quiz
            </b-button>
          </b-col>
          <b-col>
            <b-button disabled variant="primary">
              Audio
            </b-button>
          </b-col>
          <b-col>
            <b-button disabled variant="primary">
              Presentation
            </b-button>
          </b-col>
      </b-row>
      <b-row>
          <b-col>
            <b-button class="mt-4 btn-block" variant="success" @click="submitModules">
              Submit
            </b-button>
          </b-col>
      </b-row>
    </b-container>

    <h1>Current Modules</h1>

    <b-button class="ml-2 mt-2" variant="info" v-for="item in moduleData">
        {{ item.Module_Title }}
    </b-button>
    </div>
    <br><br>
    <p v-for="item in userData">Authored by:
      {{ item.First_Name + ' ' + item.Last_Name }}
    </p>
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
        courseTeachingLevel: null,
      },
      teachingLevel: [
        { text: 'Select One', value: null },
        'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'
      ],
      show: true,
      hideModuleAdd: true,
      courseID: 0,
      hideSubmitInfo: true,
      moduleData: null,
      userData: null
    }
  },
  mounted() {
    this.getModules();
    this.getUserName();
    if(this.$route.query.courseID){
      this.hideModuleAdd = false;
      this.hideSubmitInfo = false;
    }
  },
  methods: {
    addTextModule: function () {
      this.$router.push({name: "TextModule", query:{courseID: this.courseID}});
    },
    onSubmit (evt) {
      evt.preventDefault();
     // axios.post('http://myvmlab.senecacollege.ca:6255/api/courses',
      //          JSON.stringify(this.form)).then(response => {(alert(response.data))
       //     });
      this.hideModuleAdd = false;
      this.hideSubmitInfo = false;
      this.courseTitle = this.form.courseTitle;
    },
    submitModules: function(){
      this.$router.push({name: "MyCourses"});
    },
    getModules: function () {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/modules/', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.moduleData = response.data)
        })
    },
    getUserName: function () {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/users/', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.userData = response.data)
        })
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
        axios.post('http://myvmlab.senecacollege.ca:6255/api/courses', {
            Course_Title: this.courseTitle,
            Course_Author: this.courseAuthor,
            Course_Description: this.courseDescription,
            Teaching_Level: this.courseTeachingLevel,
            Course_Modules: this.courseModules
        }).then(response => {
            (this.info = response.data)
        })
    },
 }
}
</script>