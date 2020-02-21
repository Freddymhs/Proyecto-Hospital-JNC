<!-- X -->


<div class="row"> 

	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">Modelo de Monitor</label>
		<p style="font-size: 11px; color:black;"><b>no use los campos de Monitor si es un modelo AllInOne</b></p>
	</div>



	<div class="col-4">
		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapMonitor" >+</button>
			<?php if ((count($listmonitores)) > 0): ?>

				<select class="form-control" name="selectMonitor" id="selectMonitor" onmouseleave="cleanNewMonitor()">
					<option></option>



					<?php foreach ($listmonitores as $value): ?>		
						<?php if (  $value->MODELOMON == $DATOSMINITOR[0]->MODELOMON): ?>
							<option selected value="<?= $value->MODELOMON ?>" <?php echo set_select('selectMonitor', $value->MODELOMON); ?> ><?= $value->MODELOMON ?></option>
							<?php else: ?>
								<option value="<?= $value->MODELOMON ?>" <?php echo set_select('selectMonitor', $value->MODELOMON); ?> ><?= $value->MODELOMON ?></option>
							<?php endif ?>
						<?php endforeach ?>





					</select>
					<?php else: ?>
						<select class="form-control" disabled>
							<option selected >sin datos </option>
							<input type="text" hidden name="selectMonitor" ID="selectMonitor" value="">
						</select>
					<?php endif ?>
				</div>
				<div class="input-group mb-3 input-group" > 
					<!-- formerrror -->
				</div>
			</div>

			<div class="col-2">
				<label class="col-form-label"  for="htr">Serial de Monitor</label>
			</div>
			<div class="col-3">
				<div class="input-group mb-3 input-group">
					<!-- x -->
					<?php if (isset($DATOSMINITOR[0]->SERIALMONITOR)): ?>
						<input  type="text" name="txtserialmonitor" id="txtserialmonitor"  class="form-control" value="<?= null !=(set_value('txtserialmonitor'))? set_value('txtserialmonitor') : $DATOSMINITOR[0]->SERIALMONITOR?>">	

						<?php else: ?>
							<input  type="text" name="txtserialmonitor" id="txtserialmonitor"  class="form-control" value="<?= null !=(set_value('txtserialmonitor'))? set_value('txtserialmonitor') : ''?>">	
						<?php endif ?>

						<!-- x -->				
					</div>
					<div class="input-group mb-3 input-group">
						<?php echo form_error('txtserialmonitor', '<div class="error">', '</div>');?>
					</div>
				</div>

			</div>
			<!-- espacio de 12 para formulario -->
			<div class="col-12">

				<div class="collapse border border-white" id="collapMonitor">
					<div class="card card-header bg-primary text-white">
						<p class="align-self-center" style="font-size: 15px;"><b>Crear / Actualizar un Modelo de Monitor</b></p>
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
									<input type="text"  name="collapModMon" id="collapModMon" class="form-control" onfocusout="cleanMonitSelected()" value="<?php echo set_value('collapModMon'); ?>">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapModMon', '<div class="error">', '</div>');?>
								</div>
							</div>
							<!-- input -->
							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Marca</span>
									</div>
									<input type="text" name="collapMarMon" id="collapMarMon"  class="form-control" value="<?php echo set_value('collapMarMon'); ?>">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapMarMon', '<div class="error">', '</div>');?>
								</div>
							</div>
							<!-- input -->
							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Funcionalidades</span>
									</div>
									<input type="text" name="collapMonFun" id="collapMonFun"    class="form-control" value="<?php echo set_value('collapMonFun'); ?>">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapMonFun', '<div class="error">', '</div>');?>
								</div>
							</div>
							<!-- input -->
							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Resolucion</span>
									</div>
									<input type="text" name="collapResMon" id="collapResMon"  class="form-control" value="<?php echo set_value('collapResMon'); ?>">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapResMon', '<div class="error">', '</div>');?>
								</div>
							</div>
							<!-- input -->
							<div class="col-4">
								<div class="input-group mb-3 input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Pulgadas</span>
									</div>
									<input type="text" name="collapPulMon" id="collapPulMon"   class="form-control" value="<?php echo set_value('collapPulMon'); ?>">
								</div>
								<div class="input-group mb-3 input-group" > 
									<?php echo form_error('collapPulMon', '<div class="error">', '</div>');?>
								</div>
							</div>
							

						</div>
						<!-- fin area -->

					</div>
				</div>
			</div>
			<!-- fin form -->

