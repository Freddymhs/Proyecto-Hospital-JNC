
<div class="row"> 
	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">Telefono</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapTelefono" >+</button>

			<?php if ((count($listtelefonos)) > 0): ?>
				<select class="form-control" name="selectTelefono" id="selectTelefono" onmouseleave="cleanTelefono()">
					<!-- <option selected value="-">-</option> -->
					<option></option>
					<?php foreach ($listtelefonos as $value): ?>
						
						<option value="<?= $value->NROANEXO ?>" <?php echo set_select('selectTelefono', $value->NROANEXO); ?> ><?= $value->NROANEXO ?></option>
					<?php endforeach ?>
				</select>
				<?php else: ?>
					<select class="form-control" disabled  >
						<option selected >sin datos </option>
						<input type="text" hidden name="selectTelefono" ID="selectTelefono" value="">
					</select>
				<?php endif ?>
			</div>
			<div class="input-group mb-3 input-group" > 
				<?php echo form_error('selectTelefono', '<div class="error">', '</div>');?>
				
			</div>
		</div>
		<div class="col-2">
		</div>
		<div class="col-3">
			<div class="input-group mb-3 input-group">
			</div>
		</div>
		<!-- espacio de 12 para formulario -->
		<div class="col-12">
			<div class="collapse border border-white" id="collapTelefono">
				<div class="card card-header bg-primary text-white">
					<p class="align-self-center" style="font-size: 15px;"><b>Crear un nuevo Telefono</b></p>
				</div>
				<div class="card card-body">
					<!-- new area -->
					<div class="row">
						<!-- input -->
						<div class="col-4">
							<div class="input-group mb-3 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Nro Anexo </span>
								</div>
								<input type="text" name="collapTelefonoNum" id="collapTelefonoNum" onfocusout="cleanTelefonoSelected()" value="<?php echo set_value('collapTelefonoNum'); ?>" class="form-control">
							</div>
							<div class="input-group mb-3 input-group" >
								
								<?php echo form_error('collapTelefonoNum', '<div class="error">', '</div>');?>
								
							</div>
						</div>			
					</div>
					<!-- fin area -->

				</div>
			</div>
		</div>
		<!-- fin form -->
	</div>