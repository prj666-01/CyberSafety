<template>
  <div>
    <br><p>
    Authored By:
    {{userData.First_Name}}
    {{userData.Last_Name}}
    </p>
    <div v-show="hideSubmitInfo">
    <h1>Add course information</h1>
      <div class="container mt-3 mt-sm-5">
        <div class="row justify-content-center">
          <div class="col-md-6">

            <b-form
              id="app"
              @submit="checkForm"
              novalidate="true">

                <label for="courseTitle">Course Title</label>
                <b-form-input
                  id="courseTitle"
                  v-model="form.courseTitle"
                  type="text"
                  name="courseTitle"></b-form-input>


                <label for="courseDescription">Description</label>
                <b-form-input
                  id="courseDescription"
                  v-model="form.courseDescription"
                  type="text"
                  name="courseDescription"></b-form-input>


                <label for="teachingLevel">Teaching Level</label>
                <b-form-select
                  id="teachingLevel"
                  v-model="form.courseTeachingLevel"
                  name="teachingLevel">
                  <option>Grade 1</option>
                  <option>Grade 2</option>
                  <option>Grade 3</option>
                  <option>Grade 4</option>
                  <option>Grade 5</option>
                </b-form-select>


                <input class="mt-2"
                  type="submit"
                  value="Submit">

              <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                  <li v-for="error in errors">{{ error }}</li>
                </ul>
              </p>

            </b-form>

          </div>
        </div>
      </div>
    </div>

    <div v-show="!hideModuleAdd">
    <h1>Add modules to course {{ this.courseTitle }}</h1>
    <b-container>
      <b-row>
          <b-col cols="2" class="mb-2">
            <b-button block @click="show" variant="primary">
            Text
            </b-button>
            <b-dropdown text="Click me" size="md" variant="primary" class="mt-2">
            <b-dropdown-item>Empty</b-dropdown-item>
            <b-dropdown-item v-for="item in moduleData">
                {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
          <b-col cols="2" class="mb-2">
            <b-button block disabled variant="primary">
              Video
            </b-button>
            <b-dropdown disabled text="Click me" size="md" variant="primary" class="mt-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
              </b-dropdown>
          </b-col>
          <b-col cols="2" class="mb-2">
            <b-button block disabled variant="primary">
              Quiz
            </b-button>
            <b-dropdown disabled text="Click me" size="md" variant="primary" class="mt-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
          <b-col cols="2" class="mb-2">
            <b-button block disabled variant="primary">
              Audio
            </b-button>
            <b-dropdown disabled text="Click me" size="md" variant="primary" class="mt-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
          <b-col cols="2" class="mb-2">
            <b-button block disabled variant="primary">
              Presentation
            </b-button>
              <b-dropdown disabled text="Click me" size="md" variant="primary" class="mt-2">
              <b-dropdown-item>Empty</b-dropdown-item>
              <b-dropdown-item v-for="item in moduleData">
                  {{ item.Module_Title }} </b-dropdown-item>
            </b-dropdown>
          </b-col>
        </b-row>
      <b-row>
          <b-col>
            <b-button cols="2" id="buttons" size="lg btn-block" class="mt-4" variant="danger" @click="saveAndExit">
              Save and Exit
            </b-button>
          </b-col>
          <b-col>
            <b-button cols="2" id="buttons" size="lg btn-block" class="mt-4" variant="info" @click="preview">
              Preview Modules
            </b-button>
          </b-col>
          <b-col>
            <b-button cols="2" id="buttons" size="lg btn-block" class="mt-4" variant="success" @click="submitModules">
              Submit
            </b-button>
          </b-col>
      </b-row>
    </b-container>

    </div>
    <br><br>
    <modal name="textModule"
           id="textModule"
           :width="800"
           :height="700">
           <TextModule @closeModal="close" v-bind:Course_Id="courseID"></TextModule>
    </modal>
  </div>
</template>

<script>
import axios from 'axios';
import { VueEditor } from 'vue2-editor';
import TextModule from './TextModule';

export default {
  components: {
    VueEditor,
    TextModule
  },
  data () {
    return {
      errors: [],
      //Form data
      form: {
        courseTitle: '',
        courseAuthor: '',
        courseDescription: '',
        courseModules: [],
        courseTeachingLevel: '',
      },
      //Text module data
      module: {
          Module_Title: '',
          Course_Id: 173,
          Content_Type: '',
          Content: null,
          Quiz: 0
      },
      //Drop down options for teaching level
      teachingLevel: [
        { text: 'Select One', value: null },
        'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4'
      ],
      //Data fields to hide "add course information" and "add modules to course"
      hideModuleAdd: true,
      hideSubmitInfo: true,
      //
      user_Id: 0,
      courseID: 0,
      moduleData: null,
      userData: null,
      attemptSubmit: false,
      lastCourse: null
    }
  },
  mounted() {
    this.getModules();
    this.getUserName();
    this.user_Id = this.$route.query.userId;
  },
  methods: {
    checkForm: function (e) {
      this.errors = [];

      if (!this.form.courseTitle) {
        this.errors.push('Title required.');
      } else if (!this.validTitle(this.form.courseTitle)) {
        this.errors.push('Title can only be characters and 30 or less.');
      }

      if (!this.form.courseDescription) {
        this.errors.push('Description required.');
      } else if (!this.validDescription(this.form.courseDescription)) {
        this.errors.push('Description can only be characters and 30 or less.');
      }

      if (!this.errors.length) {
        axios.post('http://myvmlab.senecacollege.ca:6255/api/courses',
                  JSON.stringify(this.form)).then(response => {(alert(response.data))
             });
        this.hideModuleAdd = false;
        this.hideSubmitInfo = false;
        this.courseTitle = this.form.courseTitle;
        this.courseAuthor = this.form.courseAuthor;
        this.courseDescription = this.form.courseDescription;
        this.teachingLevel = this.form.teachingLevel;
        this.getCourseId();
      }

      e.preventDefault();
    },
    validTitle: function (description) {
      var re = /^[a-zA-Z0-9_ ]{0,30}$/;
      return re.test(description);
    },
    validDescription: function (description) {
      var re = /^[a-zA-Z0-9_ ]{0,300}$/;
      return re.test(description);
    },
    //Shows the text modal
    show () {
      this.$modal.show('textModule')
    },
    close (){
      this.$modal.hide('textModule');
      this.getModules();
    },
    //Hides the text modal
    hide () {
      this.$modal.hide('textModule');
    },
    //Submits data from text modal to database
    addTextModule: function (){
        this.module.Content_Type = 'text';
        axios.post('http://myvmlab.senecacollege.ca:6255/api/modules',
        JSON.stringify(this.module)).then(response => {
            (this.info = response.data);
            alert(JSON.stringify(this.info));
        })
    },
    //Sends the user to the home page when clicked
    saveAndExit () {
      this.$router.push({name: "Home"});
    },
    preview () {
      alert("Please check the dropdown beside text!");
      this.getModules();
    },
    submitModules: function(){
      this.$router.push({ name: "MyCourses", query: { userId: this.user_Id }});
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
    getCourseId: function () {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/courses/last', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.courseID = response.data.Course_Id)
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
            Course_Modules: this.courseModules,
        }).then(response => {
            (this.info = response.data)
        })
    },
 }
}
</script>
<style>
  #textEditor {
    height: 550px;
  }
  #buttons{
    position:absolute;
    bottom:-350px;
  }

  h1 {
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: center;
  }

</style>
