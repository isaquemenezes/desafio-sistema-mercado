<template>
    <div>
      <p>{{ message }}</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        message: ''
      };
    },
    mounted() {
      fetch('http://localhost:8000/index.php')
        .then(response => response.json())
        .then(data => {
          this.message = data.message;
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  };
  </script>
  