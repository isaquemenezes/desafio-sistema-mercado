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

            // $ultimoNumeroVenda = 
            //     $this->crud->selectDB(
            //         "numero_venda", 
            //         "vendas", 
            //         "ORDER BY id DESC LIMIT 1", 
            //         array()
            //     )->fetch(PDO::FETCH_ASSOC);

            // $numeroVenda = $ultimoNumeroVenda ? $ultimoNumeroVenda['numero_venda'] + 1 : 1;

            $addProdutos = json_decode(file_get_contents('php://input'), true);
            // $finalizarVenda = json_decode(file_get_contents('php://input'), true);



             // Verifica se os dados recebidos são um array
        if (is_array($addProdutos)) {
            $ultimoNumeroVenda = $this->crud->selectDB(
                "numero_venda", 
                "vendas", 
                "ORDER BY id DESC LIMIT 1", 
                array()
            )->fetch(PDO::FETCH_ASSOC);

            $numeroVenda = $ultimoNumeroVenda ? $ultimoNumeroVenda['numero_venda'] + 1 : 1;

            // Insere cada produto na venda
            foreach ($addProdutos as $produto) {
                $id = 0;
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

                // Verifica se a inserção foi bem-sucedida
                if (!$insertProduto) {
                    throw new Exception("Erro ao inserir produto na venda.");
                }
            }

            // Retorna o número da venda
            echo json_encode(array('numero_venda' => $numeroVenda));
        } else {
            throw new Exception("Os dados recebidos não são um array.");
        }




        
            
            // // Verifica se a propriedade 'vender' existe e se é true
            // if (isset($finalizarVenda['vender']) && $finalizarVenda['vender']) {
            //     $mensagem = 'A venda deve ser finalizada.';
            // } else {
            //     $mensagem = 'A venda não deve ser finalizada.';
            // }

            // Realiza a inserção do produto
            // $id = 0;
            // $insertProduto = $this->crud->insertDB(
            //     "vendas", 
            //     "?,?,?,?",
            //     array(  
            //         $id,
            //         $addProdutos['id_produto'],
            //         $numeroVenda,
            //         $addProdutos['quantidade_produto']
            //     ) 
            // );

           

            //  // Percorre todos os produtos adicionados à venda funciona parcialmente
            //  foreach ($addProdutos as $produto) {
            //     $id = 0;
            //     // Realiza a inserção do produto
            //     $insertProduto = $this->crud->insertDB(
            //         "vendas", 
            //         "?,?,?,?",
            //         array(  
            //             $id,
            //             $produto['id_produto'],
            //             $numeroVenda,
            //             $produto['quantidade_produto']
            //         ) 
            //     );
            // }

           
            // $selectVendasAtual = $this->crud->selectDB(
            //     "*", 
            //     "vendas", 
            //     "where numero_venda = ?", 
            //     array(
            //         $numeroVenda
            //     )
            // );

            // $vendas = $selectVendasAtual->fetchAll(PDO::FETCH_ASSOC);
            // $numeroVenda = isset($vendas[0]['numero_venda']) ? $vendas[0]['numero_venda'] : null;

            // Monta o dataset com os dados das vendas e o número da venda
            // $dataset = [
            //     "dados" => $vendas,
            //     "numero_venda" => $numeroVenda,
            //     // "mensagem" => $mensagem // Adiciona a mensagem ao dataset
            // ];

            // Retorna os dados das vendas no formato JSON
            // echo json_encode($dataset);
        } catch (PDOException $erro) {
            echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
        }
    }
}

// Instancia o objeto e chama o método para criar a venda
$crud = new Crud();
$vendas = new AddProduto($crud);
$vendas->createVenda(); 