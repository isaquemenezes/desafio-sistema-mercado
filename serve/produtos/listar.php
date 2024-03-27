<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . "/../classes/produto/Produtos.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $crud = new Crud();
    $produtos = new Produtos($crud);

    $produtos->listarProdutos();

} else {

    http_response_code(405);
    echo json_encode(
        array(
            'error' => 'Método não permitido'
        )
    );
}



