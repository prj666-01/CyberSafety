<template>
  <div>
    <Navbar></Navbar>
    <br><p>
    Authored By:
    {{userData.First_Name}}
    {{userData.Last_Name}}
    </p>
    <div v-show="hideSubmitInfo">
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
      <h1>Submit Information</h1>
      <div class="mt-2 text-center">
      <b-button @click="addCourse" class="mr-2" type="submit" variant="success">Submit</b-button>
      <b-button type="reset" variant="danger">Clear</b-button>
      </div>
    </b-form>
    </div>

    <div v-show="!hideModuleAdd">
    <h1>Add modules to course {{ this.courseTitle }}</h1>
    <b-container>
      <b-row>
          <b-col class="mb-2">
            <b-button @click="addTextModule" variant="primary">
            Text
            </b-button>
            <b-dropdown variant="primary" class="m-2">
            <b-dropdown-item>Empty</b-dropdown-item>
            <b-dropdown-item v-for="item in moduleData">
                {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
        </b-row>
       <b-row>
          <b-col class="mb-2">
            <b-button disabled  variant="primary">
              Video
            </b-button>
            <b-dropdown variant="primary" class="m-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
              </b-dropdown>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="mb-2">
            <b-button disabled variant="primary">
              Quiz
            </b-button>
            <b-dropdown variant="primary" class="m-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="mb-2">
            <b-button disabled variant="primary">
              Audio
            </b-button>
            <b-dropdown variant="primary" class="m-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
        </b-row>
        <b-row>
          <b-col class="mb-2">
            <b-button disabled variant="primary">
              Presentation
            </b-button>
            <b-dropdown variant="primary" class="m-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
      </b-row>
      <b-row>
          <b-col>
            <b-button size="lg btn-block" class="mt-4" variant="danger" @click="saveAndExit">
              Save and Exit
            </b-button>
          </b-col>
          <b-col>
            <b-button size="lg btn-block" class="mt-4" variant="info" @click="preview">
              Preview
            </b-button>
          </b-col>
          <b-col>
            <b-button size="lg btn-block" class="mt-4" variant="success" @click="submitModules">
              Submit
            </b-button>
          </b-col>
      </b-row>
    </b-container>

    <b-button @click="show">Click</b-button>
    </div>
    <br><br>
    <modal name="example"
           :width="600"
           :height="600">
      <TextModule></TextModule>
    </modal>
     </div>
</template>

<script>
import axios from 'axios';
import Navbar from "./Navbar.vue";
import TextModule from './TextModule'
import { VueEditor } from 'vue2-editor';

export default {
  components: {
    VueEditor,
    TextModule,
    Navbar
  },
  data () {
    return {
      content: '<h1>Some initial content</h1>',
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
      hideModuleAdd: true,
      hideSubmitInfo: true,
      courseID: 0,
      moduleData: null,
      userData: null,
      //for module test
      time: 0,
      duration: 5000
    }
  },
  mounted() {
    this.getModules();
    this.getUserName();
  },
  methods: {
    //for module test
    show () {
      this.$modal.show('example')
    },
    addTextModule: function () {
      this.$router.push({name: "TextModule", query:{courseID: this.courseID}});
	  console.log(courseID);
    },
    saveAndExit () {
      this.$router.push({name: "MyCourses"});
    },
    preview () {
      alert("Coming soon!");
    },
    onSubmit (evt) {
      evt.preventDefault();
      axios.post('http://myvmlab.senecacollege.ca:6255/api/courses',
                JSON.stringify(this.form)).then(response => {(alert(response.data))
           });
      this.hideModuleAdd = false;
      this.hideSubmitInfo = false;
      this.courseTitle = this.form.courseTitle;
      this.courseAuthor = this.form.courseAuthor;
      this.courseDescription = this.form.courseDescription;
	    this.courseID = this.$route.query.CourseId;
    },
    submitModules: function(){
      this.$router.push({name: "MyCourses"});
    },
    getModules: function () {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/courses/' + this.courseID + '/modules', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.moduleData = response.data)
        })
    },
    getUserName: function () {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/users/1', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.userData = response.data)
        })
    },
    addCourse: function () {
     this.sendToMiddleMan;
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