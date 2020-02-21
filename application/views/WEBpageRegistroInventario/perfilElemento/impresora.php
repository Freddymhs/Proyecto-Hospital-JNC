

<?php $cargo = $this->session->userdata('CargoAsignado'); ?>

<?php if (($cargo == "superadmin") || ($cargo == "admin")): ?>

<?php else: ?>
	<?php redirect(base_url()); ?>
<?php endif ?>

<!doctype html>
<html lang="en">
<head>
	<!-- css de bootstrap  -->
	<?php 	$this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoHead.php') ;?>

	<title>hjnc</title>
</head>
<body >


	<!-- =========================================================================================================================== -->
	<header>
		<!-- nav -->
		<?php 	$this->load->view('WEBcontenidoBasico/barraNavegacion.php') ;?>
		<!-- end nav -->

	</header>
	<!-- =========================================================================================================================== -->
	<!-- onmouseover="ProtectInputs()" -->
	<!-- main -->


	<main class="container-fluid "  >	 <!-- enableDates , permite usar las fechas cuando seriales existen -->
		<div class="row ">
			<div class="col-1  " ></div>
			<div class="col-10  " >
				<!-- x -->

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<p class=" text-center">Datos de este Elemento</p>
								
								<table border="1" class="table table-bordered table-striped text-center">
									<thead>
										<tr>
											<td class="bg bg-success border-success text-white">Serial</td>
											<td class="border border-success">Modelo</td>
											<td class="border border-success">Disponibilidad</td>
											<td class="border border-success">Fin del arriendo</td>
										</tr>
									</thead>
									
									<tbody>
										<?php foreach ($impresora as $value): ?>
											<tr>
												<td><b><?= $value->SERIALIMPRESORA ?></b></td>
												<td><b><?= $value->MODELOIMP ?></b></td>	
												<?php if ($value->DISPONIBILIDAD == '1'): ?>
													<td><b>Disponible</b></td>
													<?php else: ?>
														<td><b>No Disponible</b></td>
													<?php endif ?>	


													<!-- x -->
													<?php if ($value->FINARRIENDOIMP != "0000-00-00" && $value->FINARRIENDOIMP  != ""): ?>
														<td> <b><?= $value->FINARRIENDOIMP  ?> </b></td>
														<?php else: ?>
															<td><b>N/A</b></td>	
														<?php endif ?>
														<!-- x-->											
													</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">

									</div>
								</div>
							</div>
						</div>




						<!-- x -->			
					</div>
					<div class="col-1  "></div>
				</div>
			</main>
			<!-- footer -->
			<?php $this->load->view('WEBcontenidoBasico/footer.php'); ?>
			<!-- end footer -->
			<!-- ==================================================================================================================== -->
			<!-- jquery , boostrap y js -->
			<?php $this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoBot'); ?>
			<!-- extra de esta web , bloquea campos --> 


			<!--  -->
		</body>
		</html>
