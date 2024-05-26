import React from 'react';

import CadastroProduto from '../../Produto/CadastroProduto';

import  Navbar from '../../components/navigation/Navbar';
// import './App.css';

function CadastrarProduto() {
    return (
        <div className="App">
            <header className="App-header">
                {/* <h1>Cadastrar Produto</h1> */}
                <Navbar />
                <CadastroProduto />
                
            </header>
        </div>
    );
}


export default CadastrarProduto;