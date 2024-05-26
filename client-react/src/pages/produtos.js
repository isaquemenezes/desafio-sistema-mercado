import React from 'react';
import Produtos from './Produto/Produtos';
import CadastroProduto from './Produto/CadastroProduto';
import Vendas from './Venda/Vendas';
import './App.css';

function ProdutoViews() {
    return (
        <div className="App">
            <header className="App-header">
                <h1>Minha Aplicação---</h1>
                <Produtos />
                <CadastroProduto />
                <Vendas />
            </header>
        </div>
    );
}


export default ProdutoViews;