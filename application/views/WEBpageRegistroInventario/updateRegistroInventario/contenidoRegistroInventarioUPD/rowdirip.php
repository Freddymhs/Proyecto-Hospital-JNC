
<input type="text" hidden name="idHidden" id="idHidden" value="<?=  $fila[0]->ID_INVENTARIO ?>"> 
<div class="row">
	<div class="col-3">
		
		<label class="col-form-label"  for="xIP">DIRECCION IP</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">


			<div class="input-group mb-3 input-group" > 
				<input  type="text" name="txtnuevaip"   id="txtnuevaip"  placeholder="0.0.0.0"class="form-control" value="<?= null !=(set_value('txtnuevaip'))? set_value('txtnuevaip') : $fila[0]->DIRECCIONIPV4?>">
			</div>



		</div>
		<div class="input-group mb-3 input-group" > 
			<?php echo form_error('txtnuevaip', '<div class="error">', '</div>');?>
		</div>
	</div>
	<div class="col-2">
		<label class="col-form-label"  for="xRed">RED</label>
	</div>
	<div class="col-3">
		<div class="input-group mb-3 input-group">
			<input  type="text" name="txtRed"   id="xRed"  placeholder="0.0.0.0"class="form-control" value="<?= null !=(set_value('txtRed'))? set_value('txtRed') : $fila[0]->RED?>">
			
			
		</div>
		<div class="input-group mb-3 input-group" > 
			<?php echo form_error('txtRed', '<div class="error">', '</div>');?>
		</div>
	</div>
</div>

<div class="row bg bg-info">

	<!-- sdasda -->
</div>

