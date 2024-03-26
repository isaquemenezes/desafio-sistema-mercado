<?php 
    header('Access-Control-Allow-Origin: *');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        http_response_code(204);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // require_once("../classes/venda/AddProduto.php");
        require_once(__DIR__ . "/../classes/venda/AddProduto.php");

        $requestData = json_decode(file_get_contents('php://input'), true);
        $confirmarVenda = json_decode(file_get_contents('php://input'), true);

        $crud = new Crud();
        $vendas = new AddProduto($crud);
        $vendas->createVenda($requestData, $confirmarVenda); 

    } else {

        http_response_code(405);
        echo json_encode(
            array(
                'error' => 'Método não permitido'
            )
        );
    }