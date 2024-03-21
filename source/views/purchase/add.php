<?php 
    Classes\ClassSessionUser::setHeadRestrito("user"); 

    // head
    include_once 'includes/head.php'; 

    // Sidebar --->
    include_once 'includes/sidebar.php'; 

?>

<div class="main-content">

    <header>

        <label for="menu-toggle" class="menu-toggler">
            <span class="fa fa-bars"></span>
        </label>

        <div class="search">
            <span class="fa fa-search"></span>
            <input type="search" name="" placeholder="Enter keyword">
        </div>

        <div class="head-icons">
            <span class="fa fa-bell"></span>
            <span class="fa fa-bookmark"></span>
            <span class="fa fa-comment"></span>
        </div>

    </header>

    <main>

        <!-- <div START TEST -->
        <div class="recent-grid">
            <div class="projects">
                <div class="card">

                    <div class="card-header">

                        <h3>Adicionar Um Novo Devedor</h3>
                        <style> .retornoCard { color: yellowgreen; } </style>
                        <p class="retornoCard"></p>
                    </div>

                    <div class="card-body">

                        <form action="" method="post" id="formDev" name="formDev">

                            <div class="form-field">
                            <input type="nome" name="nome"  placeholder="Nome" /></div><br>

                            <div class="form-field">
                                <label for="" style="color:#fff;">Total de Parcelas </label><br>
                                <input type="number" name="numero_total_parcela"  /></div><br>
                           
                            <div class="form-field">
                                <input type="number" name="xparcela"  placeholder="Parcelas restantes" /></div><br>
                           
                            <div class="form-field">
                                <input type="text" name="valor_parcela_cartao"  placeholder="Valor Parcela cartao" /></div><br>

                            <div class="form-field">
                                <input type="text" name="valor_parcela_devedor"  placeholder="Valor Parcela devedor" /></div><br>

                            <div class="form-field">
                                <label for="" style="color:#fff;">Entrada</label><br>
                                <input type="text" name="valor_entrada"  value="0" /></div><br>

                            <select name="tipo" id="tipo" onchange="showHideDiv()">
                                <option value="">Escolha o tipo</option>
                                <option value="saraiva">Saraiva</option>
                                <option value="meu">Meu</option>
                                <option value="picpay">Picpay</option>
                                <option value="nubank">Nubank</option>
                                <option value="mercado pago">Mercado Pago</option>
                                <option value="credicard">Credicard on</option>
                                <option value="financiamento">Financiamento</option>
                            
                            </select><br><br>

                            <div class="form-field style-vencimento hidden" id="vencimentoDiv">
                                <label for="" style="color:#fff;">Vencimento</label><br>
                                <input type="number" name="vencimento"   /></div><br>

                            <div class="form-field">
                                <label for="" style="color:#fff;">Taxa</label><br>
                                <input type="text" name="taxa"  value="0" /></div><br>

                            <div class="form-field">
                                <input type="date" name="data_compra" /> </div><br>
                            
                            <div class="form-field visibly">
                                <input type="text" name="produto" placeholder="produto" /> </div><br>
                        

                            <div class="form-field">
                                <input type="submit" value="Cadastrar"></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!--</END DIV TEST> -->

    </main>

</div>

<label class="close-mobile-menu" for="menu-toggle"></label>

<script src="<?php echo DIRJS . 'jquery.min.js'; ?>"></script>
<script src="<?php echo DIRJS . 'main.js'; ?>"></script>
<script src="<?php echo DIRLIB . 'purchase/js/main.js'; ?>"></script>

