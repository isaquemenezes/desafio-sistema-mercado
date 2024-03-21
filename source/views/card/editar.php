<?php 
    namespace Models;
    \Classes\ClassSessionUser::setHeadRestrito("user");

    $crud = new ModelCrud();
        /*--======== DB account - EDITAR - PROFILE ========*/                                                                                                                                 
        
        $id_card=$_GET['id'];

        $res=$crud->selectDB("*", "card", "WHERE id=?", array($id_card));
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
                        <h3>Editar Cartão</h3>
                        
                        <style>
                            .retornoCard {
                                color: yellowgreen;
                            }
                        </style>

                        <p class="retornoCard"></p>

                    </div>

                    <div class="card-body">

                        <form action="<?php echo DIRPAGE.'source/controllers/card/controllerEdit'; ?>" method="post" >
                            
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"  />
                            <div class="form-field">
                                <input type="text" name="nome"  value="<?php echo $data['nome_cartao'];?>"  />
                            </div><br>

                            <div class="form-field">
                                 <input type="text" name="limite"  value="<?php echo $data['limite'];?>" />
                            </div><br>

                            <div class="form-field">
                                <input type="text" name="vencimento"  value="<?php echo $data['vencimento'];?>"/>
                            </div><br>

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