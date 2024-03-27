<?php
namespace Services;

use Models\Produto;
use Models\Crud;
use PDOException;

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
}

// p/Services/ProdutoService.php

// require_once __DIR__ . "/../models/Produto.php";
// require_once __DIR__ . "/../models/Crud.php";

// use App\Models\Produto;

// class ProdutoService
// {
//     protected Crud $crud;

//     public function __construct(Crud $crud)
//     {
//         $this->crud = $crud;
//     }
    
//     public function listarProdutos()
//     {
//         $produto = new Produto($this->crud);
//         return $produto->listar();
//     }

//     public function criarProduto(array $dados)
//     {
//         $produto = new Produto($this->crud);
//         return $produto->criar($dados);
//     }
// }

// use Models\Produto;
// use Models\Crud;
// use PDOException;

// class ProdutoService extends Crud
// {

//     protected Crud $crud;

//         public function __construct(Crud $crud)
//         {
//             $this->crud = $crud;
//         }

//     public function listarProdutos()
//     {
//         $produto = new Produto();
//         return $produto->listar();
//     }

//     public function criarProduto(array $dados)
//     {
//         $produto = new Produto();
//         return $produto->criar($dados);
//     }
// }

