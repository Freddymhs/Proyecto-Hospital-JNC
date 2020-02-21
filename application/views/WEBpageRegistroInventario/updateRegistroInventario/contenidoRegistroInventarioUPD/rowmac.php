<div class="row">
	<div class="col-3">
		
		<label  class="col-form-label"  for="xIP">Mac</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">

			<div class="input-group mb-3 input-group" > 
				<?php if (isset($DATOSPC[0]->DIRECCIONMAC)): ?>
					<input  type="text" name="txtDirMac" id="txtDirMac" placeholder="F0-03-8C-DF-A2-DB"class="form-control" value="<?= null !=(set_value('txtDirMac'))? set_value('txtDirMac') : $DATOSPC[0]->DIRECCIONMAC?>">
					<?php else: ?>
						<input  type="text" name="txtDirMac" id="txtDirMac" placeholder="F0-03-8C-DF-A2-DB"class="form-control" value="<?= null !=(set_value('txtDirMac'))? set_value('txtDirMac') : '' ?>">
					<?php endif ?>

				</div>
				<div class="input-group mb-3 input-group" > 
					<?php echo form_error('txtDirMac', '<div class="error">', '</div>');?>
				</div>

			</div>
		</div>
		<div class="col-2">

		</div>
		<div class="col-3">
			<div class="input-group mb-3 input-group">

			</div>
			<div class="input-group mb-3 input-group">

			</div>
		</div>
	</div>