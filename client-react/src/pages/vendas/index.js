import React from 'react';
import Vendas from '../../Venda/Vendas';
// import CadastroProduto from './Produto/CadastroProduto';
// import Vendas from './Venda/Vendas';
import  Navbar from '../../components/navigation/Navbar';
// import './App.css';

function VendasIndex() {
    return (
        <div className="App">
            <header className="App-header">
                <h1>Minha Vendas---</h1>
                <Navbar />
                <Vendas />
                {/* <CadastroProduto />
                <Vendas />  */}
            </header>
        </div>
    );
}


export default VendasIndex;