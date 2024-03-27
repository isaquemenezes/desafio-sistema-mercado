<?php
namespace Tests\Controllers;

use Controllers\VendaController;
use PHPUnit\Framework\TestCase;
use Services\VendaService;

class VendaControllerTest extends TestCase
{
    public function testListar()
    {
       
        $vendaServiceMock = $this->createMock(VendaService::class);
        $vendaServiceMock->expects($this->once())
                         ->method('listarVendas')
                         ->willReturn(['venda1', 'venda2']); 
        
       
        $vendaController = new VendaController($vendaServiceMock);
      
        $result = $vendaController->listar();

        $this->assertEquals(['venda1', 'venda2'], $result);
    }

    public function testCriar()
    {
        $vendaServiceMock = $this->createMock(VendaService::class);
        $vendaServiceMock->expects($this->once())
                         ->method('criarVenda')
                         ->with(['cliente' => 'Cliente Teste'])
                         ->willReturn('Venda criada com sucesso'); 
        
        $vendaController = new VendaController($vendaServiceMock);
        
        $result = $vendaController->criar(['cliente' => 'Cliente Teste']);

        // Verificar se a mensagem 
        $this->assertEquals('Venda criada com sucesso', $result);
    }
}
