
<?php $cargo = $this->session->userdata('CargoAsignado'); ?>

<?php if (($cargo == "superadmin") || ($cargo == "admin")): ?>

<?php else: ?>
	<?php redirect(base_url()); ?>
<?php endif ?>

<!-- 1 validacion -->
<!-- 2 auto completar -->
<!-- buscar in real time -->


<!-- x -->
<style type="text/css" media="screen">
	.error {
		color: red;
	}
</style>
<style type="text/css" media="screen">
	.card {
		background-color: #F2EEE5;

	}

	/*font-family:"Signika", arial, sans-serif;}*/
	/*font-family:"Signika", arial, sans-serif;}*/
</style>

<div class="card ">

	<div class="container-fluid">
		<div class="col-12  ">
			
			<form action="<?php echo base_url() ?>index.php/controllerInventarioHJNC/viewRow/<?=$fila[0]->ID_INVENTARIO?>" method="post">
				<p>actualice  la informaicon</p>
				<?php echo form_open('form'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowTelefono.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowUnidad.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowPersona.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowModeloPc.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowdirip.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowbios.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowmac.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowMonitor.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowImpresora.php'); ?>
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowUPS.php'); ?>

				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/contenidoRegistroInventarioUPD/rowfechaingreso.php'); ?>
				
				
				
				
				
				
				

				<div class="col-12">
					<input type="submit" name="btnEnviarDatos" id="DatosRegistrar" value="Confirmar" class="btn btn-primary float-right">
				</div>
			</div>
		</form>


	</div>
	<div class="col-12">&nbsp;</div>
	<div class="col-12">&nbsp;</div>
</div>
</div>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxx======================================================== -->