<template>

  <div id="app">
    <b-navbar toggleable="md" type="dark" variant="primary">
      <b-navbar-toggle target="nav_collapse">
    </b-navbar-toggle>

  <b-navbar-brand href="#/MyCourses">Home</b-navbar-brand>

  <b-collapse is-nav id="nav_collapse">
    <b-navbar-nav class="ml-auto">
      <b-nav-item-dropdown text="Options" right>
        <b-dropdown-item href="#/MyCourses">My Courses</b-dropdown-item>
        <b-dropdown-item href="#/CreateCourse">Create Course</b-dropdown-item>
        <b-dropdown-item href="#">Modify Course</b-dropdown-item>
        <b-dropdown-item href="#">Deactivate Course</b-dropdown-item>
        <b-dropdown-item href="#">Clone Course</b-dropdown-item>
        <b-dropdown-item href="#">Course Status</b-dropdown-item>
        <b-dropdown-item href="#">Merge Course</b-dropdown-item>
        <b-dropdown-item href="#">Present Course</b-dropdown-item>
        <b-dropdown-item href="#">View Course</b-dropdown-item>
      </b-nav-item-dropdown>

      <b-nav-item-dropdown right>
        <template slot="button-content">
          <em>User</em>
        </template>
        <b-dropdown-item href="#">Profile</b-dropdown-item>
        <b-dropdown-item href="#">Signout</b-dropdown-item>
      </b-nav-item-dropdown>
    </b-navbar-nav>
  </b-collapse>

    </b-navbar>
    <router-view />
  </div>

</template>

<script>
import Modules from './components/CreateCourse.vue'
export default {
  name: 'app',
  components: {
    Modules
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
body {
  background-color: #EEEEEE;
  font-family: 'Montserrat', sans-serif;
  display: grid;
  grid-template-rows: auto;
  justify-items: center;
  padding-top: 50px;
}
body, html {
  margin: 0;
  height: 100%;
}
#app {
    width: 70%;
}
h1 {
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: center;
}
nav {
}
nav a {
}
</style>