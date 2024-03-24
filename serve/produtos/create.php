<?php

// header('Access-Control-Allow-Origin: *');

// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    
//     header('Access-Control-Allow-Methods: POST, OPTIONS');
//     header('Access-Control-Allow-Headers: Content-Type');
//     http_response_code(204);
//     exit;
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
//     $dados = json_decode(file_get_contents('php://input'), true);

     
//      echo json_encode($dados);

 
   
// } else {
   
//     http_response_code(405);
//     echo json_encode(array('error' => 'Método não permitido'));
// }

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once("../models/Crud.php");

    // Classe para criar produtos
    class CreateProdutos extends Crud {

        protected $crud;

        public function __construct(Crud $crud) {
            $this->crud = $crud;
        }

        public function createProduto($produtos) {
            try {

                // echo 'ddd', $produtos;

                $id = 0;
                $preco = $produtos['preco'];
                $descricao = $produtos['descricao'];
                $tipo = $produtos['tipo'];
                $percentual_imposto = $produtos['percentual_imposto'];

                // $id = 0;
                // $preco = 236;
                // $descricao ='1sx';
                // $tipo = 'AAA1';
                // $percentual_imposto = 3;

                $insertProdutos = $this->crud->insertDB(
                    "produtos", 
                    "?,?,?,?,?",
                    array(  
                        $id,
                        $preco,
                        $descricao,
                        $tipo,
                        $percentual_imposto
                    ) 
                    // "('0', '$descricao', $preco, '$tipo', $percentual)"
                );

                if ($insertProdutos) {
                    echo json_encode(array('success' => 'Produto cadastrado com sucesso.'));
                } else {
                    echo json_encode(array('error' => 'Erro ao cadastrar o produto.'));
                }
            } catch (PDOException $erro) {
                echo json_encode(array('error' => 'Erro ao cadastrar o produto: ' . $erro->getMessage()));
            }
        }
    }

    // Obtém os dados do corpo da requisição
    $requestData = json_decode(file_get_contents('php://input'), true);

    // echo json_encode($requestData);;
    // echo 'request', $requestData);


    // // Cria uma instância do CRUD
    $crud = new Crud();
    $createProdutos = new CreateProdutos($crud);

    // Chama o método para criar o produto
    $createProdutos->createProduto($requestData);
// }

