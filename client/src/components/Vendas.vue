<template>
    <div>
      <h2>Lista de Vendas</h2>
      <ul>
        <li v-for="(venda, index) in vendas" :key="index">
          <p>ID: {{ venda.id }}</p>
          <p>Produto: {{ venda.produto }}</p>
          <p>Quantidade: {{ venda.quantidade }}</p>
          <p>Preço Unitário: {{ venda.preco_unitario }}</p>
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
          this.vendas = data.data; 
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  };
  </script>
  