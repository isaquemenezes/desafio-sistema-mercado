<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

require_once("../models/Crud.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    class addProduto extends Crud {

        protected $crud;
    
        public function __construct(Crud $crud) {
            $this->crud = $crud;
        }
    
        public function createVenda() {
            try {

                $addProdutos = json_decode(file_get_contents('php://input'), true);

                $id=0;
                $numero_venda=1;

                $insertProduto = $this->crud->insertDB(
                    "vendas", 
                    "?,?,?,?",
                    array(  
                        $id,
                        $addProdutos['id_produto'],
                        $numero_venda,
                        $addProdutos['quantidade_produto']
                    ) 
                   
                );
               
    
                $dataset = [
                    "dados" => $insertProduto
                ];
    
                
                echo json_encode($dataset);
               
            } catch (PDOException $erro) {
              
                echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
            }
        }
    }
    
    
    $crud = new Crud();
    $vendas = new addProduto($crud);
    
    $vendas->createVenda();

    
    // $addProdutos = json_decode(file_get_contents('php://input'), true);

    
    // protected $crud;

    // public function __construct(Crud $crud) {
    //     $this->crud = $crud;
    // }


    // echo json_encode($addProdutos['id_produto']);
    
    // //   if (is_array($addProdutos) && count($addProdutos) > 0) {
       
    // //     $produtosArray = [];
    // //     foreach ($addProdutos as $produto) {
    // //         $produtosArray[] = [
    // //             'id'=> $produto['id_produto'],
    // //             // 'descricao'=> $produto['descricao_produto'],
    // //             // 'preco'=> $produto['preco_produto'],
    // //             // 'percentual'=> $produto['percentual_produto'],
    // //             // 'quantidade'=> $produto['quantidade_produto']
    // //         ];
    // //     }
        
       
    // //     echo json_encode($produtosArray);
    // //     // echo json_encode($addProdutos);
    // // } else {
      
    // //     http_response_code(400);
    // //     echo json_encode(array('error' => 'Nenhum dado de produto recebido ou formato inválido'));
    // // }

 
   
} else {
   
    http_response_code(405);
    echo json_encode(array('error' => 'Método não permitido'));
}

