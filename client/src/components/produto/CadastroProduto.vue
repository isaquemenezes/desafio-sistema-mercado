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
                          <label for="produto">Produto:</label>
                          <input type="text" id="produto" class="form-control" v-model="produto">

                           
                        </div>

                        <div class="form-group mt-2">
                           

                            <label for="preco">Preço Unitário:</label>
                            <input type="number" id="preco" class="form-control" v-model.number="preco" step="0.01">

                        </div>

                        <div class="form-group mt-2">
                            <label for="estoque">Estoque</label>
                            <input type="number" class="form-control" id="estoque" name="estoque" require>
                        </div>

                        <div class="form-group mt-2">
                          <label for="preco">Tipo</label>
                          <select v-model="tipoId" class="form-control">
                            <option value="" disabled selected>Selecione um tipo</option>
                            <option 
                              v-for="tipo in tipos" 
                              :key="tipo.id" 
                              :value="tipo.id"
                            >
                              {{ tipo.Tipo }}
                            </option>
                          </select>
                        </div>  

                        <div class="form-group mt-2">

                          <label for="preco">Percentual de Imposto</label>
                          <select v-model="tipoId" class="form-control">
                            <!-- <option value="" disabled selected>Selecione um tipo</option> -->
                            <option 
                              v-for="tipo in tipos" 
                              :key="tipo.id" 
                              :value="tipo.id"
                            >
                              {{ tipo.percentual_imposto }} %
                            </option>
                          </select>
                        </div>  
                        
                        <button type="submit">Adicionar Produto</button>




                        
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
      produto: '',
      quantidade: 0,
      preco: 0,
      tipoId: '',

      tipos: [],
    };
  },
  methods: {
    submitProduto() {

      const percentualImposto = 
        this.tipos.find(
          tipo => tipo.id === this.tipoId
        ).percentual_imposto;
     
      const novoProduto = {
        produto: this.produto,
        quantidade: this.quantidade,
        preco_unitario: this.preco,
        tipo_id: this.tipoId,
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
        this.produto = '';
        this.quantidade = 0;
        this.preco = 0;
        this.tipoId = '';
        
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
            this.tipos = data.tipos; 
         })
        .catch(error => {
          console.error('Error :', error);
        });
  },

};
</script>

<style>

</style>
