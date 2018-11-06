<template>
    <main>
        <h1>Text Module Creation</h1>
        <form id="textStuff" @submit.prevent= "addText">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl"  v-model= "moduleTitle" />
            <br/>
            <br/>
            <br/>
            <label for="editor1"><strong>Enter free form text to fill the module:</strong></label>
            <br/>
            <br/>
            <input id="editor1" type="hidden" name="content" >
            <VueTrix inputId="editor1" v-model= "editorContent"/>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>
        <TextModal ref="modal" v-on:hidden= "clear" v-bind:moduleTitle= "moduleTitle" v-bind:editorContent= "editorContent" v-bind:courseID= "courseID" v-bind:moduleID= "moduleID" v-bind:contentType= "contentType" ></TextModal>
    </main>
</template>

<script>
    import TextModal from './TextModal.vue';
    import axios from 'axios';
    export default {
        components: {
            TextModal
        },
        data() {
            return {
                moduleTitle: '',
                courseID: 0,
                moduleID: 0,
                contentType: '',
                editorContent: null,
                submitted: false,
                info: ''
            }
        },
        methods: {

            addText: function(){
                this.courseID = 5;
                this.moduleID = 9;
                this.contentType = 'text';
                this.submitted = true;
                this.sendToMiddleMan();
                this.$refs.modal.show()
            },

            showDemo: function(){
                this.submitted = true;
                this.$refs.modal.show()
            },

            clear: function(){
                this.submitted = false;
                this.$refs.modal.hide()
            },
            sendToMiddleMan: function(){
                axios.post('https://myvmlab.senecacollege.ca:6255/home/student/website/api/create/module', {
                    Module_Id: this.moduleID,
                    Module_Title: this.moduleTitle,
                    Course_Id: this.courseID,
                    Content_Type: this.contentType,
                    Content: this.editorContent,
                    Quiz: false
                }).then(response => {
                    (this.info = response.data)
                })
            },
        },
        mounted: function () {
            this.$nextTick(function () {
                this.$modal.show('textM');
            })
        }
    }
</script>
