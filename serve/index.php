<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Permitir acesso de qualquer origem



echo json_encode(["message" => "Hello, world api!"]);
