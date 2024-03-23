<?php


// Permitir solicitações CORS de qualquer origem
header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}
// Verifica se a requisição é um POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados
    $dados = json_decode(file_get_contents('php://input'), true);

    // var_dump($dados);

  
     echo json_encode($dados);

 
    // $conexao = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco_de_dados');

   
    // if ($conexao->connect_error) {
    //     die('Erro de conexão: ' . $conexao->connect_error);
    // }

    // // Prepara e executa a query para inserir o produto no banco de dados
    // $query = $conexao->prepare('INSERT INTO produtos (produto, quantidade, preco_unitario) VALUES (?, ?, ?)');
    // $query->bind_param('sid', $dados['produto'], $dados['quantidade'], $dados['preco_unitario']);
    // $query->execute();

    // // Verifica se a inserção foi bem sucedida
    // if ($query->affected_rows === 1) {
    //     echo json_encode(array('message' => 'Produto cadastrado com sucesso'));
    // } else {
    //     echo json_encode(array('message' => 'Erro ao cadastrar produto'));
    // }

    // // Fecha a conexão com o banco de dados
    // $conexao->close();
} else {
    // Se a requisição não for um POST, retorna um erro
    http_response_code(405);
    echo json_encode(array('error' => 'Método não permitido'));
}

