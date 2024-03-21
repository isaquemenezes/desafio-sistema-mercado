<?php 
    namespace Models;
    \Classes\ClassSessionUser::setHeadRestrito("user");

    $crud = new ModelCrud();                                                                                                                           
        
        $id_personal_finance=$_GET['id'];

        $res=$crud->selectDB("*", "personal_finance", "WHERE id=?", array($id_personal_finance));
        $data=$res->fetch(\PDO::FETCH_ASSOC);
                      
?>

<?php include 'includes/head.php'; ?>

<!-- Sidebar --->
<?php include 'includes/sidebar.php'; ?>

<!-- Header --->
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
                        <h3>Editar Dívida</h3>
                        
                        <style>
                            .retornoCard {
                                color: yellowgreen;
                            }
                        </style>

                        <p class="retornoCard"></p>

                    </div>

                    <div class="card-body">

                        <form action="<?php echo DIRPAGE.'source/controllers/personal-finance/controllerEdit'; ?>" method="post" >
                            
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"  />
                            <div class="form-field">
                                <input type="number" name="numero_parcela"  value="<?php echo $data['numero_parcela']; ?>"/></div><br>

                            <div class="form-field">
                                <input type="text" name="valor_parcela" value="<?php echo $data['valor_parcela']; ?>" /></div><br>
                    
                            <select name="cartao" id="cartao">
                                <option value="<?php echo $data['cartao']; ?>"><?php echo $data['cartao']; ?></option>
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
                                <input type="text" name="produto" value="<?php echo $data['produto']; ?>" /> </div><br>
                            
                            <div class="form-field">
                                <input type="date" name="data_compra" value="<?php echo $data['data_compra']; ?>" /> </div><br>
                          
                            <div class="form-field">
                                <input type="submit" value="Enviar">
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--</END DIV TEST> -->

    </main>

</div>

<label class="close-mobile-menu" for="menu-toggle"></label>

<!--footer--->
<?php include 'includes/footer.php'; ?>