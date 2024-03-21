<?php 
    namespace Models;
    $crud = new ModelCrud();
    $sql_select= $crud->selectDB("*", "card", "", array());
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
			

			<!-- <div START TEST -->
				<div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>Gestao de Cartões</h3>

							<a href="add">Adicionar <sapn class="fa fa-arrow-right"></sapn></a>
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
                                        <td><a href="del">  Del</a> &nbsp; <a href="change">Change</a> </td>

									</tr>

                                    <?php }?>

								</tbody>
							</table>
						</div>
					</div>					
				</div>	
			</div>				
			<!--</END DIV TEST> -->
		</main>		
	</div>
	<label class="close-mobile-menu" for="menu-toggle"></label>