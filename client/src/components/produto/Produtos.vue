<template>
  <main class="container">

    <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">
    </div>

    <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">

      <div class="d-flex justify-content-between">
        <h3 class="border-bottom pb-2 mb-0">Todos os Produtos</h3>

        <div class="d-flex justify-content-between">
          <router-link class="btn btn-success" to="/cadastroProduto">
            Cadastrar Produto
          </router-link>
        </div>

      </div>

      <div v-if="produtos.length == 0">
        <strong class="d-block mt-2"> Sem Produtos </strong>
      </div>

      <div v-if="mensagemDeleteSucesso" class="alert alert-success" role="alert">
        {{ mensagemDeleteSucesso }}
      </div>

      <!-- start loop  -->
      <div class="d-flex text-body-secondary pt-3" v-for="produto in produtos" :key="produto.id">

        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">

          <div class="d-flex justify-content-between align-items-center">
            <strong class="text-gray-dark"><b>Descrição: </b>{{ produto.descricao }}</strong>

            <div>
              <button type="button" class="btn btn-primary me-2">Editar</button>
              <button type="button" @click="deleteProduto(produto.id)" class="btn btn-danger">Excluir</button>
            </div>

          </div>

          <div class="d-flex justify-content-start">

            <div class="d-block">
              <b>Preço (R$): </b> {{ produto.preco }}
            </div>

            <div class="d-block  ms-3">
              <b>Tipo: </b> {{ produto.tipo }}
            </div>

            <div class="d-block ms-3">
              <b>Imposto (%): </b> {{ produto.percentual }}
            </div>

          </div>
        </div>
      </div>
      <!-- end loop -->

    </div>
  </main>

</template>

<script>
export default {

  data() {
    return {
      produtos: [],
      mensagemDeleteSucesso: ''
    };
  },

  mounted() {

    fetch(this.$apiRoute.produtos.listar, {
      method: 'GET'
    })
      .then(response => response.json())
      .then(data => {
        this.produtos = data.dados;
       
        console.log('Dados dos produtos:', data);
      })
      .catch(error => {
        console.error('Erro ao buscar os produtos:', error);
      });
  },
  methods: {

    deleteProduto(id) {

      fetch(`${this.$apiRoute.produtos.deletar}`, { 
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ produto_id: id }),
      })
      .then(data => {
        this.produtos = this.produtos.filter(produto => produto.id !== id);
        console.log('sucesso frontend:', data.success);
        this.mensagemDeleteSucesso = data.success;
        
        setTimeout(() => {
          this.mensagemDeleteSucesso = '';
        }, 2000);

      })
      .catch(error => {
        console.error('Erro ao excluir o produto:', error);
      });


    }

  }
};
</script>
