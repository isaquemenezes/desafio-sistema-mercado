<?php 

    header('Access-Control-Allow-Origin: *');

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        http_response_code(204);
        exit;
    }

    echo json_encode(
            array(
                'index' => 'Acessou fornecedor API PHP'
            )
        );