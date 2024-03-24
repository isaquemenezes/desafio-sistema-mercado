<template>
  <!-- <img alt="Vue logo" src="./assets/logo.png"> -->
  <!-- <HelloWorld msg="Desafio Sistema Mercado"/> -->

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
      <div class="container-fluid">
       
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            

            <li class="nav-item">
              <router-link class="nav-link" to="/produtos">Produtos</router-link>
              
            </li>

            <!-- <li class="nav-item">
              <router-link class="nav-link" to="/cadastroProduto">Cadastrar Produto</router-link>
            </li> -->

            <li class="nav-item">
             <router-link class="nav-link" to="/pedidos">Pedidos</router-link>
            </li>
            
            <li class="nav-item">
              <router-link class="nav-link" to="/vendas">Vendas</router-link>
            </li>

            <!-- <li class="nav-item">
             <router-link class="nav-link" to="/cadastroVenda">Cadastrar Venda</router-link>
            </li> -->

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>

        </div>
      </div>
    </nav>

  

    <router-view></router-view>



</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'


export default {
  name: 'App',
  components: {
    // HelloWorld,
    
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
