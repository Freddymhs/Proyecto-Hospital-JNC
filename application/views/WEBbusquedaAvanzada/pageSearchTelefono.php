

<!doctype html>
<html lang="en">
<head>
	<!-- css de bootstrap  -->
	<?php 	$this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoHead.php') ;?>

	<title>hjnc</title>
</head>
<body>
	<!-- =========================================================================================================================== -->
	<header>
		<!-- nav -->
		<?php 	$this->load->view('WEBcontenidoBasico/barraNavegacion.php') ;?>
		<!-- end nav -->
	</header>
	<!-- =========================================================================================================================== -->

	<!-- main -->
	<main class="container-fluid " >	
		
		<div class="row ">
			
			<div class="col-12">
				<div class="card ">
				
						<?php $this->load->view('WEBhome/busquedaAvanzada/telefono.php'); ?>
				
					
				</div>
				<div class="card " style="height:20vh">
					<?php $this->load->view('WEBhome/seccionExtra'); ?>	
				</div>
			</div>			
			
		</div>

	</main>
	<!-- footer -->
	<?php $this->load->view('WEBcontenidoBasico/footer.php'); ?>
	<!-- end footer -->
	<!-- ==================================================================================================================== -->
	<!-- jquery , boostrap y js -->
	<?php $this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoBot'); ?>
</body>
</html>




