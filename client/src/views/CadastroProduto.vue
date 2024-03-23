<template>
    <div>
      <h1>Cprod</h1>
      <CadastroProduto />
    
    </div>
  </template>
  
  <script>
  
    import CadastroProduto from '../components/produto/CadastroProduto'
  
    export default {
        name: 'Produtos',
        components: {
           
            CadastroProduto,
           
            
        }
    }
  </script>
  
  <style>
  
  </style>
  