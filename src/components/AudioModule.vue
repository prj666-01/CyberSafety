<template>
    <main>
        <h1>Audio Module Creation</h1>
        <form id="audioStuff" @submit.prevent= "addAudio">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl"  v-model= "moduleTitle" />
            <br/>
            <br/>
            <br/>
            <label for="f"><strong>Upload an audio file:</strong></label>
            <br/>
            <br/>
            <input type="file" id="f" ref="file" v-on:change="handleFileUpload()"/>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>
        <AudioModal ref="modal" v-on:hidden= "clear" v-bind:moduleTitle= "moduleTitle" v-bind:audioFile= "audioFile" v-bind:courseID= "courseID" v-bind:moduleID= "moduleID" v-bind:contentType= "contentType" ></AudioModal>
    </main>
</template>

<script>
    import axios from 'axios';
    import AudioModal from './AudioModal.vue';
    export default {
        components: {
            AudioModal
        },
        data() {
            return {
                moduleTitle: '',
                courseID: 0,
                moduleID: 0,
                contentType: '',
                audioFile: null,
                submitted: false
            }
        },
        methods: {
           
            addAudio: function(){
                this.courseID = 5;
                this.moduleID = 9;
                this.contentType = 'audio';
                this.submitted = true;
                this.$refs.modal.show()
            },

            handleFileUpload(){
                this.audioFile = this.$refs.file.files[0];
            },

            addVideo: function() {
            this.sendToMiddleMan();
            this.getFromMiddleMan();
            },

            sendToMiddleMan: function(){
                axios.post('http://ruihui.me/create-course/middle-man.php', {
                    title: this.moduleTitle,
                    contentType: this.contentType,
                    content: this.audioFile
                }).then(response => {
                    (this.info = response.data)
                })
            },

            getFromMiddleMan: function() {
                axios.post('http://ruihui.me/create-course/middle-man.php', {
                }).then(response => {
                    (this.info = response.data)
                })
            },

            showDemo: function(){
                this.moduleTitle = this.$route.query.moduleTitle;
                this.moduleID = this.$route.query.moduleID;
                this.courseID = this.$route.query.courseID;
                this.contentType = this.$route.query.contentType;
                this.module.editorContent = this.$route.query.editorContent;
                this.submitted = true;
                this.$refs.modal.show()
            },

            clear: function(){
                this.submitted = false;
                this.$refs.modal.hide()
            }
        },
        mounted: function () {
            if(this.$route.query.moduleTitle && this.$route.query.moduleID && this.$route.query.moduleTitle 
                 && this.$route.query.moduleTitle && this.$route.query.moduleTitle){
                     this.showDemo();
            }
        }
    }   
</script>