
<!-- X -->
<?php 


?>
<div class="row "> 
	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">Modelo de UPS</label>
	</div>
	


	<div class="col-4">
		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapUPS" >+</button>
			<?php if ((count($listups)) > 0): ?>
				<select class="form-control" name="selectups" ID="selectups"  onmouseleave="cleanNewUps()" >
					<option></option>


					

					<?php foreach ($listups as $value): ?>				



						<?php if (  $value->MODELOUPS == $laUPS[0]->MODELOUPS): ?>
							<option SELECTED  value="<?= $value->MODELOUPS ?>" <?php echo set_select('selectups', $value->MODELOUPS); ?> ><?= $value->MODELOUPS ?></option>
							<?php else: ?>
								<option  value="<?= $value->MODELOUPS ?>" <?php echo set_select('selectups', $value->MODELOUPS); ?> ><?= $value->MODELOUPS ?></option>
							<?php endif ?>
						<?php endforeach ?>





					</select>
					<?php else: ?>
						<select class="form-control" disabled  >
							<option selected >sin datos </option>
							<input type="text" hidden name="selectups" ID="selectups" value="">
						</select>
					<?php endif ?>
				</div>
				<div class="input-group mb-3 input-group" > 
					<!-- formerrror -->
				</div>
			</div>

			<div class="col-2">
				<label class="col-form-label"  for="hgf">Serial de UPS</label>
			</div>
			<div class="col-3">
				<div class="input-group mb-3 input-group">
					

					<?php if (isset($laUPS[0]->SERIALUPS)): ?>
						<input  type="text" name="txtserialups" id="txtserialups"  class="form-control" value="<?= null !=(set_value('txtserialups'))? set_value('txtserialups') : $laUPS[0]->SERIALUPS?>">
						<?php else: ?>
							<input  type="text" name="txtserialups" id="txtserialups"  class="form-control" value="<?= null !=(set_value('txtserialups'))? set_value('txtserialups') : ''?>">						
						<?php endif ?>


					</div>
					<div class="input-group mb-3 input-group">
						<?php echo form_error('txtserialups', '<div class="error">', '</div>');?>
					</div>
				</div>
			</div>
			<!-- espacio de 12 para formulario -->
			<div class="col-12">

				<div class="collapse border border-white" id="collapUPS">
					<div class="card card-header bg-primary text-white">
						<p class="align-self-center" style="font-size: 15px;"><b>Crear / Actualizar un  Modelo de UPS</b></p>
					</div>

					<div class="card card-body">
						<!-- new area -->
						<div class="row">

							<!-- input -->
							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">MODELO</span>
									</div>
									<input onfocusout="cleanUpsSelected()" type="text" name="collapModUPs" ID="collapModUPs"   value="<?php echo set_value('collapModUPs'); ?>" class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapModUPs', '<div class="error">', '</div>');?>
								</div>
							</div>

							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Marca</span>
									</div>
									<input type="text" name="collapMarcaUps" ID="collapMarcaUps"  value="<?php echo set_value('collapMarcaUps'); ?>"  class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapMarcaUps', '<div class="error">', '</div>');?>
								</div>
							</div>



							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Capacidad</span>
									</div>
									<input type="text" name="collapCapacUps" ID="collapCapacUps" value="<?php echo set_value('collapCapacUps'); ?>"  class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapCapacUps', '<div class="error">', '</div>');?>
								</div>
							</div>

							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Funcionalidad</span>
									</div>
									<input type="text" name="collapFuncUps" ID="collapFuncUps"  value="<?php echo set_value('collapFuncUps'); ?>" class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapFuncUps', '<div class="error">', '</div>');?>
								</div>
							</div>
						</div>
						<!-- fin area -->

					</div>
				</div>
			</div>
			<!-- fin form -->





