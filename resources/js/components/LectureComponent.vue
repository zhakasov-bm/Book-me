<template>
  <div>
    <h1>Lecture #</h1>
  </div>
  <div>
    <h1>{{ lecture.name }}</h1>
    <h3>{{ lecture.description }}</h3>
    <div>
      {{ lecture.text }}
    </div>
  </div>
  <button v-on:click="nextLecture()">Next Lecture</button>
</template>

<script>

export default {
  data() {
    return {
      message: 'Hello from vue.js',
      lecture_index: 1,
      lecture: {
        name: '',
        description: '',
        text: ''
      }
    }
  },
  mounted() {
      this.fetchLecture(this.lecture_index);
    },
    methods: {
      fetchLecture() {
        fetch('http://localhost:8000/api/lectures/' + this.lecture_index)
          .then(response => response.json())
          .then(data => this.lecture = data)
          .catch(error => console.error(error));
      },

      nextLecture() {
        this.lecture_index++;
        return this.fetchLecture(this.lecture_index);
      }
    }
}
</script>


