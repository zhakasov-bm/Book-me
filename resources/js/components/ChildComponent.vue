<template>
    <div>
      <h1><strong>{{ message }}</strong></h1>
    </div>
    <div id="app">
      <p v-if="seen">Теперь ты видишь меня</p>
      <button v-on:click="seen = !seen">Переключить видимость</button>
    </div>

  </template>
  
  <script>
  
  export default {
    data() {
      return {
        message: 'Hello from Child',
        seen: true
      }
    }
  }
  </script>
  
  <style scoped>
  h1 {
    color: red;
  }
  </style>
  