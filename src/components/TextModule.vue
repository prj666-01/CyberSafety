<template>
    <main>
        <h1>Text Module Creation</h1>
        <form id="textStuff" @submit.prevent= "addText">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl" :maxlength= "maxTitle" required v-model= "module.Module_Title" />
            <br/>
            <br/>
            <br/>
            <label for="textEditor"><strong>Enter free form text to fill the module:</strong></label>
            <br/>
            <br/>
            <vue-editor id="textEditor" v-model="module.Content"></vue-editor>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>

        <modal v-show="submitted" name= "textM" height="auto" :click-to-close="false" :scrollable="true" :adaptive="true">
            <header>
                <h2>{{module.moduleTitle}}</h2>
            </header>
            <body>
                <div v-html="module.Content"></div>
            </body>
            <footer>
                <button @click= "add">Finished</button>
            </footer>
        </modal>
        <!--<TextModal ref="modal" v-on:hidden= "clear" v-bind:moduleTitle= "module.Module_Title" v-bind:editorContent= "module.Content" v-bind:courseID= "module.Course_Id" v-bind:moduleID= "module.moduleID" v-bind:contentType= "module.Content_Type" ></TextModal>-->
    </main>
</template>

<script>
import axios from "axios";
import { VueEditor } from "vue2-editor";
export default {
  components: {
    VueEditor
  },
  data() {
    return {
      module: {
        Module_Title: "",
        Course_Id: 0,
        Content_Type: "",
        Content: null,
        Quiz: 0
      },
      submitted: false,
      moduleID: 0,
      maxTitle: 50,
      info: ""
    };
  },
  props: {
    Course_Id: String
  },
  methods: {
    addText: function() {
      this.module.Content_Type = "text";
      this.submitted = true;
      this.sendToMiddleMan();
      this.$modal.show("textM");
    },

    showDemo: function() {
      this.submitted = true;
      this.$modal.show("textM");
    },

    clear: function() {
      this.submitted = false;
      this.$modal.hide("textM");
    },

    sendToMiddleMan: function() {
      this.module.Course_Id = parseInt(this.Course_Id, 10);
      alert(JSON.stringify(this.module));
      axios
        .post(
          "http://myvmlab.senecacollege.ca:6255/api/modules",
          JSON.stringify(this.module)
        )
        .then(response => {
          this.info = response.data;
          alert(JSON.stringify(this.info));
        });
    },
    show() {
      this.submitted = true;
      this.$modal.show("textM");
    },
    add() {
      this.saveModules();
      this.$emit('closeModal',{'close': true});
      this.$modal.hide("textM");
    },
    saveModules() {
      const parsed = JSON.stringify(this.modules);
    },
    hide() {
      this.$modal.hide("textM");
      this.submitted = false;
    }
  }
};
</script>

<style>
    .ql-editor, .ql-container, .ql-snow{
        max-height: 300px;
    }
    
    .quillWrapper{
        height: 350px;
    }
</style>
