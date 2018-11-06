<template>
<div>
<h1>Course Info</h1>
{{corinfo}}
<h1>Module Info</h1>
{{modinfo}}
<h1>User Info</h1>
</div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      usrinfo: [],
      corinfo: [],
      modinfo: [],
    }
  },
  methods: {
    getFromMiddleMan: function() {
      axios.post('http://myvmlab.senecacollege.ca:6255/api/get/users', {
        }).then(response => {
          (this.usrinfo = response.data)
        })
        axios.post('http://myvmlab.senecacollege.ca:6255/api/get/courses', {
        }).then(response => {
          (this.corinfo = response.data)
        })
        axios.post('http://myvmlab.senecacollege.ca:6255/api/get/modules', {
        }).then(response => {
          (this.modinfo = response.data)
        })
      }
  },
  mounted() {
    this.getFromMiddleMan();
  }
}
</script>
