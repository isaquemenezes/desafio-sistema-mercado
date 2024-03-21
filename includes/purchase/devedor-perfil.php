<?php 
    namespace Models;

    $crud = new ModelCrud();

	$name = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql_select= $crud->selectDB(
		"*", 
		"devedor", 
		"WHERE nome=? AND ativo=? ORDER BY tipo", 
		array(
			$name,
			1
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


		<div class="cards-col-three">

			
			<div class="card-col">

				<div class="card-icon follow">
					<a href=""><span class="fa fa-users"></span></a>
				</div>
				<div class="card-info">
					<?php 
						echo "<h2> $name </h2>";
					?>
				</div>
			</div>

		</div>

		


            <div class="recent-grid">

				<div class="projects">
					<div class="card">
						<div class="card-header">
							
							<h3><span class="fa fa-users"></span> Perfil Devedor <?php echo $name ?> </h3>

							<a href="<?php echo DIRPAGE.'purchase/add'; ?>"> Add <span class="fa fa-arrow-right"></span></a>
							<a href="<?php echo DIRPAGE.'purchase/pagamento'; ?>"> Add Pag <span class="fa fa-arrow-right"></span></a>
							
						</div>

						<div class="card-body">
							<table width="100%"> 
								<thead>
									<tr>
										<td>Update</td>
										<td>Vencimto</td>										
										<td>N Parcelas</td>
										<td>Parcelas à paga</td>
										<td>valor no Cartao</td>
										<td>valor do Devedor</td>
										<td>Valor Entrada</td>
										<td>Produto</td>
                                        <td>Tipo</td>
										<td>Taxa</td>
										<td>Total Parcela</td>
                                        <td>Opçoes</td>
									</tr>
								</thead>

								<tbody>
                                    <?php 
									$saldo_devedor = 0;
									$valor_total_compra = 0;
									$total_parcela_cartao = 0;
									$total_parcela_devedor = 0;
									$total_parcela_devedor_cartao = 0;
									$total_taxa = 0; 
									$total_devedor = 0;

                                    while($_data = $sql_select->fetch(\PDO::FETCH_ASSOC))
                                    { 
										$valor_total_compra = ($_data['xparcela'] * $_data['valor_parcela_cartao']);
										
										
										//Total de todas as parcelas do devedor										
										$total_parcela_devedor = ($total_parcela_devedor + $_data['valor_parcela_devedor']);
										
										//Total das taxas cobradas
										$total_taxa = ($total_taxa + $_data['taxa']);
										
										//Saldo devedor
										$saldo_devedor = ($total_parcela_devedor + $total_taxa);

										//Tota 1 = valor Devedor + taxa 
										if ($_data['taxa'] != null || $_data['taxa'] != "") {
										
											$saldo_d_parcela = ($_data['valor_parcela_devedor'] + $_data['taxa']);
											
											// Formate o saldo devedor para moeda nacional real
    										$saldo_devedor_parcela = number_format($saldo_d_parcela, 2, ',', '.');

											$total_devedor += $saldo_d_parcela;


										} 

										$id = $_data['id'];
										$deleteLink = DIRPAGE . 'source/controllers/controllerExcluir?id=' . $id;

									?>
									
									<tr>
										
										<td><?php echo $_data['ultima_atualizacao']; ?></td>
										<td><?php echo $_data['vencimento']; ?></td>										
										<td><?php echo $_data['numero_total_parcela']; ?></td>
										<td><?php echo $_data['xparcela']; ?></td>
										<td><?php echo $_data['valor_parcela_cartao']; ?></td>
										<td><?php echo $_data['valor_parcela_devedor']; ?></td>
										<td><?php echo $_data['valor_entrada']; ?></td>
										<td><?php echo $_data['produto']; ?></td>
                                        <td><?php echo $_data['tipo']; ?></td>	
										<td><?php echo $_data['taxa']; ?></td>	
										<td><?php echo 'R$ '.$saldo_devedor_parcela; ?></td>

                                        <td>
											<a href="#" onclick="confirmarExclusao('<?php echo $deleteLink; ?>')">DEL &nbsp;</a>
											<a href="<?php echo DIRPAGE.'purchase/editar?id='.$_data['id']; ?>">Edit</a> 
										</td>

									</tr>

                                    <?php } ?>

								</tbody>

								<tfoot>
									<thead>
										<tr>
											<td><?php echo '*'.$saldo_devedor; ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><?php echo 'R$ '.$total_taxa; ?></td>
											<td><?php echo 'R$ '.$total_devedor; ?></td>
											<td>Total</td>
										</tr>
									</thead>
								</tfoot>
							</table>
						</div>
					</div>					
				</div>
			</div>	

		

        </main>		
    </div>
    
    <label class="close-mobile-menu" for="menu-toggle"></label>

	