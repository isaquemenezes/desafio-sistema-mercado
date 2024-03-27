<?php
namespace Controllers;

use Services\ProdutoService;
use PDOException;

class ProdutoController
{
    protected ProdutoService $crud;

    public function __construct(ProdutoService $crud)
    {
        $this->crud = $crud;
    }
    
    public function listar(): void
    {
        try {
            $produtos = $this->crud->listarProdutos();
            echo json_encode([
                'dados' =>$produtos
            ] );

        
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao buscar produtos: ' . $e->getMessage()]);
        }
    }

    public function criar(array $dados)
    {
        try {
            $mensagem = $this->crud->criarProduto($dados);
            echo json_encode($mensagem);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar produto: ' . $e->getMessage()]);
        }
    }
}




// namespace Controllers;

// use \Services\ProdutoService;


// use PDOException;



// class ProdutoController extends ProdutoService
// {
//     protected ProdutoService $crud;

//     public function __construct(ProdutoService $crud)
//     {
//         $this->crud = $crud;
//     }
    
//     public function listar()
//     {
//         try {
          
//             $produtos = $this->listarProdutos();
//             echo json_encode($produtos);
//         } catch (PDOException $e) {
//             http_response_code(500);
//             echo json_encode(['error' => 'Erro ao buscar produtos: ' . $e->getMessage()]);
//         }
//     }

//     public function criar(array $dados)
//     {
//         try {
          
//             $mensagem = $this->crud->criarProduto($dados);
//             echo json_encode($mensagem);
//         } catch (PDOException $e) {
//             http_response_code(500);
//             echo json_encode(['error' => 'Erro ao criar produto: ' . $e->getMessage()]);
//         }
//     }
// }
