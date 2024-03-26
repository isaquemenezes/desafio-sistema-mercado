<template>
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
</template>

<script>
export default {
  name: 'Home',
};
</script>

<style scoped>
.home {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  text-align: center;
}

.feature-section,
.developer-section,
.technology-section {
  margin-bottom: 30px;
}

.feature-section h2,
.developer-section h2,
.technology-section h2 {
  margin-bottom: 10px;
}

.feature-section ul,
.technology-section ul {
  list-style-type: none;
  padding-left: 0;
  margin-top: 10px;
}

.technology-section ul {
  text-align: left;
}

.buttons {
  margin-top: 20px;
}

.btn {
  margin-top: 10px;
  margin-right: 10px;
}
</style>
