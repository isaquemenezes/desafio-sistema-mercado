<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../vendor/autoload.php'; // Carrega o autoload do Composer

// use Controllers\ProdutoController;
// use Models\Crud;

// require_once __DIR__ . "/../controllers/produto/Produtos.php";

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {


//     $crud = new Crud();
//     $produtos = new Produtos($crud);

//     $produtos->listarProdutos();

// } else {

//     http_response_code(405);
//     echo json_encode(
//         array(
//             'error' => 'Método não permitido'
//         )
//     );
// }


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once __DIR__ . "/../controllers/ProdutoController.php";
    require_once __DIR__ . "/../services/ProdutoService.php";
    require_once __DIR__ . "/../models/Crud.php";

    $crud = new \Models\Crud();
    $produtoService = new \Services\ProdutoService($crud);

    $controller = new \Controllers\ProdutoController($produtoService);
    $controller->listar();
}



