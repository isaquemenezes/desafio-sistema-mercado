
<?php 
    include_once "./includes/head.php"; 
    include_once "./includes/navbar.php";

    // $produtos = $produtoRepositorio->buscarTodos();
?>


    <main class="container">
     
        <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">       

        <div class="d-flex justify-content-between">
          <h3 class="border-bottom pb-2 mb-0">Todos os Produtos</h3>

          <div class="d-flex justify-content-between">
            <a href="" class="btn btn-success">Cadastrar Produto</a>
          
          </div>

        </div>
             
            <strong class="d-block mt-2"> Sem Produtos </strong>
        
              <div class="d-flex text-body-secondary pt-3">

              <div class="me-3">
                  <img src="" alt="Imagem do Produto" style="max-width: 100px;">
              </div>
                
                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                  <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark"><b>Descrição: </b> </strong>

                    <div class="d-flex justify-content-between">
                      <a href="" class="btn btn-primary me-2">editar</a>
                      
                      <button 
                        type="button" 
                        class="btn btn-danger" 
                        data-bs-toggle="modal" 
                        data-bs-target="#confirmDeleteModal" 
                        data-product-id=""
                      >
                        Excluir
                      </button>

                    </div>

                  </div>
                  <span class="d-block"><b>Valor:</b>  </span>
                  <span class="d-block"><b>Estoque:</b>  </span>
                </div>

              </div>
          

      </div>
    </main>

      
  

<?php include_once "./includes/footer.php"; ?>
