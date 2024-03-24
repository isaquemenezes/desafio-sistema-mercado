<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 

$tipoProduto = [
    [
        "id" => 1,
        "tipo" => "A",
        "percentual_imposto" => 7
    ],
    [
        "id" => 2,
        "tipo" => "AA",
        "percentual_imposto" => 10
    ],
    [
        "id" => 3,
        "tipo" => "AAA",
        "percentual_imposto" => 17
    ]
];


$dataset = [
    "message" => "Tipos de produtos com percentual de imposto",
    "tipos" => $tipoProduto
];


echo json_encode($dataset);

