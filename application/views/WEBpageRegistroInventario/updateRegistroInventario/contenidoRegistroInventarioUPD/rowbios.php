

<div class="row">
	<div class="col-3">
		
		<label  class="col-form-label"  for="xNetbios">NETBIOS</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">
			
			<?php if (isset($DATOSPC[0]->NETBIOS)): ?>
				<input  type="text" name="txtNetbios"  placeholder="hostname"class="form-control" value="<?= null !=(set_value('txtNetbios'))? set_value('txtNetbios') : $DATOSPC[0]->NETBIOS?>">
				<?php else: ?>
					<input  type="text" name="txtNetbios"  placeholder="hostname"class="form-control" value="<?= null !=(set_value('txtNetbios'))? set_value('txtNetbios') : ''?>">					
				<?php endif ?>


			</div>
			<div class="input-group mb-3 input-group" > 
				<?php echo form_error('txtNetbios', '<div class="error">', '</div>');?>
			</div>
		</div>

		<!-- LIBRE -->
	</div>