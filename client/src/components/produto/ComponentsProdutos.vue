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
             <div class="d-flex text-body-secondary pt-3" v-for="produto in produtos" :key="produto.id">

             <div class="me-3">
                 <img src="#" alt="Imagem do Produto" style="max-width: 100px;">
             </div>
               
               <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                 <div class="d-flex justify-content-between">
                   <strong class="text-gray-dark"><b>Descrição: </b>  {{ produto.nome }}</strong>

                   <div class="d-flex justify-content-between">
                     <a href="#" class="btn btn-primary me-2">editar</a>
                     
                     <button 
                       type="button" 
                       class="btn btn-danger" 
                       data-bs-toggle="modal" 
                       data-bs-target="#confirmDeleteModal" 
                       data-product-id="#"
                     >
                       Excluir
                     </button>

                   </div>

                 </div>
                 <span class="d-block"><b>Valor:</b> {{ produto.tipo }} </span>
                 <span class="d-block"><b>Estoque:</b> {{ produto.taxa }} </span>
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
      produtos: []
    };
  },
  mounted() {
    fetch(this.$apiRoute.produtos.listar)
      .then(response => response.json())
      .then(data => {
        this.produtos = data.dados;
        console.log('Dados dos produtos:', this.produtos);
      })
      .catch(error => {
        console.error('Erro ao buscar os produtos:', error);
      });
  },
  methods: {
    excluirProduto(id) {
      // Lógica para excluir o produto com o ID fornecido
    }
  }
};
</script>
