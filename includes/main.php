<?php 
    namespace Models;

    $crud = new ModelCrud();

    $sql_select= $crud->selectDB(
		"*", 
		"devedor", 
		"WHERE ativo=? ORDER BY tipo", 
		array(
			1
		)
	);

	//Soma dos valores da parcela devedor
	$query= $crud->selectDB("MAX(valor_parcela_devedor) AS max_parceladevedor ", "devedor", "", array());
	$summary = $query->fetch(\PDO::FETCH_ASSOC);

	$_count =  $summary['max_parceladevedor'];

?>
	<div class="main-content">
		
		<!-- / HEADER / -->
		<?php include 'includes/header.php'; ?>

		<main>
			
			<!-- <div START Devedores -->
			<?php include 'includes/purchase/card-devedores.php'; ?>

			<!-- <div START Finanças Pessoais -->
			<?php include 'includes/personalfinances/personal-finances.php'; ?>
			
			<!--<div class="cards-col-three">

				<div class="card-col">

					<div class="card-icon follow">
					<a href=""><span class="fa fa-users"></span></a>
					</div>
					<div class="card-info">
						<h2></h2>
						<small>Maior Parcela</small>
					</div>

				</div>

				<div class="card-col">
				
					<div class="card-icon likes">
						<a href=""><span class="fa fa-heart"></span></a>
					</div>
					<div class="card-info">
						<h2>9,876</h2>
						<small>Total de Devedores</small>
					</div>
					
				
				</div>

				<div class="card-col">

					<div class="card-icon comment">
					<a href=""><span class="fa fa-comment"></span></a>
					</div>
					<div class="card-info">
						<h2>212,876</h2>
						<small>Maior Devedor</small>
					</div>
					
				
				</div>

				<div class="card-col">

					<div class="card-icon comment">
					<a href=""><span class="fa fa-comment"></span></a>
					</div>
					<div class="card-info">
						<h2>212,876</h2>
						<small>Maior Devedor</small>
					</div>
					
				
				</div>

			</div>-->			
		</main>
		
	</div>

	<label class="close-mobile-menu" for="menu-toggle"></label>