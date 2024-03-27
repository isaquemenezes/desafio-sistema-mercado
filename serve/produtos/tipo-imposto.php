<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $tipoProduto = new \Classes\TipoProduto();
    $dataset = $tipoProduto->getDataset();

    echo json_encode($dataset);

} else {

    http_response_code(405);
    echo json_encode(
        array(
            'error' => 'Método não permitido'
        )
    );
}