<template>
  <div>
    <h1>Cadastro de Produtos</h1>
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
          <div class="card mt-5">
            <div class="card-header">Adicionar Produto</div>

            <div v-if="messagemSucesso" class="alert alert-success" role="alert">
              {{ messagemSucesso }}
            </div>

            <div class="card-body">

              <form @submit.prevent="submitProduto">

                <div class="form-group">
                  <label for="produto" class="text-start d-block">Descricao do Produto:</label>
                  <input type="text" v-model="descricao" id="produto" class="form-control">
                </div>

                <div class="form-group mt-2">
                  <label for="preco" class="text-start d-block">Preço Unitário:</label>
                  <input type="text" id="preco" v-model.number="preco" class="form-control"
                    placeholder="somente valores inteirios">

                </div>

                <div class="form-group mt-2">
                  <label for="preco" class="text-start d-block">Tipo</label>

                  <select v-model="tipo" class="form-control">
                    <option value="" disabled selected>Selecione um tipo</option>
                    <option v-for="tipo in arrayTipos" :key="tipo.id" :value="tipo.tipo">
                      {{ tipo.tipo }}
                    </option>
                  </select>

                </div>

                <div class="form-group mt-2">

                  <label for="preco" class="text-start d-block">Percentual de Imposto</label>
                  <select v-model="tipo" class="form-control">

                    <option v-for="tipo in arrayTipos" :key="tipo.id" :value="tipo.tipo">
                      {{ tipo.percentual_imposto }} %
                    </option>
                  </select>
                </div>

                <button type="submit" class="btn btn-success mt-3">Cadastrar Produto</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</template>

<script>

export default {
  data() {
    return {
      descricao: '',
      preco: '',
      tipo: '',

      messagemSucesso: '',
      arrayTipos: [],

    };
  },
  methods: {
    submitProduto() {

      const percentualImposto =
        this.arrayTipos.find(
          tipoo => tipoo.tipo === this.tipo
        ).percentual_imposto;

      const novoProduto = {
        descricao: this.descricao,
        preco: this.preco,
        tipo: this.tipo,
        percentual_imposto: percentualImposto
      };

      // Envia os dados para a API 
      axios.post(this.$apiRoute.produtos.create, novoProduto, {
        // method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        // body: JSON.stringify(novoProduto)
      })
        .then(response => 
        // response.json())        .then(data => 
        {
          this.descricao = '';
          this.preco = 0;
          this.tipo = '';

          this.messagemSucesso = response.data.success;

          console.log('Produto cadastrado com sucesso:', response.data);
        })
        .catch(error => {
          console.error('Erro ao cadastrar produto:', error);
        });

      this.mensagemSucesso = '';
      setTimeout(() => {
        location.reload();
      }, 1000);

    }
  },


  mounted() {

    fetch(this.$apiRoute.produtos.tipoImposto, {
      method: 'GET',
    })
      .then(response => response.json())
      .then(data => {
        this.arrayTipos = data.tipos;
      })
      .catch(error => {
        console.error('Error :', error);
      });
  },

};
</script>

<style></style>
