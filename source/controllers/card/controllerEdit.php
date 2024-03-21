<?php  
    namespace Models;

    $crud=new ModelCrud();
    
    $validate=$crud->updateDB("card", 
                              "nome_cartao=?, limite=?, vencimento=?", 
                              "id=?",
                                array(
                                    $nome, 
                                    $limite, 
                                    $vencimento, 
                                    $id
                                )
                            );
   
    if($validate->rowCount() > 0 )
    {
        echo "<script>
                alert('Sucesso!');
                window.location.href='".DIRPAGE."';      
              </script>
            ";
    } else {
            echo "<script>
                    alert('Erro!');
                    window.location.href='".DIRPAGE."';      
                  </script>
                ";                
    }