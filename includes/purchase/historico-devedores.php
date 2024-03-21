<?php 
    namespace Models;

    $crud = new ModelCrud();

    $sql_select= $crud->selectDB(
		"*", 
		"devedor", 
		"WHERE ativo=? ORDER BY nome", 
		array(
			0
		)
	);

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

            <div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>Histórico Devedores Cartão </h3>

							<a href="<?php echo DIRPAGE.'purchase/add'; ?>"> Add <span class="fa fa-arrow-right"></span></a>
							
						</div>

						<div class="card-body">
							<table width="100%"> 
								<thead>
									<tr>
										<td>Nome</td>
										<td>Total Parcelas </td>
										<td>Parcela Cartão</td>
										<td>Valor do Devedor</td>
										<td>Produto</td>
                                        <td>Tipo</td>
										<td>Taxa</td>
                                        <td>Opçoes</td>
									</tr>
								</thead>

								<tbody>
                                    <?php 
                                    while($_data = $sql_select->fetch(\PDO::FETCH_ASSOC))
                                    { 
										$__total_compra = ($_data['xparcela'] * $_data['valor_parcela_cartao']);
									?>
									
									<tr>
										
										<td><?php echo $_data['ativo'].'-'.$_data['nome']; ?></td>
										<td><?php echo $_data['numero_total_parcela']; ?></td>
										<td><?php echo $_data['valor_parcela_cartao']; ?></td>
										<td><?php echo $_data['valor_parcela_devedor']; ?></td>
										<td><?php echo $_data['produto']; ?></td>
                                        <td><?php echo $_data['tipo']; ?></td>	
										<td><?php echo $_data['taxa']; ?></td>									
                                        <td><a href="<?php echo DIRPAGE.'purchase/perfil-devedor?nome='.$_data['nome']; ?>">More +</a> </td>

									</tr>

                                    <?php } ?>

								</tbody>
							</table>
						</div>
					</div>					
				</div>       
			</div>			
            </main>		
        </div>
    
        <label class="close-mobile-menu" for="menu-toggle"></label>