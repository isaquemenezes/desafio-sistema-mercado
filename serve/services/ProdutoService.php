<?php
namespace Services;

use Models\Produto;
use Models\Crud;

class ProdutoService
{
    protected Crud $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }

    public function listarProdutos()
    {
        $produto = new Produto();
        return $produto->listar();
    }

    public function criarProduto(array $dados)
    {
        $produto = new Produto();
        return $produto->criar($dados);
    }

    public function excluirProduto($produto_id)
    {
        $produto = new Produto();
        return $produto->deletar($produto_id);
    }
}