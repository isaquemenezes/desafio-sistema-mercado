<template>

<main class="container">
     
     <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">     
     </div>    

     <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">

<!--       
           <div class="alert alert-success" role="alert">
               {{ session('success') }}
           </div> -->
          

       <div class="d-flex justify-content-between">
         <h3 class="border-bottom pb-2 mb-0">Todos os Produtos</h3>

         <div class="d-flex justify-content-between">
           <!-- <a href="#" >Cadastrar Produto</a> -->
           <router-link class="btn btn-success" to="/cadastroProduto">Cadastrar Produto</router-link>
         
         </div>

       </div>
      

      
           <!-- <strong class="d-block mt-2"> Sem Produtos </strong> -->
        
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
                    <button type="button" class="btn btn-primary me-2">Editar</button>
                    <button type="button" class="btn btn-danger">Excluir</button>
                  </div>
                  
                </div>

                <div class="d-flex justify-content-start">

                  <div class="d-block">
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
      };
    },
    methods: {
      submitVenda() {
       
        const novaVenda = {
          produto: this.produto,
          quantidade: this.quantidade,
          preco_unitario: this.preco
        };

        // Envia os dados para a API 
        fetch(this.$apiRoute.vendas.create , {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(novaVenda)
        })
        .then(response => response.json())
        .then(data => {
          this.produto = '';
          this.quantidade = 0;
          this.preco = 0;
          
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
  },
  };
  </script>
  
  <style>
  
  </style>
  