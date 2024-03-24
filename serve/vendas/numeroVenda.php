<?php

header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

require_once("../models/Crud.php");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    class addProduto extends Crud {

        protected $crud;
    
        public function __construct(Crud $crud) {
            $this->crud = $crud;
        }
    
        public function createVenda() {
            try {

                $addProdutos = json_decode(file_get_contents('php://input'), true);
                $finalizarVenda = json_decode(file_get_contents('php://input'), true);
               // Verifica se a propriedade 'vender' existe e se é true
               if (isset($finalizarVenda['vender']) && $finalizarVenda['vender']) {

                // $this->crud->createVenda($finalizarVenda[    // $insertProduto = $this->crud->insertDB(
                //         "vendas", 
                //         "?,?,?,?",
                //         array(  
                //             $id,
                //             $addProdutos['id_produto'],
                //             $numero_venda,
                //             $addProdutos['quantidade_produto']
                //         ) 
                       
                    // );
                    
                    echo json_encode('A venda deve ser finalizada.');


                } else {
                    // Faça o que for necessário se a venda não deve ser finalizada
                    echo json_encode('A venda não deve ser finalizada.');
                }


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

                $selectVendasAtual = $this->crud->selectDB(
                    "*", 
                    "vendas", 
                    "where numero_venda = ?", 
                    array(
                        $numero_venda
                    )
                );

                $vendas = $selectVendasAtual->fetchAll(PDO::FETCH_ASSOC);
                $numeroVenda = isset($vendas[0]['numero_venda']) ? $vendas[0]['numero_venda'] : null;


                
                $dataset = [
                    "dados" => $vendas,
                    "numero_venda" =>  $numeroVenda
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
// }  else {
   
//     http_response_code(405);
//     echo json_encode(array('error' => 'Método --não permitido'));
// }