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
                        <h3>Adicionar Um Novo Cartão</h3>
                        
                        <style>
                            .retornoCard {
                                color: yellowgreen;
                            }
                        </style>

                        <p class="retornoCard"></p>

                    </div>

                    <div class="card-body">



                        <form action="" method="POST" id="formCard" name="formCard">

                            <div class="form-field"><input type="text" name="nome" id="nome" placeholder="Nome" /></div>
                            <div class="form-field"> <input type="text" name="limite" id="limite" placeholder="Limite" /></div>
                            <div class="form-field"><input type="text" name="vencimento" id="vencimento" placeholder="Vencimento" /> </div>
                            <div class="form-field"><input type="submit" value="Cadastrar"></div>

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
