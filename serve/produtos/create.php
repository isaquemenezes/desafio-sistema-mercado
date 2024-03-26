<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once("../models/Crud.php");

    class CreateProdutos extends Crud {

        protected $crud;
        public function __construct(Crud $crud) {
            $this->crud = $crud;
        }

        public function createProduto($produtos) {
            try {

                $id = 0;
                $preco = $produtos['preco'];
                $descricao = $produtos['descricao'];
                $tipo = $produtos['tipo'];
                $percentual_imposto = $produtos['percentual_imposto'];

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
                );

                if ($insertProdutos) {
                    echo json_encode(
                        array(
                            'success' => 'Produto cadastrado com sucesso.'
                        )
                    );
                } else {
                    echo json_encode(
                        array(
                            'error' => 'Erro ao cadastrar o produto.'
                        )
                    );
                }
            } catch (PDOException $erro) {
                echo json_encode(
                    array(
                        'error' => 'Erro ao cadastrar o produto: ' . $erro->getMessage()
                    )
                );
            }
        }
    }

    $requestData = json_decode(file_get_contents('php://input'), true);
  
    $crud = new Crud();
    $createProdutos = new CreateProdutos($crud);

    $createProdutos->createProduto($requestData);
    
} else {

    http_response_code(405);
    echo json_encode(
        array(
            'error' => 'Método não permitido'
        )
    );
}

