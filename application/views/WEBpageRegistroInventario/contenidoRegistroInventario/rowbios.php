<div class="row">
	<div class="col-3 col-sm-3">
		
		<label class="col-form-label"  for="xNetbios">NETBIOS</label>
	</div>
	<div class="col-4 col-sm-4">
		<div class="input-group mb-3 input-group">

			<input  type="text" name="txtNetbios"  placeholder="hostname" value="<?php echo set_value('txtNetbios'); ?>" class="form-control">

		</div>
		<div class="input-group mb-3 input-group" > 
			<?php echo form_error('txtNetbios', '<div class="error">', '</div>');?>
		</div>
	</div>

	<!-- LIBRE -->
</div>