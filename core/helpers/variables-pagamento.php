<?php
    
 
    if(isset($_POST['fk_devedor'])){ 
        $fk_devedor=filter_input(INPUT_POST,'fk_devedor',FILTER_SANITIZE_SPECIAL_CHARS); 
    } elseif (isset($_GET['fk_devedor'])){
            $fk_devedor=filter_input(INPUT_GET,'fk_devedor',FILTER_SANITIZE_SPECIAL_CHARS); 
    } else { 
            $fk_devedor=0; 
    } 

    if(isset($_POST['data_pagamento'])){ 
        $data_pagamento=filter_input(INPUT_POST,'data_pagamento',FILTER_SANITIZE_SPECIAL_CHARS); 
    } elseif (isset($_GET['data_pagamento'])){
            $data_pagamento=filter_input(INPUT_GET,'data_pagamento',FILTER_SANITIZE_SPECIAL_CHARS); 
    } else { 
            $data_pagamento=0; 
    } 


    
    // $date = new DateTime();
    // $_date = $date->format('d-m-Y');   

    if(isset($_POST['valor'])){
        $_valor=filter_input(INPUT_POST,'valor',FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif(isset($_GET['valor'])){
        $_valor=filter_input(INPUT_GET,'valor',FILTER_SANITIZE_SPECIAL_CHARS);
    } else { 
        $_valor="";
    }
    
   
    if(isset($_POST['numero_parcela'])){
        $_numero_parcela=filter_input(INPUT_POST,'numero_parcela',FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif(isset($_GET['numero_parcela'])){
        $_numero_parcela=filter_input(INPUT_GET,'numero_parcela',FILTER_SANITIZE_SPECIAL_CHARS);
    } else { 
        $_numero_parcela="";
    }

    if(isset($_POST['forma_pagamento'])){ 
        $_forma_pagamento=filter_input(INPUT_POST,'forma_pagamento',FILTER_SANITIZE_SPECIAL_CHARS); 
    } elseif (isset($_GET['forma_pagamento'])){
            $_forma_pagamento=filter_input(INPUT_GET,'forma_pagamento',FILTER_SANITIZE_SPECIAL_CHARS); 
    } else { 
            $_forma_pagamento=0; 
    } 

    //array para registro de novo cartão
    $arrVarPag=[
        "fk_devedor"=>$fk_devedor,
        "data"=>$data_pagamento,
        "valor"=>$_valor,
        "numero_parcela"=>$_numero_parcela,
        "forma_pagamento"=>$_forma_pagamento    
    ];

  