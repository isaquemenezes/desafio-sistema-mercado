<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Permitir acesso de qualquer origem
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Permitir métodos GET, POST e OPTIONS
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Permitir cabeçalhos Content-Type e Authorization

// Se for uma requisição OPTIONS, retorne apenas os cabeçalhos CORS e status 200
// a
echo json_encode(["message" => "Hello, world api!"]);
