<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../vendor/autoload.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    $crud = new \Models\Crud();
    $produtoService = new \Services\ProdutoService($crud);

    $controller = new \Controllers\ProdutoController($produtoService);
    $controller->listar();
}



