import React from 'react';
import Produtos from './Produto/Produtos';
import './App.css';

function App() {
    return (
        <div className="App">
            <header className="App-header">
                <h1>Minha Aplicação</h1>
                <Produtos />
            </header>
        </div>
    );
}


export default App;
