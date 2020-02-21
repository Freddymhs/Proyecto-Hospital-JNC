

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

			

<form action="<?php echo base_url() ?>index.php/controllerInventarioHJNC/Formulario" method="post">
	<?php echo form_open('form'); ?>
	
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowTelefono.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowUnidad.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowPersona.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowModeloPc.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowdirip.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowbios.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowmac.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowMonitor.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowImpresora.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowUPS.php'); ?>
	<?php $this->load->view('WEBpageRegistroInventario/contenidoRegistroInventario/rowfechaingreso.php'); ?>
	
	
	
	
	
	
	
	
	
	

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