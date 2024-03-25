<template>
   <main class="container">
     
     <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">     
     </div>    

     <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">
          

       <div class="d-flex justify-content-between">
         <h3 class="border-bottom pb-2 mb-0">Todos as vendas </h3>

         <div class="d-flex justify-content-between">          
           <router-link class="btn btn-success" to="/cadastroVenda">Cadastrar Nova Venda</router-link>         
         </div>
       </div>    

        <div v-if="vendas.length < 0 ">
          <strong class="d-block mt-2"> Sem vendas </strong>
        </div>

        <div v-else>         
            <!-- start loop  -->
            <div v-for="(vendas, index) in Vendas()" :key="index">
              
              <h3 class="border-bottom mt-5 pb-2 mb-0 text-start"> 
                Venda {{ index }}                 
              </h3> 

                <div 
                class="d-flex text-body-secondary pt-3" 
                v-for="venda in vendas" 
                :key="venda.id"
                >           
                
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between align-items-center">
                        <strong class="text-gray-dark"><b>Descrição: </b>{{ venda.produto.descricao }}  
                        </strong>

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
                            <b>Total R$: </b> {{ venda.total }}
                            
                        </div>

                        <div class="d-block ms-3">
                            <b>Total de Imposto R$: </b>  {{ venda.imposto }}
                            
                        </div>

                        
                        </div>              
                    </div>           
                </div> 

                <h4 class="border-bottom pb-2 mb-5 text-start"> 
                  Valor Total (R$): {{  calcularTotalPorGrupo(vendas) }} <br> 
                  Total de Imposto (R$):  {{ calcularTotalImpostoPorGrupo(vendas) }}
                  
                </h4> 


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

    Vendas() {
      const vendasAgrupadas = {};

      this.vendas.forEach(venda => {
        const numeroVenda = venda.numero_venda;        
        
        if (!vendasAgrupadas[numeroVenda]) {
          vendasAgrupadas[numeroVenda] = [];
        }

        vendasAgrupadas[numeroVenda].push(venda);       
      });
     
      return vendasAgrupadas;
    },

    calcularTotalPorGrupo(vendas) {
      let total = 0;
      
      vendas.forEach(venda => {
        total += venda.total;
      });

      return total;
    },

    calcularTotalImpostoPorGrupo(vendas) {
      let totalImposto = 0;
      
      vendas.forEach(venda => {
        totalImposto += venda.imposto;
      });

      return totalImposto;
    },

    
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