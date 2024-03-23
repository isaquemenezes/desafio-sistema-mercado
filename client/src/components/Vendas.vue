<template>
    <div>
      <h2>Lista de Vendas</h2>
      <ul>
        <li v-for="(venda, index) in vendas" :key="index">
          <p>ID: {{ venda.id }}</p>
          <p>Nome: {{ venda.produto }}</p>
          <!-- <p>Quantidade: {{ venda.quantidade }}</p>
          <p>Preço Unitário: {{ venda.preco_unitario }}</p> -->
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        vendas: [] 
      };
    },
    mounted() {
      fetch('http://localhost:8000/vendas/index.php')
        .then(response => response.json())
        .then(data => {
          this.vendas = data.dados; 

          console.log('dados', data);
        })
        .catch(error => {
          console.error('Error :', error);
        });
    }
  };
  </script>
  