<?php
namespace Controllers;

use Services\VendaService;
use PDOException;

class VendaController
{
    protected VendaService $service;

    public function __construct(VendaService $service)
    {
        $this->service = $service;
    }
    
    public function listar()
    {
        try {
            $vendasAPI = $this->service->listarvendas();

            return $vendasAPI;
        
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao buscar produtos: ' . $e->getMessage()]);
        }
    }

    public function criar(array $dados)
    {
        try {
            $mensagem = $this->service->criarVenda($dados);
            return $mensagem;
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar produto: ' . $e->getMessage()]);
        }
    }
}