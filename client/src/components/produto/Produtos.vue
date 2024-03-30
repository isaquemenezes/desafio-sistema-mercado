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
              <button type="button" @click="confirmarExclusao(produto.id)" class="btn btn-danger">Excluir</button>
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

      <!-- Modal de confirmação de exclusão -->
      <div class="modal" :class="{ 'show': mostrarModal }">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmar Exclusão</h5>
              <button type="button" class="btn-close" @click="fecharModal"></button>
            </div>
            <div class="modal-body">
              Tem certeza de que deseja excluir este produto?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="fecharModal">Cancelar</button>
              <button type="button" class="btn btn-danger" @click="deleteProduto">Excluir</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end Modal de confirmação de exclusão -->

    </div>
  </main>

</template>

<script>
export default {

  data() {
    return {
      produtos: [],
      mensagemDeleteSucesso: '',
      mostrarModal: false,
      produtoParaExcluir: null
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

    confirmarExclusao(id) {
      
      this.produtoParaExcluir = id;
      this.mostrarModal = true;
    },
    fecharModal() {
      
      this.mostrarModal = false;
    },

    deleteProduto() {

      fetch(`${this.$apiRoute.produtos.deletar}`, { 
        method: 'DELETE',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ produto_id: this.produtoParaExcluir }),
      })
      .then(data => {
        this.produtos = this.produtos.filter(produto => produto.id !== this.produtoParaExcluir);
        console.log('sucesso frontend:', data.success);
        this.mensagemDeleteSucesso = data.success;
        
        setTimeout(() => {
          this.mensagemDeleteSucesso = '';
        }, 2000);

      })
      .catch(error => {
        console.error('Erro ao excluir o produto:', error);
      })
      .finally(() => {
        
        this.fecharModal();
      });


    }

  }
};
</script>

<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1050;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  outline: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal.show {
  display: block;
}
</style>
