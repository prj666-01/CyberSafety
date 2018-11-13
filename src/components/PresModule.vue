<template>
    <main>
        <h1>Presentation Module Creation</h1>
        <form id="presentationStuff" @submit.prevent= "addPres">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl" :maxlength= "maxTitle" required v-model= "module.Module_Title" />
            <br/>
            <br/>
            <br/>
            <label for="pres"><strong>Provide an embed link to your presentation:</strong></label>
            <br/>
            <br/>
            <input type="text" id="pres" ref="pres" v-model= "module.Content"/>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>
        <modal v-show="submitted" name= "presM" height="auto" :click-to-close="false" :scrollable="true" :adaptive="true">
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
    </main>
</template>

<script>
import axios from "axios";
export default {
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
      this.module.Content_Type = "presentation";
      this.submitted = true;
      this.sendToMiddleMan();
      this.$modal.show("presM");
    },

    showDemo: function() {
      this.submitted = true;
      this.$modal.show("presM");
    },

    clear: function() {
      this.submitted = false;
      this.$modal.hide("presM");
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
      this.$modal.show("presM");
    },
    add() {
      this.saveModules();
      this.$emit('closeModal',{'close': true});
      this.$modal.hide("presM");
    },
    saveModules() {
      const parsed = JSON.stringify(this.modules);
    },
    hide() {
      this.$modal.hide("presM");
      this.submitted = false;
    }
  }
};
</script>