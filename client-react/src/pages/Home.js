import React from 'react';
import { Link } from 'react-router-dom';
import  Navbar from '../components/navigation/Navbar';
import '../App.css';

const Home = () =>{
  return (
    <div>

      <Navbar />
      <h1>Página Inicial</h1>

      <div class="home mt-5">
    <h1>Bem-Vindo ao Nosso Aplicativo</h1>

    <div class="feature-section">
      <h2>O Sistema:</h2>
      <ul>
        <li><router-link to="/produtos" class="btn btn-primary">Área de Produtos</router-link> </li>
        <li><router-link to="/vendas" class="btn btn-secondary">Área de Vendas</router-link></li>
      </ul>
    </div>

    <div class="developer-section">
      <h2>O Desenvolvedor:</h2>
      <p>
        🎓 <a href="https://www.linkedin.com/in/isaquemenezes/" target="_blank"> Isaque Menezes </a>
        é um desenvolvedor back-end em ascensão formado em Sistemas de Informação pela Universidade Federal do Pará
        (UFPA) e,
        cursando Mestrado na mesma em Computação Aplicada.
      </p>
    </div>

    <div class="technology-section">
      <h2>As Tecnologias Utilizadas:</h2>
      <ul>
        <li>🔧 PHP 8.2.4</li>
        <li>🔧 Node.js v14.21.3</li>
        <li>🔧 Bootstrap 5.3.3</li>
        <li>🔧 Vue.js 3.2.13</li>
        <li>🔧 PHPUnit 11.0</li>
        <li>🔧 DBeaver</li>
        <li>🔧 MySQL</li>
        <li>🔧 Composer version 2.6.3</li>
        <li>🔧 Visual Studio Code</li>
        <li>🔧 Git</li>
        <li>🔧 Postman</li>
        <li>🔧 Xampp</li>
        <li>🔧 Servidor nativo do PHP (php -S localhost:8000)</li>
        <li>🔧 Windows 10</li>
      </ul>
    </div>

  </div>




     


    </div>
  );
}

export default Home;