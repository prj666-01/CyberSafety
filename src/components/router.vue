<!-- Router.vue -->
<template>
  <component :is="routedComponent"></component>
</template>


<script>
import homePage from "./home.vue";
import adminPage from "./admin.vue";
import CreateCourse from "./CreateCourse.vue";
import TextModule from "./TextModule.vue";
import MyCourses from "./MyCourses.vue";
// import viewPage from "./view.vue";
// import createPage from "./create.vue";




const routes = {
  "/": homePage,
  "/admin": adminPage,
  "/CreateCourse": CreateCourse,
  "/TextModule": TextModule,
  "/MyCourses": MyCourses

  // <router-link to="/MyCourses">My Courses</router-link>
//       <router-link to="/CreateCourse">Create Course</router-link>
//       <router-link to="/ModifyCourse">Modify Course</router-link>
//       <router-link to="/DeactivateCourse">Deactivate Course</router-link>
//       <router-link to="/CloneCourse">Clone Course</router-link>
//       <router-link to="/CourseStatus">Course Status</router-link>
};


export default {
  data() {
    return { current: window.location.pathname };
  },
  computed: {
    routedComponent() {
      return routes[this.current];
    }
  }
};
</script>
