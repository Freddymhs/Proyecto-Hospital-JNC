
<!-- X -->
<div class="row"> 
	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">Impresora</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseImpresora" >+</button>
			<?php if ((count($listimpresoras)) > 0): ?>
				<select class="form-control" name="selectImpresora" id="selectImpresora" onmouseleave="cleanNewImp()">
					<option></option>
					<?php foreach ($listimpresoras as $value): ?>						
						<option value="<?= $value->MODELOIMP ?>" <?php echo set_select('selectImpresora', $value->MODELOIMP); ?> ><?= $value->MODELOIMP ?></option>
					<?php endforeach ?>
				</select>
				<?php else: ?>
					<select class="form-control" disabled  >
						<option selected >sin datos </option>
						<input type="text" hidden name="selectImpresora" ID="selectImpresora" value="">
					</select>
				<?php endif ?>
			</div>
			<div class="input-group mb-3 input-group" > 
				<!-- formerrror -->
			</div>
		</div>

		<div class="col-2">
			<label class="col-form-label"  for="uyt">Serial</label>
		</div>
		<div class="col-3">
			<div class="input-group mb-3 input-group">
				<input type="text" class="form-control" name="txtserialimpresora" id="txtserialimpresora"  value="<?php echo set_value('txtserialimpresora'); ?>">
			</div>
			<div class="input-group mb-3 input-group">
				<!-- formerrror -->
				<?php echo form_error('txtserialimpresora', '<div class="error">', '</div>');?>

			</div>
		</div>
	</div>
	<!-- espacio de 12 para formulario -->
	<div class="col-12">

		<div class="collapse border border-white" id="collapseImpresora">
			<div class="card card-header bg-primary text-white">
				<p class="align-self-center" style="font-size: 15px;"><b>Crear un nuevo Modelo de Impresora</b></p>
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
							<input type="text" name="collapModelImpr" id="collapModelImpr" onfocusout="cleanImpSelected()" value="<?php echo set_value('collapModelImpr'); ?>" class="form-control">
						</div>
						<div class="input-group mb-3 input-group" > 
							<?php echo form_error('collapModelImpr', '<div class="error">', '</div>');?>
						</div>
					</div>

					<div class="col-4">
						<div class="input-group mb-3 input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Marca</span>
							</div>
							<input type="text" name="collapMarcaImp" id="collapMarcaImp" value="<?php echo set_value('collapMarcaImp'); ?>" class="form-control">
						</div>
						<div class="input-group mb-3 input-group" > 
							<?php echo form_error('collapMarcaImp', '<div class="error">', '</div>');?>
						</div>
					</div>
					<div class="col-4">
						<div class="input-group mb-3 input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Funcionalidades</span>
							</div>
							<input type="text" name="collapFuncImpr" id="collapFuncImpr"   value="<?php echo set_value('collapFuncImpr'); ?>" class="form-control">
						</div>
						<div class="input-group mb-3 input-group" > 
							<?php echo form_error('collapFuncImpr', '<div class="error">', '</div>');?>
						</div>
					</div>


					




				</div>
				<!-- fin area -->

			</div>
		</div>
	</div>
	<!-- fin form -->

