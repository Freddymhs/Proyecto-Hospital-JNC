		<div class="dropdown-divider"></div>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url()?>index.php/controllerEmpleados/pageHome ">
				Busqueda Rapida
			</a>
		</li>
		<div class="dropdown-divider"></div>
		
		<li class="nav-item ">
			<a class="nav-link" href="<?php echo base_url()?>index.php/controllerInventarioHJNC/Formulario ">
				Registro Inventario
			</a>
		</li>

		

		<div class="dropdown-divider"></div>


		<div class="dropdown">
			
			<li class="nav-item "id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<a class="nav-link" href="">Gestion Equipos</a>
			</li>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				
				<a class="dropdown-item" href="<?php echo base_url();?>index.php/controllerInventarioHJNC/formularioEA ">Estado de Equipos</a>
				<a class="dropdown-item" href="<?php echo base_url();?>index.php/controllerInventarioHJNC/equiposContabilizado ">Todos Los Equipos Contados</a>
				
			</div>

		</div>
		
		
<!-- <li class="nav-item">
	<a class="nav-link" href="<?php echo base_url()?>index.php/controllerEmpleados/registroAnticipado ">
		Registro Anticipado
	</a>
</li> -->

<!-- <li class=" hidden nav-item">
	<a class="nav-link"  href="<?php echo base_url()?>index.php/controllerEmpleados/historialCambios ">
		Historial
	</a>
</li> -->