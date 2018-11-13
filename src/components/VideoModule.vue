<template>
    <main>
        <h1>Video Module Creation</h1>
        <form id="audioStuff" @submit.prevent= "addAudio">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl" :maxlength= "maxTitle" required v-model= "module.Module_Title" />
            <br/>
            <br/>
            <br/>
            <label for="vid"><strong>Enter an embed link for your video:</strong></label>
            <br/>
            <br/>
            <input type="text" id="vid" ref="vid" v-model= "module.Content"/>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>
        <modal v-show="submitted" name= "vidM" height="auto" :click-to-close="false" :scrollable="true" :adaptive="true">
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
      this.module.Content_Type = "video";
      this.submitted = true;
      this.sendToMiddleMan();
      this.$modal.show("vidM");
    },

    showDemo: function() {
      this.submitted = true;
      this.$modal.show("vidM");
    },

    clear: function() {
      this.submitted = false;
      this.$modal.hide("vidM");
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
      this.$modal.show("vidM");
    },
    add() {
      this.saveModules();
      this.$emit("closeModal", { close: true });
      this.$modal.hide("vidM");
    },
    saveModules() {
      const parsed = JSON.stringify(this.modules);
    },
    hide() {
      this.$modal.hide("vidM");
      this.submitted = false;
    }
  }
};
</script>