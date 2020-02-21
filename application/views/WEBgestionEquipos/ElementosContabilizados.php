<?php $cargo = $this->session->userdata('CargoAsignado'); ?>

<?php if (($cargo == "superadmin") || ($cargo == "admin") || ($cargo == "basico")): ?>

<?php else: ?>
	<?php redirect(base_url()); ?>
<?php endif ?>

<!doctype html>
<html lang="en">

<head>
	<!-- css de bootstrap  -->
	<?php $this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoHead.php'); ?>

	<title>Inventario Web</title>
</head>

<body>
	<!-- =========================================================================================================================== -->
	<header>
		<!-- nav -->

		<?php $this->load->view('WEBcontenidoBasico/barraNavegacion.php'); ?>
		<!-- end nav -->
	</header>
	<!-- =========================================================================================================================== -->

	<!-- main -->
	<main class="container-fluid ">


		<div class="row ">
			<div class="col-12">
				<!-- xx -->

				<div class="row">
					<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
					<div class="col-12">
						<?php $this->load->view('WEBgestionEquipos/submenu/infoEquiposExpres'); ?>
					</div>
					
					<div class="col-12">
						<?php $this->load->view('WEBhome/seccionExtra'); ?>
					</div>


					<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				</div>

				<!-- xx -->
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