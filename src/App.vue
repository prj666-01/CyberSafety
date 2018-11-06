<template>
  <div>
    <app-router></app-router>
  </div>
</template>

<script>
import AppRouter from "./components/router.vue";

export default {
  components: {
    AppRouter
  }
};
</script>
<style lang="scss">
  @import '../dist/assets/css/main.css';
</style>