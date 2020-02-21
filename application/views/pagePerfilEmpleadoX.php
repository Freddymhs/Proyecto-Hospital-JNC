
<!doctype html>
<html lang="en">
<head>
	<!-- css de bootstrap  -->
	<?php 	$this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoHead.php') ;?>
	<title>Inventario Web</title>
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
			<div class="col-1 "></div>
			<div class="col-10"><?php $this->load->view('WEBgestionUsuario/formularioVistaUnica'); ?></div>
			
			<div class="col-1 "></div>
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