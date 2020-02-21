<div class="row"> 
	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">Modelo Computador</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapPC" >+</button>
			<?php if ((count($listcomputadores)) > 0): ?>
				<select class="form-control" name="selectpc" id="selectpc" onmouseleave="cleanNewPc()">
					<option></option>



					<?php foreach ($listcomputadores as $value): ?>		
						
						<?php if (  $value->MODELOCOMP == $DATOSPC[0]->MODELOCOMP): ?>
							<option selected value="<?= $value->MODELOCOMP ?>" <?php echo set_select('selectpc', $value->MODELOCOMP); ?> ><?= $value->MODELOCOMP ?></option>
							<?php else: ?>
								<option value="<?= $value->MODELOCOMP ?>" <?php echo set_select('selectpc', $value->MODELOCOMP); ?> ><?= $value->MODELOCOMP ?></option>
							<?php endif ?>


							
						<?php endforeach ?>



					</select>
					<?php else: ?>
						<select class="form-control" disabled  >
							<option selected >sin datos </option>
							<input type="text" hidden name="selectpc" ID="selectpc" value="">
						</select>
					<?php endif ?>
				</div>
				<div class="input-group mb-3 input-group" > 
					<?php echo form_error('selectpc', '<div class="error">', '</div>');?>
				</div>
			</div>

			<div class="col-2">
				<label class="col-form-label"  >Serial de PC</label>
			</div>
			<div class="col-3">
				<div class="input-group mb-3 input-group">
					
					<?php if ( isset($DATOSPC[0]->SERIALCOMPUTADOR)): ?>
						<input  type="text" name="txtserialpc" id="txtserialpc" placeholder="wmic bios get serialnumber"  class="form-control" value="<?= null !=(set_value('txtserialpc'))? set_value('txtserialpc') : $DATOSPC[0]->SERIALCOMPUTADOR?>">			
						<?php else: ?>
							<input  type="text" name="txtserialpc" id="txtserialpc" placeholder="wmic bios get serialnumber"  class="form-control" value="<?= null !=(set_value('txtserialpc'))? set_value('txtserialpc') : '' ?>">			
						<?php endif ?>
					</div>

					<div class="input-group mb-3 input-group">
						<?php echo form_error('txtserialpc', '<div class="error">', '</div>');?>
					</div>
					
				</div>
			</div>
			<!-- espacio de 12 para formulario -->
			<div class="col-12">

				<div class="collapse border border-white" id="collapPC">
					<div class="card card-header bg-primary text-white">
						<p class="align-self-center" style="font-size: 15px;"><b>Crear / Actualizar un Modelo de Computador</b></p>
					</div>

					<div class="card card-body">
						<!-- new area -->
						<div class="row">

							<!-- input -->
							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">MODELO </span>
									</div>
									<input type="text" name="collapModelPC" id="collapModelPC" value="<?php echo set_value('collapModelPC'); ?>"  class="form-control" onfocusout="cleanPcSelected()">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapModelPC', '<div class="error">', '</div>');?>
								</div>
							</div>

							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Marca</span>
									</div>
									<input type="text" name="collapMarcaPC" id="collapMarcaPC"   value="<?php echo set_value('collapMarcaPC'); ?>" class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapMarcaPC', '<div class="error">', '</div>');?>
								</div>
							</div>

							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Almacenamiento Primario</span>
									</div>
									<input type="text" name="collapDisc1" id="collapDisc1"  value="<?php echo set_value('collapDisc1'); ?>"  class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapDisc1', '<div class="error">', '</div>');?>
								</div>
							</div>

							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Almacenamiento Secundario</span>
									</div>
									<input type="text" name="collapDisco2" id="collapDisco2"  value="<?php echo set_value('collapDisco2'); ?>" class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapDisco2', '<div class="error">', '</div>');?>
								</div>
							</div>

							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Procesador</span>
									</div>
									<input type="text" name="collapProcePc" id="collapProcePc"  value="<?php echo set_value('collapProcePc'); ?>"  class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapProcePc', '<div class="error">', '</div>');?>
								</div>
							</div>


							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Memoria Ram</span>
									</div>
									<input type="text" name="collapMemoPc" id="collapMemoPc"  value="<?php echo set_value('collapMemoPc'); ?>"  class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapMemoPc', '<div class="error">', '</div>');?>
								</div>
							</div>


							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Sistema Operativo</span>
									</div>
									<input type="text" name="collapSoPc" id="collapSoPc"   value="<?php echo set_value('collapSoPc'); ?>"  class="form-control">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapSoPc', '<div class="error">', '</div>');?>
								</div>
							</div>
							<!-- qa -->


							<!-- aq -->
						</div>
						<!-- fin area -->

					</div>
				</div>
			</div>
			<!-- fin form -->




