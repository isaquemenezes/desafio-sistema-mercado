<template>
  <div>
    <h1>Cadastro de Produtos</h1>

    <!-- Formulário de cadastro de produtos -->
    <form @submit.prevent="submitProduto">
      <label for="produto">Produto:</label>
      <input type="text" id="produto" v-model="produto">
      
      <label for="quantidade">Quantidade:</label>
      <input type="number" id="quantidade" v-model.number="quantidade">
      
      <label for="preco">Preço Unitário:</label>
      <input type="number" id="preco" v-model.number="preco">
      
      <button type="submit">Adicionar Produto</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      produto: '',
      quantidade: 0,
      preco: 0
    };
  },
  methods: {
    submitProduto() {
     
      const novoProduto = {
        produto: this.produto,
        quantidade: this.quantidade,
        preco_unitario: this.preco
      };

      // Envia os dados para a API 
      fetch('http://localhost:8000/produtos/create.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(novoProduto)
      })
      .then(response => response.json())
      .then(data => {
        this.produto = '';
        this.quantidade = 0;
        this.preco = 0;
        
        console.log('Produto cadastrado com sucesso:', data);
      })
      .catch(error => {
        console.error('Erro ao cadastrar produto:', error);
      });
    }
  }
};
</script>

<style>
/* Estilos específicos do componente aqui */
</style>
