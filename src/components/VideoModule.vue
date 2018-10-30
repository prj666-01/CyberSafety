
<template>
  <main>
    <h1>Video Module Creation</h1>
    <p>You can add a title and the url for your video</p>
    <form id="videoStuff" @submit.prevent= "addVideo">
        <label for="title">Enter a title for your module: </label>
        <input type="text" id= "title"  v-model="title" placeholder="Title"/><br>
        <label for="title">Enter URL for your video: </label>
        <input type="text" id="url" v-model="url" placeholder="url" /><br>
        <span>Example: https://staging.coverr.co/s3/mp4/Snow-motion.mp4</span>
        <br>
        
        <br>
        <input type="submit" value= "Submit">
    </form>
    <!--
    <ul>
        <li v-for="video in info" :key="video.id" >
            <h3>{{ video.title + " (" + video.id + ")"}}</h3>
             <p>{{ video.content }}</p>
             <button v-on:click="show(video.content)">View</button>
        </li>
    </ul>
    -->
    <modal name="test" :width="640" :height="360">
    <!--
      <video id="my-player" class="video-js" controls preload="auto" poster="//vjs.zencdn.net/v/oceans.png" data-setup='{}' v-bind:src=name ></video>
    -->
    <video controls v-bind:src=name width="640"></video>
  </modal>
  </main>
</template>
<script>
//window.videojs = require('video.js');
//import videojs from 'video.js'
import axios from 'axios';
export default {
    name: 'VideoModule',
    mounted() {
        this.getFromMiddleMan();
    },
    prop: {
    },
    data() {
        return {
            name: '',
            info: '',
            title: "",
            url: "",
            modules: [],
            contentType: 'video',
            content: "",
            showModal: true,
            videos: '',
            newVideoTitle: '',
            newVideoUrl: '',
            deleted: false
        }
    },
  
    methods: {
        addVideo() {
            this.modules.push(this.title);
            this.saveModules();
            this.$router.push({name: "CreateCourse"});
            //this.sendToMiddleMan();
            //this.getFromMiddleMan();
        },
        saveModules() {
            const parsed = JSON.stringify(this.modules);
            localStorage.setItem('modules', parsed);
        },
        showVideo: function(url) {
            alert(url);
        },
        show(url) {
            this.$modal.show('test');
            this.name = url;
        },
        hide () {
            this.$modal.hide('test');
        },
        sendToMiddleMan: function(){
            axios.post('http://ruihui.me/create-course/middle-man.php', {
                title: this.newVideoTitle,
                contentType: this.contentType,
                content: this.newVideoUrl
            }).then(response => {
                (this.info = response.data)
            })
        },
        getFromMiddleMan: function() {
            axios.post('http://ruihui.me/create-course/middle-man.php', {
            }).then(response => {
                (this.info = response.data)
            })
        }
    }
}
</script>

<style scoped>
.hello {
    background: #fff;
    margin: 10px;
    padding: 10px;
    padding-top: 0px;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: block;
  background: #818CC0;
  padding: 10px;
  margin-bottom: 10px;
  box-shadow: 1px 1px 3px #46484A;
  border-radius: 2px; 
  border-left: 5px solid #5F678D;
}
li h3 {
    margin: 0;
    padding: 0;
    color: #DEE4E8;

}
li p {
    margin: 0;
    padding: 0;
    color: #F1F8FD;
    font-size: 12px;

}
button {
    float: right;
    border: 2px solid #A0AFEF;
    border-radius: 2px; 
    margin: -32px 0px;
    background: #5F678D;
    color: #d8d8d8;
    text-transform: uppercase;
    font-weight: bold;
    padding: 6px 12px;
}
button#addVideo {
    float: none;
    margin: 10px 0;
}
li button:hover {
    background: #6A75A0;
    cursor: pointer;
}
li::after {
    clear: both;
}
a {
  color: #42b983;
}
input {
  border-radius: 8px 8px;
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 10px;
  width: 200px; 
}
span {
    font-size: 12px;
}
input:focus{
  outline: none;
}
</style>
