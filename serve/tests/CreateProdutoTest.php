<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ .'/../controllers/produto/CreateProduto.php';

class CreateProdutoTest extends TestCase {
    public function testCreateProdutoSuccess() {
        
        $crudMock = $this->createMock(Crud::class);
        $crudMock->method('insertDB')->willReturn(true);

        $createProduto = new CreateProduto($crudMock);
        $result = $createProduto->createProduto([
            'preco' => 10,
            'descricao' => 'Produto de teste',
            'tipo' => 'A',
            'percentual_imposto' => 7
        ]);

        $this->assertEquals(['success' => 'Produto cadastrado com sucesso.'], $result);
    }

    public function testCreateProdutoError() {
        
        $crudMock = $this->createMock(Crud::class);
        $crudMock->method('insertDB')->willReturn(false);

        $createProduto = new CreateProduto($crudMock);
        $result = $createProduto->createProduto([
            'preco' => 10,
            'descricao' => 'Produto de teste',
            'tipo' => 'A',
            'percentual_imposto' => 7
        ]);

        $this->assertEquals([
            'error' => 'Erro ao cadastrar o produto.'
        ], $result);
    }
}

