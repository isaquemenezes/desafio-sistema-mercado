<?php
    namespace Models;

    use DateTime;

   \Classes\ClassSessionUser::setHeadRestrito("user");    

    // Limpar o buffer
    ob_start();
    $crud = new ModelCrud();

    $sql_select= $crud->selectDB("*", "devedor", " ORDER BY id", array());
   
    if ($sql_select->rowCount() > 0 ) 
    {
       
        header('Content-Type: text/csv: charset=UTF-8');
        $_data = new DateTime();
        $data = $_data->format('d-m-Y h:i:s');
      
        header('Content-Disposition: attachment; filename=devedores_'. $data .'.csv');
       
        $devedores = fopen('php://output', 'w');        
        
        $header = [
            'id', 
            'nome',
            'numero_total_parcela', 
            'xparcelas', 
            'valor_parcela_cartao', 
            'valor_parcela_devedor', 
            'valor_entrada', 
            'tipo', 
            'taxa', 
            'data_compra', 
            'produto', 
            'estabelecimento'
        ];
       
        fputcsv($devedores, $header, ';');

        while ($res_data_user = $sql_select->fetch(\PDO::FETCH_ASSOC)) { 
       
            fputcsv($devedores, $res_data_user, ';');
        }
      
        fclose($devedores);

    } else {
        // header("location: index.php");
    }