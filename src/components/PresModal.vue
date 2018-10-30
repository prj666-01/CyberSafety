<template>
     <modal v-show="submitted" name= "presM" height="auto" :scrollable="true" :adaptive="true">
        <header>
            <h2>{{moduleTitle}}</h2>
        </header>
        <body>  
            <iframe width="550" height="400" :src= "embedLink" webkitallowfullscreen="1" mozallowfullscreen="1" allowfullscreen="1"></iframe>
        </body>
        <footer>
            <v-btn @click= "add">Finished</v-btn>
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
            embedLink: String
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
                this.$router.push({name: "CreateCourse"});
            },
            saveModules() {
                const parsed = JSON.stringify(this.modules);
                localStorage.setItem('modules', parsed);
            },
            hide () {
                this.$modal.hide('presM');
                this.submitted = false;
                this.$emit("hidden")
            }
        },
        mounted: function () {
            this.$nextTick(function () {
                this.$modal.show('presM');
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
