
            <div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>Devedores Cartão </h3>

							<a href="<?php echo DIRPAGE.'purchase/add'; ?>"> Add <span class="fa fa-arrow-right"></span></a>
							<a href="<?php echo DIRPAGE.'gerar-excel'; ?>"> Gerar Excel <span class="fa fa-arrow-right"></span></a>	
						</div>

						<div class="card-body">
							<table width="100%"> 
								<thead>
									<tr>
										<td>Nome</td>
										<td>Parcela Cartão</td>
                                        <td>Tipo</td>
										<td>Taxa</td>
                                       
									</tr>
								</thead>

								<tbody>
                                    <?php
									$total_taxa = 0; 
									$total_parcela = 0;
									$total_devedor = 0;

                                    while($_data = $sql_select->fetch(\PDO::FETCH_ASSOC))
                                    {
										$total_taxa = ($total_taxa + $_data['taxa']);
										$total_parcela = ($total_parcela + $_data['valor_parcela_cartao']);
										
									?>
									
									<tr>
										
										<td><a href="<?php echo DIRPAGE.'purchase/perfil-devedor?nome='.$_data['nome']; ?>"> 
											<?php echo $_data['nome']; ?></a>
										</td>
										<td><?php echo $_data['valor_parcela_cartao']; ?></td>
                                        <td><?php echo $_data['tipo']; ?></td>	
										<td><?php echo $_data['taxa']; ?></td>
																		
                                       

									</tr>

                                    <?php } ?>

								</tbody>

								<tfoot>
									<thead>
										<tr>
											<td><?php $count=$sql_select->rowCount(); echo $count; ?></td>
											<td><?php echo $total_parcela; ?> </td>
											<td></td>
											<td><?php echo $total_taxa; ?></td>
											<td>Total</td>
										</tr>
									</thead>
								</tfoot>
								
							</table>
						</div>
					</div>
					
				</div>

                <!--Sart customers Cartao -->
				<?php include 'includes/card/card.php'; ?>
                <!--/END customers  Cartao -->

			

			</div>
			