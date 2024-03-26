<?php 
    header('Access-Control-Allow-Origin: *');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        http_response_code(204);
        exit;
    }

    require_once("../classes/venda/AddProduto.php");

    $requestData = json_decode(file_get_contents('php://input'), true);
    $confirmarVenda = json_decode(file_get_contents('php://input'), true);

    // Instancia o objeto e chama o método para criar a venda
    $crud = new Crud();
    $vendas = new AddProduto($crud);
    $vendas->createVenda($requestData, $confirmarVenda); 

