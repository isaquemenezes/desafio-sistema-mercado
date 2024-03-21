<?php 

    $sql_select= $crud->selectDB("*", "personal_finance", "", array());

?>
            <div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>Minhas Finanças</h3>

							<a href="<?php echo DIRPAGE.'financa-pessoal/add'; ?>"> Add <span class="fa fa-arrow-right"></span></a>
						</div>

						<div class="card-body">
							<table width="100%"> 
								<thead>
									<tr>
										<td>Produto</td>
										<td>X Parcela</td>                                        
										<td>valor_parcela</td>
										<td>Cartão</td>
                                        <td>Total</td>
                                        <td>Opçoes</td>
									</tr>
								</thead>

								<tbody>
                                    <?php 
									
									$total_parcela = 0;
									$total_montante = 0;
                                    while($_data = $sql_select->fetch(\PDO::FETCH_ASSOC))
                                    { 	
										
										
										
                                        $total = ($_data['numero_parcela'] * $_data['valor_parcela']);

										$total_parcela = ($total_parcela + $_data['valor_parcela']);

										$total_montante = $total_montante + $total;
										

										
                                        ?>
									
									<tr>
										
										<td><?php echo $_data['produto']; ?></td>
										<td><?php echo $_data['numero_parcela']; ?></td>
                                        <td><?php echo $_data['valor_parcela']; ?></td>
                                        <td><?php echo $_data['cartao']; ?></td>	
                                        <td><?php echo $total; ?></td>
										
											
																		
                                        <td><a href="<?php echo DIRPAGE.'source/controllers/controllerExcluir?id_personal_fin='.$_data['id']; ?>">Del </a> &nbsp; 
										<a href="<?php echo DIRPAGE.'financa-pessoal/editar?id='.$_data['id']; ?>"> EDIT</a> </td>

									</tr>

                                    <?php } 		?>

								</tbody>
								<tfoot>
									
									<thead>
										<tr>
											<td>Total2 </td>
																			
											<td> </td>
											<td><?php echo $total_parcela; ?> </td>
											<td></td>
											<td><?php echo $total_montante; ?></td>

										</tr>
									</thead>
									
								</tfoot>
							</table>
						</div>
					</div>
					
				</div>

                <!--Sart customers Cartao -->
				<?php //include 'includes/card/card.php'; ?>
                <!--/END customers  Cartao -->

			

			</div>
			