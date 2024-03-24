<template>
   <main class="container">
     
     <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">     
     </div>    

     <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">
          

       <div class="d-flex justify-content-between">
         <h3 class="border-bottom pb-2 mb-0">Todos as vendas {{ calcularTotalProdutos() }} - {{ calcularTotalImpostos() }}</h3>

         <div class="d-flex justify-content-between">          
           <router-link class="btn btn-success" to="/cadastroVenda">Cadastrar Venda</router-link>         
         </div>
       </div>    

        <div v-if="vendas.length < 0 ">
          <strong class="d-block mt-2"> Sem vendas </strong>
        </div>

          <div v-else>         
           <!-- start loop  -->
             <div 
              class="d-flex text-body-secondary pt-3" 
              v-for="venda in vendas" 
              :key="venda.id"
            >           
               
              <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between align-items-center">
                  <strong class="text-gray-dark"><b>Descrição: </b>{{ venda.produto.descricao }}</strong>

                  <div> 
                    <button type="button" class="btn btn-primary me-2">Editar</button>
                    <button type="button" class="btn btn-danger">Excluir</button>
                  </div>
                  
                </div>
                <div class="d-flex justify-content-start">

                  <div class="d-block">
                    <b>Valor: </b> {{ venda.produto.preco }}
                  </div>

                  <div class="d-block ms-3">
                    <b>Imposto: </b> {{ venda.produto.percentual }}
                  </div>

                  <div class="d-block ms-3">
                    <b>Quantidade: </b> {{ venda.quantidade_produto }}
                  </div>


                  <div class="d-block ms-3">
                    <b>Total: </b> {{ calcularTotal(venda) }}
                  </div>

                  <div class="d-block ms-3">
                    <b>Total de Imposto: </b>  {{ calcularImposto(venda)  }}
                  </div>

                  
                </div>              
              </div>


            

            </div> 
             <!-- end loop -->
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

  methods: {
    
    calcularTotal(venda) {
      return venda.produto.preco * venda.quantidade_produto; 
    },

    calcularTotalProdutos() {
      let total = 0;
      
      this.vendas.forEach(venda => {
        total += this.calcularTotal(venda);
      });
      
      return total;
    },

    calcularImposto(venda) {   
      return (venda.produto.preco * venda.produto.percentual / 100) * venda.quantidade_produto;    
    },

    calcularTotalImpostos() {
      let total = 0;

      this.vendas.forEach(venda => {
        total += this.calcularImposto(venda);
      });
      
      return total;
    }


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