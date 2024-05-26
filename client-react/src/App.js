// src/App.js

import React from 'react';
import { BrowserRouter as Router, Route, Routes, Link } from 'react-router-dom';
// import Produtos from './Produtos';
import CadastroProduto from './Produto/CadastroProduto';
import Home from './pages/Home';
import Navegacao from './Navegacao'; // Importa o componente de navegação
import './App.css';

function App() {
    return (
        <Router>
        <div className="App">
            <Routes>
                <Route path="/" element={<Home />} />
              
                <Route path="/produtos" element={<CadastroProduto />} />
                {/* Adicione outras rotas conforme necessário */}
            </Routes>
        </div>
    </Router>
    );
}

export default App;
