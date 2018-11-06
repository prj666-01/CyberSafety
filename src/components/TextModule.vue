<template>
    <main>
        <h1>Text Module Creation</h1>
        <form id="textStuff" @submit.prevent= "addText">
            <label for="ttl">Enter a title for your module: </label>
            <input type="text" id= "ttl"  v-model= "module.Module_Title" />
            <br/>
            <br/>
            <br/>
            <label for="editor1"><strong>Enter free form text to fill the module:</strong></label>
            <br/>
            <br/>
            <input id="editor1" type="hidden" name="content" >
            <VueTrix inputId="editor1" v-model= "module.Content"/>
            <br/>
            <br/>
            <input type="submit" value= "Submit">
        </form>
        <TextModal ref="modal" v-on:hidden= "clear" v-bind:moduleTitle= "module.Module_Title" v-bind:editorContent= "module.Content" v-bind:courseID= "module.Course_Id" v-bind:moduleID= "module.moduleID" v-bind:contentType= "module.Content_Type" ></TextModal>
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
                module: {
                    Module_Title: '',
                    Course_Id: 0,
                    Content_Type: '',
                    Content: null,
                    Quiz: 0
                },
                submitted: false,
                moduleID: 5,
                info: ''
            }
        },
        methods: {

            addText: function(){
                this.module.Course_Id = 1;
                this.module.Content_Type = 'text';
                this.submitted = true;
                console.log('addText call');
                this.sendToMiddleMan();
                this.$refs.modal.show();
            },

            showDemo: function(){
                this.submitted = true;
                this.$refs.modal.show();
            },

            clear: function(){
                this.submitted = false;
                this.$refs.modal.hide();
            },
            sendToMiddleMan: function(){
                console.log('sendToMiddleMan call');
                alert(JSON.stringify(this.module));
                axios.post('http://myvmlab.senecacollege.ca:6255/api/create/module', 
                JSON.stringify(this.module)).then(response => {
                    (this.info = response.data);
                    console.log(this.info);
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
