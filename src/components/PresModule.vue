<template>
    <main>
        <h1>Presentation Module Creation</h1>
        <form id="presentationStuff" @submit.prevent= "addPres">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl"  v-model= "moduleTitle" />
            <br/>
            <br/>
            <br/>
            <label for="pres"><strong>Provide an embed link to your presentation:</strong></label>
            <br/>
            <br/>
            <input type="text" id="pres" ref="pres" v-model= "embedLink"/>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>
        <PresModal ref="modal" v-on:hidden= "clear" v-bind:moduleTitle= "moduleTitle" v-bind:embedLink= "embedLink" v-bind:courseID= "courseID" v-bind:moduleID= "moduleID" v-bind:contentType= "contentType" ></PresModal>
    </main>
</template>

<script>
    import axios from 'axios';
    import PresModal from './PresModal.vue';
    export default {
        components: {
            PresModal
        },
        data() {
            return {
                moduleTitle: '',
                courseID: 0,
                moduleID: 0,
                contentType: '',
                embedLink: '',
                submitted: false
            }
        },
        methods: {
           
            addPres: function(){
                this.courseID = 5;
                this.moduleID = 9;
                this.contentType = 'presentation';
                this.submitted = true;
                this.$refs.modal.show()
            },

            addVideo: function() {
            this.sendToMiddleMan();
            this.getFromMiddleMan();
            },

            sendToMiddleMan: function(){
                axios.post('http://ruihui.me/create-course/middle-man.php', {
                    title: this.moduleTitle,
                    contentType: this.contentType,
                    content: this.embedLink
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