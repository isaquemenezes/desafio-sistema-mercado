<?php 
    include_once "./includes/head.php"; 
    include_once "./includes/navbar.php";
?>

<main class="container">
     
       
     <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">        

       <div class="d-flex justify-content-between">
           <h3 class="border-bottom pb-2 mb-0">Todas as Vendas</h3>

        

       </div>     

    
           
    
                   <div class="d-flex text-body-secondary pt-3">                     
                       
                       <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                           <div class="d-flex justify-content-between">
                               <strong class="text-gray-dark"><b>Descrição: </b>  </strong>

                               <div class="d-flex justify-content-between">
                                                                       
                                   <button 
                                       type="button" 
                                       class="btn btn-danger" 
                                       data-bs-toggle="modal" 
                                       data-bs-target="#confirmDeleteModal" 
                                       data-order-id=""
                                   >
                                       Excluir
                                   </button>

                               </div>

                           </div>

                           <span class="d-block"><b>Valor:</b>  </span>
                           <span class="d-block"><b>Quantidade:</b>  </span>
                       </div>
                   </div>
            

     </div>
   </main>

   <!-- modal exclusão -->
   <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           Tem certeza que deseja excluir este pedido?
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
           <form id="deleteForm" action="" method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Excluir</button>
           </form>
         </div>
       </div>
     </div>
   </div>

   
   <!-- script js   -->
   <script>
     var deleteModal = document.getElementById('confirmDeleteModal');
     deleteModal.addEventListener('show.bs.modal', function (event) {
       var button = event.relatedTarget;
       var productId = button.getAttribute('data-order-id');
       var form = deleteModal.querySelector('#deleteForm');
       var actionUrl = '{{ route("pedidos.destroy", ":id") }}'.replace(':id', productId);
       form.setAttribute('action', actionUrl);
     });
     </script>


<?php include_once "./includes/footer.php"; ?>