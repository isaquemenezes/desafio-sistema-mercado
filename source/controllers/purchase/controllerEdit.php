<?php
    namespace Models;

	use DateTime;
    $crud=new ModelCrud();
	
    
    $validate=
      $crud->updateDB(
            "devedor", 
            "nome=?, 
            xparcela=?, 
            valor_parcela_cartao=?, 
            valor_parcela_devedor=?, 
            valor_entrada=?, 
            tipo=?, 
            taxa=?, 
            data_compra=?, 
            produto=?,
            ultima_atualizacao=? ",
            "id=?",
          array(
              $nome, 
              $xparcela,
              $valor_parcela_cartao, 
              $valor_parcela_devedor,
              $valor_entrada,
              $tipo, 
              $taxa,
              $data_compra,
              $produto,
              date('Y-m-d H:i:s'),
              $id
          )
      );
   
    if($validate->rowCount() > 0 )
    {
		 // Executar código de exportação para CSV
		$sql_select = $crud->selectDB(
			"*", 
			"devedor", 
			" ORDER BY id", 
			array()
		);

		if ($sql_select->rowCount() > 0) {
			header('Content-Type: text/csv: charset=UTF-8');
			$_data = new DateTime();
			$data = $_data->format('d-m-Y h:i:s');
			header('Content-Disposition: attachment; filename=devedores_' . $data . '.csv');

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
        'vencimento', 
				'ultima_atualizacao',
				'ativo'
			];

			fputcsv($devedores, $header, ';');

			while ($res_data_user = $sql_select->fetch(\PDO::FETCH_ASSOC)) {
				fputcsv($devedores, $res_data_user, ';');
			}

			fclose($devedores);

      // Esvaziar o buffer de saída antes do redirecionamento
      ob_flush();
      flush();
			
			echo "<script>
                window.history.go(-2);
              </script>
            ";

    
			
		}
	
        
    } else {
            echo "<script>
                    alert('Erro!');
                    window.location.href='".DIRPAGE."';
                  </script>
                ";
    }

    
    

    