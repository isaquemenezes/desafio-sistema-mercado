<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *"); 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    $crud = new \Models\Crud();
    $produtoService = new \Services\VendaService($crud);

    $controller = new \Controllers\VendaController($produtoService);
    $controller->listar();
}



