<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Se for uma requisição OPTIONS, retorne apenas os cabeçalhos CORS e status 200
// Dados de teste
$dadosVendas = [
    [
        "id" => 1,
        "produto" => "Produto A",
        "quantidade" => 10,
        "preco_unitario" => 25.99
    ],
    [
        "id" => 2,
        "produto" => "Produto B",
        "quantidade" => 5,
        "preco_unitario" => 19.99
    ],
    [
        "id" => 3,
        "produto" => "Produto C",
        "quantidade" => 8,
        "preco_unitario" => 30.50
    ]
];

// Adicionando a mensagem e os dados de teste ao array associativo
$resposta = [
    "message" => "Hello, world API - Vendas!",
    "data" => $dadosVendas
];

// Codificar o array associativo em JSON e retornar como resposta
echo json_encode($resposta);
