<template>
<div>
<h1>Course Info</h1>
{{corinfo}}
<h1>Module Info</h1>
{{modinfo}}
<h1>User Info</h1>
{{userinfo}}
</div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      userinfo: null,
      corinfo: null,
      modinfo: null,
    }
  },
  methods: {
    getFromMiddleMan: function() {
      axios.get('http://myvmlab.senecacollege.ca:6255/api/users/', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
        }).then(response => {
            (this.userinfo = response.data)
        })
        axios.get('http://myvmlab.senecacollege.ca:6255/api/courses/', {
            auth: {
            username: 'Group-01',
            password: 'gkHQ4574'
            }
          }).then(response => {
              (this.corinfo = response.data)
          })
          axios.get('http://myvmlab.senecacollege.ca:6255/api/modules/', {
          auth: {
          username: 'Group-01',
          password: 'gkHQ4574'
          }
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