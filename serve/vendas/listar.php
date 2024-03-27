<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *"); 

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        require_once __DIR__ . "/../controllers/venda/Listar.php";

        $crud = new Crud();
        $vendas = new Listar($crud);

        $vendas->listarVendas();

    } else {

        http_response_code(405);
        echo json_encode(
            array(
                'error' => 'Método não permitido'
            )
        );
    }



