import React from 'react';
import Produtos from '../../Produto/Produtos';
// import CadastroProduto from './Produto/CadastroProduto';
// import Vendas from './Venda/Vendas';
import  Navbar from '../../components/navigation/Navbar';
// import './App.css';

function ProdutoIndex() {
    return (
        <div className="App">
            <header className="App-header">
                <h1>Meus Produtos---</h1>
                <Navbar />
                <Produtos />
                {/* <CadastroProduto />
                <Vendas />  */}
            </header>
        </div>
    );
}


export default ProdutoIndex;