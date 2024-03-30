<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: POST, OPTIONS, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $requestData = json_decode(file_get_contents('php://input'), true);
    // parse_str(file_get_contents("php://input"), $requestData);
    // $produto_id = $requestData['id'];
    
    // $produto_id = $_GET['id'];
    // echo  '>>',$produto_id;

    // echo "$requestData".$requestData;
    // echo json_encode($requestData);
    $produto_id = $requestData['produto_id'];
    // echo json_encode($produto_id);

    $crud = new \Models\Crud();
    $produtoService = new \Services\ProdutoService($crud);

    $controller = new \Controllers\ProdutoController($produtoService);
    $controller->excluir($produto_id);
    
    
  

} else {

    http_response_code(405);
    echo json_encode(
        array(
            'error' => 'Método não permitido'
        )
    );
}

