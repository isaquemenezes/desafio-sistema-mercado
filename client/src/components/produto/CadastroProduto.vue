<template>
  <div>
    <h1>Cadastro de Produtos</h1>
    <div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card mt-5">
                <div class="card-header">Adicionar Produto</div>

                <div class="card-body">                     

                    <form @submit.prevent="submitProduto">
                       
                        <div class="form-group">
                          <label for="produto" class="text-start d-block">Descricao do Produto:</label>
                          <input type="text" id="produto" class="form-control" v-model="descricao">                           
                        </div>

                        <div class="form-group mt-2">                        
                            <label for="preco" class="text-start d-block">Preço Unitário:</label>
                            <input type="number" id="preco" class="form-control" v-model.number="preco" step="0.01">

                        </div>

                        <!-- <div class="form-group mt-2">
                            <label for="estoque"  class="text-start d-block">Estoque</label>
                            <input type="number" class="form-control" id="estoque" name="estoque" >
                        </div> -->

                        <div class="form-group mt-2">
                          <label for="preco" class="text-start d-block">Tipo</label>
                          <select v-model="tipo" class="form-control">
                            <option value="" disabled selected>Selecione um tipo</option>
                            <option 
                              v-for="tipo in arrayTipos" 
                              :key="tipo.id" 
                              :value="tipo.tipo"
                            >
                              {{ tipo.tipo }}
                            </option>
                          </select>
                        </div>  

                        <div class="form-group mt-2">

                          <label for="preco" class="text-start d-block">Percentual de Imposto</label>
                          <select v-model="tipo" class="form-control">
                           
                            <option 
                              v-for="tipo in arrayTipos" 
                              :key="tipo.id" 
                              :value="tipo.tipo"
                            >
                              {{ tipo.percentual_imposto }} %
                            </option>
                          </select>
                        </div>  
                        
                        <button type="submit">Cadastrar Produto</button>
                        
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
      preco: 0,
      // tipoId: '',
      tipo: '',

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
        // tipo_id: this.tipoId,
        tipo: this.tipo,
        percentual_imposto: percentualImposto
      };

      // Envia os dados para a API 
      fetch(this.$apiRoute.produtos.create, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(novoProduto)
      })
      .then(response => response.json())
      .then(data => {
        this.descricao = '';
        this.preco = 0;
        // this.tipoId = '';
        this.tipo = '';
        
        console.log('Produto cadastrado com sucesso:', data);
      })
      .catch(error => {
        console.error('Erro ao cadastrar produto:', error);
      });
    }
  },

  mounted() { 
      
      fetch(this.$apiRoute.produtos.tipoImposto)
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

<style>

</style>
