<?php $cargo = $this->session->userdata('CargoAsignado'); ?>

<?php if (($cargo == "superadmin")): ?>

	<?php else: ?>
		<?php redirect(base_url()); ?>
	<?php endif ?>


	<style type="text/css" media="screen">
		
		.error{
			color:red;
		}
	</style>

	<div class="card ">

		<div class="container-fluid">
			<div class="col-12  ">
				<div class="row">
					<div class="col-4">
						<form action="<?php echo base_url() ?>index.php/controllerEmpleados/formularioCreate" method="post">
							<?php echo form_open('form'); ?>
							<div class="form-group">
								<label for="newRpersona">RUT</label>
								<input autocomplete="off" type="text" class="form-control" id="newRpersona"  name="newRpersona" value="<?php echo set_value('newRpersona'); ?>">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('newRpersona', '<div class="error">', '</div>');?>
							</div>
							<div class="form-group">
								<label for="newNpersona">NOMBRES</label>
								<input autocomplete="off" type="text" class="form-control" id="newNpersona" name="newNpersona" value="<?php echo set_value('newRpersona'); ?>">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('newNpersona', '<div class="error">', '</div>');?>
							</div>
							<div class="form-group">
								<label for="newPpersona">PASSWORD</label>
								<input autocomplete="off" type="password" class="form-control" id="newPpersona" name="newPpersona" value="<?php echo set_value('newPpersona'); ?>">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('newPpersona', '<div class="error">', '</div>');?>
							</div>
							<div class="form-group">
								<label for="newCpersona">CORREOELECTRONICO</label>
								<input autocomplete="off" type="text" class="form-control" id="newCpersona" name="newCpersona" value="<?php echo set_value('newCpersona'); ?>">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('newCpersona', '<div class="error">', '</div>');?>
							</div>
							

							<div class="form-group">
								<label for="newRolpersona">NOMBREROL</label>
								<select class="form-control" id="rol" name="newRolpersona" id="newRolpersona">
									<option selected></option>
									<option value="basico" <?php echo set_select('newRolpersona', 'basico'); ?> >basico</option>
									<option value="admin" <?php echo set_select('newRolpersona', 'admin'); ?> >admin</option>
									<option value="superadmin" <?php echo set_select('newRolpersona', 'superadmin'); ?> >superadmin</option>
								</select>
							</div>

							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('newRolpersona', '<div class="error">', '</div>');?>
							</div>

							<button type="submit" class="btn btn-primary" name="regPersona" >Confirmar</button>
						</form>
					</div>

					<div class="col-8">
						<!-- x -->
						<style type="text/css" media="screen">

							th {
								white-space: nowrap;
								font-family: sans-serif;
							}

							#example {
								height: 60vh;
							}
						</style>



						<script type="text/javascript">
							$(document).ready(function() {
								document.title = 'Datos del Inventario';
		$('#example').DataTable({ //INICIALIZANDO  DATATABLE
			"lengthChange": true, //cantidad paginas
			"searching": true, //buscador
			"processing": true, //animacion
			"select": true, //marca
			"autoWidth": true, // ancho
			"pagingType": "full_numbers",
			"order": [
			[0, "desc"]
			], // orden
			"autoWidth": true,

			language: {
				buttons: {
					print: "IMPRIMIR",
					copyTitle: 'Copia Completada ',
					copySuccess: {
						_: 'se copiaron %d filas',
						"1": 'solo 1  linea'
					}
				},
				"decimal": "",
				"copyKeys": 'mensaj',
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando... datos",
				"processing": "Procesando... datos",
				"search": "Buscar:",
				"zeroRecords": "No se encontro Informacion :(",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},




			"buttons": [

				// badge badge-pill

				{
					extend: 'excel',
					className: 'excelButton btn-sm btn-outline-success '
				},
				{
					extend: 'pdf',
					className: 'pdfButton btn-sm btn-outline-danger '
				},
				{
					extend: 'print',
					className: 'imprimirButton btn-sm btn-outline-dark'
				}
				],




				"dom": '<"dt-buttons"Bf><"clear">lrtp'


			});
	});
</script>
<div class="card">
	<table id="example" class="align-self-center table  table-bordered table-responsive" cellspacing="0" style="width:100%">

		<thead class="bg bg-primary text-white">
			<tr>

				<th>Rut</th>
				<th>Rol</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Disponibilidad</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($list as $value): ?>
				<?php $rutaPerfilPersona = base_url("index.php/controllerEmpleados/ViewDatoPersona/{$value->RUT}"); ?>
				<tr>										
					<td> <a href="<?= $rutaPerfilPersona ?>"> <?= $value->RUT ?>  </a>  </td>
					<td><?= $value->NOMBREROL ?></td>
					<td><?= $value->NOMBRES ?></td>
					<td><?= $value->CORREOELECTRONICO ?></td>
					<?php if ($value->DISPONIBILIDAD == '0'): ?>
						<td>No disponible</td>
						<?php else: ?>
							<td>disponible</td>
						<?php endif ?>
					</tr>	
				<?php endforeach ?>
			</tbody>
		</table>

	</div>
	<!-- x -->


</div>
</div>


</div>
<div class="col-12">&nbsp;</div>
<div class="col-12">&nbsp;</div>
</div>
</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxx======================================================== -->