<?php 
    namespace Models;
    
    $crud=new ModelCrud();
    
    $id_devedores = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);   
    
    if(isset($id_devedores))
    {   
         
        $crud->updateDB(
            "devedor", 
            "ativo=?,
            ultima_atualizacao=?", 
            "id=?",
            array(
                0,
                date('d-m-Y H:i'),
                $id
            )
        );

        echo"<script> 
                    alert('Deletado com successo!'); 
                    window.location.href='".DIRPAGE."';
                    </script>
                ";
    }

    $id_personal_finance = filter_input(INPUT_GET, 'id_personal_fin', FILTER_SANITIZE_SPECIAL_CHARS);   
    if(isset($id_personal_finance))
    {   
        $crud->deleteDB("personal_finance", "id=?", array($id_personal_finance));            

        echo"<script> 
                    alert('Deletado com successo!'); 
                    window.location.href='".DIRPAGE."';
                    </script>
                ";
    }

   
      
