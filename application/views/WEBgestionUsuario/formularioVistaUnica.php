<?php $cargo = $this->session->userdata('CargoAsignado'); ?>

<?php if (($cargo == "superadmin")): ?>

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
						<!-- TABLE -->
						
						<table id="example" class="align-self-center table  table-bordered " cellspacing="0" style="width:100%">

							<thead class="bg bg-primary text-white">
								<tr>
									<th></th>
									<th>Rut
										
									</th>
									<th>Nombres
										
									</th>
									<th>Correo
										
									</th>

									<th>Rol
										
									</th>

									<th>contraseña
										
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($conteidos as $value): ?>
									<?php $rutaPerfilPersona = base_url("index.php/controllerEmpleados/DeletePersona/{$value->RUT}"); ?>
									
									<tr>				



										<style type="text/css" media="screen">
											.qt{
												color:red;
											}
											.qt:hover>a{
												color:white;
											}
											.qc{
												color:green;
											}
											.qc:hover>a{
												color:white;
											}
										</style>

										<form action="<?php echo base_url() ?>index.php/controllerEmpleados/UpdatePersonaD" method="post">


											<td>
												<?php echo "<button type='button' cl		ass='qt btn btn-outline-danger' ><a href='{$rutaPerfilPersona}' class=' qt ' onclick='return confirm(\"¿  desea borra esta persona  ?  \")'> Borrar   </a> </button>"; ?>	
												<input type="submit" class='qc btn btn-outline-success float-left' name="btnActualizarDAtos" value="Actualizar">
											</td>


											<td><input type="text" readonly class="text-lg-center" name="txtF1" value="<?= $value->RUT ?>"></td>
											<td><input type="text" class="text-lg-center" name="txtF2" value="<?= $value->NOMBRES ?>">		</td>
											<td><input type="text"  class="text-lg-center" name="txtF5" value="<?= $value->CORREOELECTRONICO ?>"></td>

											<td>

												<select class="form-control" id="exampleFormControlSelect1" name="txtF4">
													<?php if ($value->NOMBREROL  == "superadmin"): ?>
														<option value="superadmin" selected="">superadmin</option>
														<option value="admin">admin</option>
														<option value="basico">basico</option>
													<?php endif ?>
													<?php if ($value->NOMBREROL  == "admin"): ?>
														<option value="superadmin">superadmin</option>
														<option value="admin" selected>admin</option>
														<option value="basico">basico</option>
													<?php endif ?>
													<?php if ($value->NOMBREROL  == "basico"): ?>
														<option value="superadmin">superadmin</option>
														<option value="admin">admin</option>
														<option value="basico">basico</option>
													<?php endif ?>
												</select>


											</td>
											<td>

												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<div class="input-group-text"><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></div>
													</div>
													<input id="password-field" type="password" class="form-control" name="txtF3" value="<?= $value->PASSWORD ?>" 	>
												</div>

											</td>
											


											
											
										</td>
									</tr>	
								<?php endforeach ?>
							</tbody>
							<!-- UpdatePersonaPer -->
						</table>

					</form>
					<!-- TABLE -->
				</div>

			</div>		

			<div class="col-12">	


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





<script type="text/javascript">

	$(".toggle-password").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});
</script>