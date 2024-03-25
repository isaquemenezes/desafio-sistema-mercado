<?php 
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

require_once("../models/Crud.php");

class AddProduto extends Crud {

    protected $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function createVenda() {
        try {

           

            $addProduto = json_decode(file_get_contents('php://input'), true);
            $dados = json_decode(file_get_contents('php://input'), true);

            if(isset($addProduto['id_produto'])) {
                $id = 0;
                $numeroVenda = null;
                $insertProduto = $this->crud->insertDB(
                    "vendas", 
                    "?,?,?,?",
                    array(  
                        $id,
                        $addProduto['id_produto'],
                        0,
                        $addProduto['quantidade_produto']
                    ) 
                );
            }
          


            if (isset($dados['finalizar']) && $dados['finalizar'] === true) {
                    
                // $ultimoNumeroVenda = $this->crud->selectDB(
                //     "*", 
                //     "vendas", 
                //     "where numero_venda=?", 
                //     array(
                //         0
                //     )
                // )->fetch(PDO::FETCH_ASSOC);
                $ultimoNumeroVenda = $this->crud->selectDB(
                    "*", 
                    "vendas", 
                    // "ORDER BY id DESC LIMIT 1", 
                    "WHERE numero_venda <> ? ORDER BY id DESC LIMIT 1",
                    array(
                        0
                    )
                )->fetch(PDO::FETCH_ASSOC);

                $numeroVenda = $ultimoNumeroVenda ? $ultimoNumeroVenda['numero_venda'] + 1 : 1;

                // $numeroVenda=1;
            
                $this->crud->updateDB(
                    "vendas", 
                    "numero_venda=?", // values
                    "numero_venda=?", // where
                    array(
                        $numeroVenda,
                        0
                    )
                );
               

            
                echo json_encode([
                    'venda' => 'Venda registrada com sucesso'
                ]);

               
            } else {
                echo json_encode(
                    array(
                        'numero_venda' => 'A venda não deve ser finalizada.'
                    )
                );
                
            }

         


            /*


            $ultimoNumeroVenda = 
            $this->crud->selectDB(
                "numero_venda", 
                "vendas", 
                "ORDER BY id DESC LIMIT 1", 
                array()
            )->fetch(PDO::FETCH_ASSOC);

            $numeroVenda = $ultimoNumeroVenda ? $ultimoNumeroVenda['numero_venda'] + 1 : 1;

             
          

            Retorna o número da venda
            echo json_encode(array('numero_venda' => $numeroVenda));
      
        




        
            
            // Verifica se a propriedade 'vender' existe e se é true
            if (isset($finalizarVenda['vender']) && $finalizarVenda['vender']) {
                $mensagem = 'A venda deve ser finalizada.';
            } else {
                $mensagem = 'A venda não deve ser finalizada.';
            }

            Realiza a inserção do produto
            $id = 0;
            $insertProduto = $this->crud->insertDB(
                "vendas", 
                "?,?,?,?",
                array(  
                    $id,
                    $addProdutos['id_produto'],
                    $numeroVenda,
                    $addProdutos['quantidade_produto']
                ) 
            );

           

             // Percorre todos os produtos adicionados à venda funciona parcialmente
             foreach ($addProdutos as $produto) {
                $id = 0;
                // Realiza a inserção do produto
                $insertProduto = $this->crud->insertDB(
                    "vendas", 
                    "?,?,?,?",
                    array(  
                        $id,
                        $produto['id_produto'],
                        $numeroVenda,
                        $produto['quantidade_produto']
                    ) 
                );
            }

           
            $selectVendasAtual = $this->crud->selectDB(
                "*", 
                "vendas", 
                "where numero_venda = ?", 
                array(
                    $numeroVenda
                )
            );

            $vendas = $selectVendasAtual->fetchAll(PDO::FETCH_ASSOC);
            $numeroVenda = isset($vendas[0]['numero_venda']) ? $vendas[0]['numero_venda'] : null;

            Monta o dataset com os dados das vendas e o número da venda
            $dataset = [
                "dados" => $vendas,
                "numero_venda" => $numeroVenda,
                // "mensagem" => $mensagem // Adiciona a mensagem ao dataset
            ];

            Retorna os dados das vendas no formato JSON
            echo json_encode($dataset);
            */

        } catch (PDOException $erro) {
            echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
        }
    }
}

// Instancia o objeto e chama o método para criar a venda
$crud = new Crud();
$vendas = new AddProduto($crud);
$vendas->createVenda(); 
