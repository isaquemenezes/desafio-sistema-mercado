<template>

<main class="container">
     
     <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">     
     </div>    

     <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">         

       <div class="d-flex justify-content-between">
         <h3 class="border-bottom pb-2 mb-0">Todos os Produtos</h3>

         <div class="d-flex justify-content-between">
          
           <button @click="submitVenda" class="btn btn-success">Finalizar Venda</button> 
           
           <div>
              <p>{{ numeroVenda }}</p>
          </div>
         
         </div>
       </div> 
        
           <!-- start loop  -->
             <div 
              class="d-flex text-body-secondary pt-3" 
              v-for="produto in produtos" 
              :key="produto.id"
            >          
               
              <div class="pb-3 mb-0 small lh-sm border-bottom w-100">

                <div class="d-flex justify-content-between align-items-center">
                  <strong class="text-gray-dark"><b>Descrição: </b>{{ produto.descricao }}</strong>             

                    <div> 
                      <button 
                        @click="addProduto(
                          produto.id, 
                          produto.descricao,
                          produto.preco,
                          produto.percentual,
                          produto.quantidade,
                        )" class="btn btn-success">Add +</button>   
                            
                    </div>                  
                  
                </div>

                <div class="d-flex justify-content-start">
                  <div class="d-block">
                    <b>Tipo: </b> {{ produto.tipo }}
                  </div>

                  <div class="d-block ms-3">
                    <b>Preço (R$): </b> {{ produto.preco }}
                  </div>

                  <div class="d-block ms-3">
                    <b>Imposto (%): </b> {{ produto.percentual }}
                  </div>                  

                </div>  
                <div class="mt-2 d-flex justify-content-start">                

                  <label for="" class="me-2"><b>Quantidade:</b></label>
                  <input type="number" v-model.number="produto.quantidade" min="1" step="1" style="width: 50px;">   

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
       finalizar: false,
       numeroVenda: '',
      
      };
    },
    methods: {
     

      submitVenda() {

        // this.finalizar = true;
       
        const novaVenda = {
          finalizar: true,
        };

        fetch(this.$apiRoute.vendas.create , {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(novaVenda)
        })
        .then(response => response.json())
        .then(data => {
                   
          console.log('response', data);
          
        })
        .catch(error => {
          console.error('Erro ao realizar venda:', error);
        });
      },

      addProduto( id, descricao, preco, percentual, quantidade, ) {
        const addProduto = {
          id_produto: id,
          descricao_produto: descricao,
          preco_produto: preco,
          percentual_produto: percentual,
          quantidade_produto: quantidade
        
        };
       
        fetch(this.$apiRoute.vendas.create , {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(addProduto)
        })
        .then(response => response.json())
        .then(data => {                   
          console.log('Venda realizada com sucesso:', data);
        })
        .catch(error => {
          console.error('Erro ao realizar venda:', error);
        });
      }
    },

    mounted() { 
      
      fetch(this.$apiRoute.produtos.listar)
        .then(response => response.json())
        .then(data => {
            this.produtos = data.dados;
            
            console.log('data', data);
         })
        .catch(error => {
          console.error('Error :', error);
        });

      // fetch(this.$apiRoute.vendas.create)
      //   .then(response => response.json())
      //   .then(data => {

      //     this.numeroVenda = data.numero_venda;
                        
      //       console.log('data', data);
      //    })
      //   .catch(error => {
      //     console.error('Error :', error);
      //   });
    },
  };
  </script>
  
  <style>
  
  </style>
  