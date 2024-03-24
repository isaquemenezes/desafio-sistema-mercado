<template>
    <div>
      
     
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        message: '',
        pedidos: [], 
      };
    },
    mounted() {
      fetch(this.$apiRoute.pedidos.listar)
        .then(response => response.json())
        .then(data => {
          this.message = data.message;

          console.log('data',data);
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  };
  </script>
  