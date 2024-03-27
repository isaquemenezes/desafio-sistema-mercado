<?php
namespace Services;

use Models\Venda;
use Models\Crud;

class VendaService
{
    protected Crud $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }

    public function listarvendas()
    {
        $venda = new Venda();
        return $venda->listar();
    }

    public function criarVenda(array $dados)
    {
        $venda = new Venda();
        return $venda->criar($dados);
    }
}