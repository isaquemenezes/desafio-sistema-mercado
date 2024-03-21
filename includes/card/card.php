<?php 
	$sql_select= $crud->selectDB("*", "card", "", array());
?>
<div class="customers">
				    <div class="card">
						<div class="card-header">
							<h3>Gestao de Cartões</h3>

							<a href="<?php echo DIRPAGE.'card/new-card'; ?>">Adicionar <sapn class="fa fa-arrow-right"></sapn></a>
						</div>

						<div class="card-body">
							<table width="100%"> 
								<thead>
									<tr>
										<td>Nome</td>
										<td>Limite</td>
										<td>Vencimento</td>
                                        <td>Ações</td>
									</tr>
								</thead>

								<tbody>

                                    <?php 
                                    while($result = $sql_select->fetch(\PDO::FETCH_ASSOC)) { ?>
									
									<tr>
										
										<td><?php echo  $result['nome_cartao']; ?></td>
										<td><?php echo  $result['limite']; ?></td>
										<td><?php echo  $result['vencimento']; ?></td>
                                        <td><a href="<?php echo DIRPAGE.'card/editar?id=',$result['id']; ?>">Edit</a> </td>

									</tr>

                                    <?php }?>

								</tbody>
							</table>
						</div>
					</div>
				</div>