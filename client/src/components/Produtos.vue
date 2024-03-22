<template>
  <div>
    <h1>Cadastro Produtos</h1>

    <!-- Formulário de pedidos -->
    <form @submit.prevent="submitPedido">
      <label for="produto">Produto:</label>
      <input type="text" id="produto" v-model="produto">
      
      <label for="quantidade">Quantidade:</label>
      <input type="number" id="quantidade" v-model.number="quantidade">
      
      <label for="preco">Preço Unitário:</label>
      <input type="number" id="preco" v-model.number="preco">
      
      <button type="submit">Adicionar Pedido</button>
    </form>


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

  