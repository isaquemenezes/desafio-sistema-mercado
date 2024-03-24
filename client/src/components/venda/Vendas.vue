<template>
  <main class="container">

    <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">

      <div class="d-flex justify-content-between">
        <h3 class="border-bottom pb-2 mb-0">Todas as Vendas</h3>

        <div class="d-flex justify-content-between">
          <router-link class="btn btn-success" to="/cadastroVenda">Cadastrar Venda</router-link>

        </div>

      </div>


      <div class="d-flex text-body-secondary pt-3" v-for="venda in vendas" :key="venda.id">




        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
          <div class="d-flex justify-content-between">
            <strong class="text-gray-dark"><b>Descrição: </b>{{ venda.nome }} </strong>

            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-primary me-2">editar</a>

              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                data-product-id="{{ $produto->id }}">
                Excluir
              </button>

            </div>

          </div>
          <span class="d-block"><b>Valor:</b> $produto->valor_venda </span>
          <span class="d-block"><b>Estoque:</b> $produto->estoque </span>
        </div>


      </div>


    </div>
  </main>

</template>

<script>
export default {

  data() {
    return {
      vendas: []
    };
  },

  mounted() {

    fetch(this.$apiRoute.vendas.listar)
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