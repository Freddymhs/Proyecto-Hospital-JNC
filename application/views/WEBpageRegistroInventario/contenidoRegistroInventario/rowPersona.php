

<script type="text/javascript">
	function buscarElemento(){

		var optionVal = new Array();

		for (i = 0; i < selectPersona.length; i++) { 
			var contenidos = document.getElementById("selectPersona")[i].value;
			var buscador = document.getElementById("buscadorKZ").value;


			if(contenidos.includes(buscador)){
				document.getElementById("selectPersona").selectedIndex = i;
				document.getElementById("selectPersona")[i].hidden = false;
			}else{
				document.getElementById("selectPersona")[i].hidden = true;
			}
		}
	}
</script>


<!--  -->
<div class="row"> 
	<div class="col-3">
		<label class="col-form-label"  for="xUsuario">RUT/Seccion</label>
	</div>
	<div class="col-4">

		<div class="input-group mb-3 input-group">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapPersona" >+</button>
			<?php if ((count($listpersonas)) > 0): ?>
				<select class="form-control" name="selectPersona" id="selectPersona" onmouseleave="cleanPersona()">
					<option></option>
					<?php foreach ($listpersonas as $value): ?>
						<option value="<?= $value->RUT ?>" <?php echo set_select('selectPersona', $value->RUT); ?> ><?= $value->RUT ?></option>
					<?php endforeach ?>
				</select>
				<?php else: ?>
					<select class="form-control" disabled>
						<option selected >sin datos</option>
						<input type="text" hidden name="selectPersona" value="-">
					</select>
				<?php endif ?>






			</div>


			<div class="input-group mb-3 input-group" > 
				<!-- formerrror -->
			</div>
		</div>

		<div class="col-2 " style="color:grey;">
			¿Buscar un Rut o Seccion?
		</div>
		<div class="col-3">
			<div class="input-group mb-3 input-group">

				<input style="color:grey;" type="text" id="buscadorKZ"onkeyup="buscarElemento()" placeholder="Filtro para rut" class="text-center border border-info ">
				
			</div>
		</div>
		<!-- espacio de 12 para formulario -->
		<div class="col-12">
			<div class="collapse border border-white" id="collapPersona">
				<div class="card card-header bg-primary text-white">
					<p class="align-self-center" style="font-size: 15px;"><b>Crear un nueva Persona</b></p>
				</div>
				<div class="card card-body">
					<!-- new area -->
					<div class="row">
						<!-- input -->
						<div class="col-4">
							<div class="input-group mb-3 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Rut/Seccion</span>
								</div>
								<input type="text" name="collapRutP"  placeholder="Encargado" id="collapRutP" value="<?php echo set_value('collapRutP'); ?>" onfocusout="cleanPersonaSelected()" class="form-control">

							</div>

							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('collapRutP', '<div class="error">', '</div>');?>
							</div>

						</div>
						<!-- input -->
						<div class="col-4">
							<div class="input-group mb-3 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Nombres</span>
								</div>
								<input type="text" name="collapNombreP"   value="<?php echo set_value('collapNombreP'); ?>" id="collapNombreP" class="form-control">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('collapNombreP', '<div class="error">', '</div>');?>
							</div>
						</div>

						<!-- input -->
						<div class="col-4">
							<div class="input-group mb-4 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">cargo de sistema</span>
								</div>
								<select name="collapRolP" id="collapRolP" >									
									<option value="basico" <?php echo set_select('collapRolP', 'basico'); ?> >basico</option>
									<option value="admin" <?php echo set_select('collapRolP', 'admin'); ?> >admin</option>
									<option value="superadmin" <?php echo set_select('collapRolP', 'superadmin'); ?> >superadmin</option>
								</select>

							</div>
							<div class="input-group mb-3 input-group" > 
								<!-- formerrror  !! -->
							</div>
						</div>	
						<!-- input -->
						<div class="col-4">
							<div class="input-group mb-3 input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Correo</span>
								</div>
								<input type="text" name="collapCorreoP"    value="<?php echo set_value('collapCorreoP'); ?>" id="collapCorreoP" class="form-control">
							</div>
							<div class="input-group mb-3 input-group" > 
								<?php echo form_error('collapCorreoP', '<div class="error">', '</div>');?>
							</div>
						</div>		

						<!-- input -->
					</div>
					<!-- fin area -->

				</div>
			</div>
		</div>
		<!-- fin form -->
	</div>