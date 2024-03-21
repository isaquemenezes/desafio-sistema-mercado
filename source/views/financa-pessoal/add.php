<?php Classes\ClassSessionUser::setHeadRestrito("user"); ?>
<?php include 'includes/head.php'; ?>

<!-- Sidebar --->
<?php include 'includes/sidebar.php'; ?>

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

                        <h3>Adicionar Nova Dívida</h3>
                        <style> .retornoCard { color: yellowgreen; } </style>
                        <p class="retornoCard"></p>
                    </div>

                    <div class="card-body">

                        <form action="<?php echo DIRPAGE.'source/controllers/personal-finance/controllerRegister'; ?>" method="post" id="formPersonalFinance" name="formPersonalFinance">

                            <div class="form-field">
                                <input type="number" name="numero_parcela"  placeholder="numero parcela"/></div><br>

                            <div class="form-field">
                                <input type="text" name="valor_parcela"  placeholder="valor parcelas" /></div><br>
                    
                            <select name="cartao" id="cartao">
                                <option value="">Escolha o tipo</option>
                                <option value="saraiva">Saraiva</option>
                                <option value="meu">Meu</option>
                                <option value="pan">Pan</option>
                                <option value="picpay">Picpay</option>
                                <option value="nubank">Nubank</option>
                                <option value="mercado pago">Mercado Pago</option>
                                <option value="credicard">Credicard on</option>
                                <option value="financiamento">Financiamento</option>
                                <option value="emprestimo">Emprestimo</option>
                            
                            </select><br><br>

                    
                            <div class="form-field">
                                <input type="text" name="produto" placeholder="produto" /> </div><br>
                            
                            <div class="form-field">
                                <input type="date" name="data_compra" placeholder="data compra" /> </div><br>
                          
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
