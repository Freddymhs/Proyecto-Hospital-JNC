<div class="row">
	<div class="col-3">
		
		<label class="col-form-label"  for="xIP">DIRECCION IP</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">


			<div class="input-group mb-3 input-group" > 
				<input placeholder="0.0.0.0" type="text" name="txtnuevaip"  id="txtnuevaip" value="<?php echo set_value('txtnuevaip'); ?>" class="form-control">
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
			<input  type="text" name="txtRed"   id="xRed"  value="<?php echo set_value('txtRed'); ?>" class="form-control">
			
		</div>
		<div class="input-group mb-3 input-group" > 
			<?php echo form_error('txtRed', '<div class="error">', '</div>');?>
		</div>
	</div>
</div>

<div class="row bg bg-info">

	<!-- sdasda -->
</div>

