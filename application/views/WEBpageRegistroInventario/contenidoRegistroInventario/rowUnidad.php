
<div class="row"> 
	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">Unidad</label>
	</div>
	<div class="col-4">
		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseUnidad" >+</button>
			<?php if ((count($listunidades)) > 0): ?>
				<select  class="form-control"  name="selectunidades" id="selectunidades" onclick="cleanUnidad();" >
					<option></option>
					<?php foreach ($listunidades as $value): ?>
						<option value="<?= $value->NOMBREUNIDAD ?>" <?php echo set_select('selectunidades', $value->NOMBREUNIDAD); ?> ><?= $value->NOMBREUNIDAD ?></option>
					<?php endforeach ?>
				</select>
				<?php else: ?>
					<select class="form-control" disabled  >
						<option selected >sin datos </option>
						<input type="text" hidden name="selectunidades" ID="selectunidades" value="">
					</select>
				<?php endif ?>
			</div>
			<div class="input-group mb-3 input-group" > 
				<?php echo form_error('selectunidades', '<div class="error">', '</div>');?>

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
			<div class="collapse border border-white" id="collapseUnidad">
				<div class="card card-header bg-primary text-white">
					<p class="align-self-center" style="font-size: 15px;"><b>Crear un nueva Unidad</b></p>
				</div>
				<div class="card card-body">
					<!-- new area -->
					<div class="row">

						<!-- input -->
						<div class="col-4">
							<div class="input-group mb-3 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">NOMBRE Unidad</span>
								</div>
								<input type="text" name="collapNunidad" id="collapNunidad" value="<?php echo set_value('collapNunidad'); ?>" onfocusout="cleanUnidadSelected()" id="collapNunidad" class="form-control">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('collapNunidad', '<div class="error">', '</div>');?>
							</div>
						</div>

						<div class="col-4">
							<div class="input-group mb-3 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Detalles</span>
								</div>
								<input type="text" name="collapUespecif" id="collapUespecif" placeholder="campo opcional" value="<?php echo set_value('collapUespecif'); ?>"  id="x" class="form-control">
							</div>

							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('collapUespecif', '<div class="error">', '</div>');?>
							</div>
							
						</div>
					</div>
					<!-- fin area -->
				</div>
			</div>
		</div>
		<!-- fin form -->
	</div>
	<!-- x -->

	<script type="text/javascript">

		function limpaCamposUps(){
			document.getElementsByName("collapModUPs").value = "";
		}
		

	</script>