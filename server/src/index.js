const express = require('express');
const app = express();
const port = 5666;

// Middleware para permitir CORS (Cross-Origin Resource Sharing)
app.use((req, res, next) => {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});

// Rota principal para o fornecedor API
app.get('/', (req, res) => {
  // res.json({
  //   message: 'Acessou fornecedor API Node.js'
  // });
  res.send('API funcionando!');
});

// Iniciar o servidor
app.listen(port, () => {
  console.log(`Servidor rodando em http://localhost:${port}`);
});