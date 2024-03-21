<?php

    if(isset($_POST['id'])){ $id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS); }
    elseif(isset($_GET['id'])){ $id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS); }
    else{ $id=0; }
    
   
    if(isset($_POST['numero_parcela'])){ $numero_parcela=filter_input(INPUT_POST,'numero_parcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['numero_parcela'])){ $numero_parcela=filter_input(INPUT_GET,'numero_parcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $numero_parcela=""; }

    if(isset($_POST['valor_parcela'])){ $valor_parcela=filter_input(INPUT_POST,'valor_parcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['valor_parcela'])){ $valor_parcela=filter_input(INPUT_GET,'valor_parcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $valor_parcela=""; }
  
    if(isset($_POST['cartao'])){ $cartao=filter_input(INPUT_POST,'cartao',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['cartao'])){ $cartao=filter_input(INPUT_GET,'cartao',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $cartao=""; }
   
    if(isset($_POST['produto'])){ $produto=filter_input(INPUT_POST,'produto',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['produto'])){ $produto=filter_input(INPUT_GET,'produto',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $produto=""; }

    if(isset($_POST['data_compra'])){ $data_compra=filter_input(INPUT_POST,'data_compra',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['data_compra'])){ $data_compra=filter_input(INPUT_GET,'data_compra',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $data_compra=""; }

    $arrVarPerson =[
        'numero_parcela'=>$numero_parcela,
        'valor_parcela'=>$valor_parcela,
        'cartao'=>$cartao,
        'produto'=>$produto,
        'data_compra'=>$data_compra
    ];

    //echo var_dump($arrVarPerson);