<?php

    if(isset($_POST['id'])){ $id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS); }
    elseif(isset($_GET['id'])){ $id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS); }
    else{ $id=0; }
    
    if(isset($_POST['nome'])){
        $nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif(isset($_GET['nome'])){
        $nome=filter_input(INPUT_GET,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
    } else { 
        $nome="";
    }

    if(isset($_POST['fk_account'])){ 
        $fk_account=filter_input(INPUT_POST,'fk_account',FILTER_SANITIZE_SPECIAL_CHARS); 
    } elseif (isset($_GET['fk_account'])){
            $fk_account=filter_input(INPUT_GET,'fk_account',FILTER_SANITIZE_SPECIAL_CHARS); 
    } else { 
            $fk_account=0; 
    }

    if(isset($_POST['vencimento'])){
        $vencimento=filter_input(INPUT_POST,'vencimento',FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif(isset($_GET['vencimento'])){
        $vencimento=filter_input(INPUT_GET,'vencimento',FILTER_SANITIZE_SPECIAL_CHARS);
    } else { 
        $vencimento=null;
    }

    if(isset($_POST['limite'])){
        $limite=filter_input(INPUT_POST,'limite',FILTER_SANITIZE_SPECIAL_CHARS);
    } elseif(isset($_GET['limite'])){
        $limite=filter_input(INPUT_GET,'limite',FILTER_SANITIZE_SPECIAL_CHARS);
    } else { 
        $limite="";
    }

    //name register devedor
    if(isset($_POST['numero_total_parcela'])){ $_numero_total_parcela=filter_input(INPUT_POST,'numero_total_parcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['numero_total_parcela'])){ $_numero_total_parcela=filter_input(INPUT_GET,'numero_total_parcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $_numero_total_parcela=""; }

    if(isset($_POST['xparcela'])){ $xparcela=filter_input(INPUT_POST,'xparcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['xparcela'])){ $xparcela=filter_input(INPUT_GET,'xparcela',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $xparcela=""; }

    if(isset($_POST['valor_parcela_cartao'])){ $valor_parcela_cartao=filter_input(INPUT_POST,'valor_parcela_cartao',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['valor_parcela_cartao'])){ $valor_parcela_cartao=filter_input(INPUT_GET,'valor_parcela_cartao',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $valor_parcela_cartao=""; }

    if(isset($_POST['valor_parcela_devedor'])){ $valor_parcela_devedor=filter_input(INPUT_POST,'valor_parcela_devedor',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['valor_parcela_devedor'])){ $valor_parcela_devedor=filter_input(INPUT_GET,'valor_parcela_devedor',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $valor_parcela_devedor=""; }

    if(isset($_POST['valor_entrada'])){ $valor_entrada=filter_input(INPUT_POST,'valor_entrada',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['valor_entrada'])){ $valor_entrada=filter_input(INPUT_GET,'valor_entrada',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $valor_entrada=""; }

    if(isset($_POST['tipo'])){ $tipo=filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['tipo'])){ $tipo=filter_input(INPUT_GET,'tipo',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $tipo=""; }

    if(isset($_POST['taxa'])){ $taxa=filter_input(INPUT_POST,'taxa',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['taxa'])){ $taxa=filter_input(INPUT_GET,'taxa',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $taxa=""; }

    if(isset($_POST['data_compra'])){ $data_compra=filter_input(INPUT_POST,'data_compra',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['data_compra'])){ $data_compra=filter_input(INPUT_GET,'data_compra',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $data_compra=""; }

    if(isset($_POST['produto'])){ $produto=filter_input(INPUT_POST,'produto',FILTER_SANITIZE_SPECIAL_CHARS); } 
    elseif(isset($_GET['produto'])){ $produto=filter_input(INPUT_GET,'produto',FILTER_SANITIZE_SPECIAL_CHARS); } 
    else { $produto=""; }

  


    //array para registro de novo cartão
    $arrVarCard=[
        "nome"=>$nome,
        "limite"=>$limite,
        "vencimento"=>$vencimento         
    ];

    //array para registro de novo devedor
    $arrVarDev = [
        "nome"=>$nome,
        "numero_total_parcela"=>$_numero_total_parcela,
        "xparcela"=>$xparcela,
        "valor_parcela_cartao"=>$valor_parcela_cartao,
        "valor_parcela_devedor"=>$valor_parcela_devedor,
        "valor_entrada"=>$valor_entrada,
        "tipo"=>$tipo,
        "taxa"=>$taxa,
        "data_compra"=>$data_compra,
        "produto"=>$produto,
        "vencimento" =>$vencimento,
        "ultima_atualizacao" => date('Y-m-d H:i:s')
    ];
    