<template>
    <div>
      <h1>{{ message }}</h1>
    </div>
    <lecture-component></lecture-component>
  </template>
  
  <script>
  
  import LectureComponent from './LectureComponent.vue';

  
  export default {
    components: {LectureComponent},
    data() {
      return {
        message: 'Hello from Vue.js!',
      }
    }
  }
  </script>
  
<style scoped>
h1 {
  color: blue;
}
</style>
  