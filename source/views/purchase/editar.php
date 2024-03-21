<?php 
    namespace Models;
    \Classes\ClassSessionUser::setHeadRestrito("user"); 

    $crud = new ModelCrud();
        /*--======== DB account - EDITAR - PROFILE ========*/
        
        $id_devedor=$_GET['id'];

        $res=$crud->selectDB(
            "*", 
            "devedor", 
            "WHERE id=?", 
            array(
                $id_devedor
            )
        );
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



                        <form action="<?php echo DIRPAGE.'source/controllers/purchase/controllerEdit'; ?>" method="post" id="formDev" name="formDev">
                            
                            <input type="hidden" name="id" id="id" value="<?php echo $data['id'];?>"  />
                            <div class="form-field">
                                <input 
                                    type="text" 
                                    name="nome" 
                                    id="nome" 
                                    value="<?php echo $data['nome'];?>"  
                                />
                            </div><br>

                            <div class="form-field">
                                <label style="color: green;">Parcelas total:</label> <br>
                                <input 
                                    type="text" 
                                    name="numero_total_parcela" 
                                    id="numero_total_parcela" 
                                    value="<?php echo $data['numero_total_parcela'];?>"  
                                />
                            </div><br>

                          
                            <div class="form-field">
                                <label style="color: green;">Parcelas restantes:</label> <br>
                                <input 
                                    type="number" 
                                    name="xparcela"  
                                    value="<?php echo $data['xparcela'];?>" 
                                    placeholder="parcelas restantes" 
                                /></div><br>

                            <div class="form-field">
                                <input 
                                    type="text" 
                                    name="valor_parcela_cartao" 
                                    value="<?php echo $data['valor_parcela_cartao']; ?> "  
                                    placeholder="Valor Parcela cartao" 
                                /></div><br>

                            <div class="form-field">
                                <input 
                                    type="text" 
                                    name="valor_parcela_devedor" 
                                    value="<?php echo $data['valor_parcela_devedor']; ?> " 
                                    placeholder="Valor Parcela devedor" /></div><br>

                            <div class="form-field">
                                <input 
                                    type="text" 
                                    name="valor_entrada" 
                                    value="<?php echo $data['valor_entrada']; ?> " 
                                    placeholder="Valor entrada" /></div><br>

                            
                            <?php 

                                $tipoSelecionado = strval ($data['tipo']);
                                $tipoSelecionado = trim($tipoSelecionado);
                                                            
                            ?>
                                
                            <select name="tipo" id="tipo">
                                <option value="">Escolha o tipo</option>
                                <option 
                                    value="saraiva" 
                                    <?php echo ($tipoSelecionado === "saraiva") ? 'selected' : ''; ?>
                                >
                                    Saraiva
                                </option>
                              
                                <option 
                                    value="picpay" <?php echo ($tipoSelecionado === "picpay") ? 'selected' : ''; ?>
                                >
                                    Picpay
                                </option>
                                <option 
                                    value="nubank" 
                                    <?php echo ($tipoSelecionado === "nubank") ? 'selected' : ''; ?>
                                >
                                    Nubank
                                </option>
                                <option 
                                    value="mercado pago" 
                                    <?php echo ($tipoSelecionado === "mercado pago") ? 'selected' : ''; ?>
                                >
                                    Mercado Pago
                                </option>
                              
                                <option 
                                    value="financiamento" 
                                    <?php echo ($tipoSelecionado === "financiamento") ? 'selected' : ''; ?>
                                >
                                    Financiamento
                                </option>
                            </select><br><br>



                            <div class="form-field">
                                <input 
                                    type="text" 
                                    name="taxa" 
                                    value="<?php echo $data['taxa']; ?> " 
                                    placeholder="taxa" /></div><br>

                            <div class="form-field">
                                <input 
                                    type="date" 
                                    name="data_compra" 
                                    id="data_compra" value="<?php echo $data['data_compra'];?>"/>
                            </div><br>

                            <div class="form-field">
                                <input 
                                    type="text" 
                                    name="produto" 
                                    id="produto" 
                                    value="<?php echo $data['produto'];?>"/>
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

<script>
    // Valor selecionado em PHP
    var tipoSelecionado = "<?php echo $tipoSelecionado; ?>";

    // Elemento select
    var selectTipo = document.getElementById("tipo");
    console.log(selectTipo);

    // Percorra as opções e selecione a correspondente
    for (var i = 0; i < selectTipo.options.length; i++) {
        if (selectTipo.options[i].value === tipoSelecionado) {
            selectTipo.options[i].selected = true;
            break; // Sai do loop após encontrar a correspondência
        }
    }
</script>

<!--footer--->
<?php include 'includes/footer.php'; ?>