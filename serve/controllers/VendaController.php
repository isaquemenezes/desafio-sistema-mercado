<?php
namespace Controllers;

use Services\VendaService;
use PDOException;

class VendaController
{
    protected VendaService $crud;

    public function __construct(VendaService $crud)
    {
        $this->crud = $crud;
    }
    
    public function listar()
    {
        try {
            $vendasAPI = $this->crud->listarvendas();

            return $vendasAPI;
        
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao buscar produtos: ' . $e->getMessage()]);
        }
    }

    public function criar(array $dados)
    {
        try {
            $mensagem = $this->crud->criarVenda($dados);
            return $mensagem;
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar produto: ' . $e->getMessage()]);
        }
    }
}