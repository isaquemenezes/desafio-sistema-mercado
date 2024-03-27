<?php

require_once(__DIR__ . "/../models/Crud.php");
require_once __DIR__ .'/../classes/produto/Produtos.php';

use PHPUnit\Framework\TestCase;
class ProdutoTest extends TestCase {
    public function testListarProdutos() {

        $crud = new Crud();

        $produtos = new Produtos($crud);

        $result = $produtos->listarProdutos();

        $this->assertJson($result);
    }
}