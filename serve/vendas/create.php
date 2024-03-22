<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $dados = json_decode(file_get_contents('php://input'), true);

     
     echo json_encode($dados);

 
   
} else {
   
    http_response_code(405);
    echo json_encode(array('error' => 'Método não permitido'));
}
?>
