<?php  
    namespace Models;

    $crud=new ModelCrud();
    
    // Controlller Edit Personal Finance 
    $validate=$crud->updateDB("personal_finance","numero_parcela=?, valor_parcela=?, cartao=?, produto=?, data_compra=?", "id=?",
                                array(
                                    $numero_parcela, 
                                    $valor_parcela, 
                                    $cartao,
                                    $produto,
                                    $data_compra,                                   
                                    $id
                                )
                            );
   
    if($validate->rowCount() > 0 )
    {
        echo "<script>
                window.history.go(-2);      
              </script>
            ";
    } else {
            echo "<script>
                    alert('Erro!');
                    window.location.href='".DIRPAGE."';      
                  </script>
                ";                
    }

    
    

    