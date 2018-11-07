<template>
     <modal v-show="submitted" name= "textM" height="auto" :click-to-close="false" :scrollable="true" :adaptive="true">
        <header>
            <h2>{{moduleTitle}}</h2>
        </header>
        <body>
            <div v-html="editorContent"></div>
        </body>
        <footer>
           <button @click= "add">Finished</button>
        </footer>
    </modal>
</template>

<script>
    export default {
        props: {
            courseID: Number,
            moduleID: Number,
            contentType: String,
            moduleTitle: String,
            editorContent: String
        },
        data() {
            return {
                modules: [],
                submitted: false
            }
        },
        methods: {
            show () {
                this.submitted = true;
            },
            add(){
                this.modules.push(this.moduleTitle);
                this.saveModules();
                this.$router.push({name: "CreateCourse", query: {courseID: "courseID"}});
            },
            saveModules() {
                const parsed = JSON.stringify(this.modules);
                localStorage.setItem('modules', parsed);
            },
            hide () {
                this.$modal.hide('textM');
                this.submitted = false;
                this.$emit("hidden")
            }
        },
        mounted: function () {
            this.$nextTick(function () {
                this.$modal.show('textM');
                if (localStorage.getItem('modules')) {
                    try {
                        this.modules = JSON.parse(localStorage.getItem('modules'));
                    } catch(e) {
                        localStorage.removeItem('modules');
                    }
                }
            })
        }
    }
</script>
