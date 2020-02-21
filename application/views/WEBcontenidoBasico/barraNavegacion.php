	<style type="text/css" media="screen">
		.navbar-nav .navbar-nav .nav-link {
			color: rgba(255,255,255,.5) !important;
		}

		.navbar-nav .nav-item.active .nav-link,
		.navbar-nav .nav-item:hover .nav-link {
			color: white !important;
			background-color: #06B7ED !important;
			border-radius: 14px;
		}
	</style>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<nav class="navbar navbar-expand-lg navbar-light "style="height: 10vh">  <!-- nav total -->



		<a href="javascript:history.go(-1)" title="Retroceder">
			<span class="algo  btn btn-outline-info">	
				<i class="fa fa-caret-square-o-left" aria-hidden="true"> &nbsp;</i>
				Atras
			</span>
		</a>&nbsp;&nbsp;&nbsp;

		<a href=""> <img class="logokz" src="<?php echo base_url('assets/images/logo.png'); ?>"  style="width:40px;" /> </a> <!-- logo y home -->

	</span>
	<style type="text/css" media="screen">
		.navbar{z-index: 9999;}

	</style>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  <!-- btn expand -->
		<span class="navbar-toggler-icon"></span><!-- btn expand -->
	</button>



	<div class=" border navbar-collapse collapse bg bg-white" id="navbarSupportedContent">
		<ul class="  navbar-nav mr-auto">		

			<?php if ($this->session->userdata('CargoAsignado')=="superadmin") {
				$this->load->view('WEBcontenidoBasico/contenidoBarraNavegacion/contenidoSuperAdmin');
			} ?>
			<?php if ($this->session->userdata('CargoAsignado')=="admin") {
				$this->load->view('WEBcontenidoBasico/contenidoBarraNavegacion/contenidoAdmins');
			} ?>
			<?php if ($this->session->userdata('CargoAsignado')=="basico") {  
				$this->load->view('WEBcontenidoBasico/contenidoBarraNavegacion/contenidoUsuariosBasico'); 
			} ?>


		</ul>
		<form class="form-inline my-2 my-lg-0">

			<a href="#" class="nav-link disabled">
				<i class="fa fa-fw fa-user"></i> 
			
				<?= $this->session->userdata('NombreIngreso'); ?>
			
			</a>

			<a class="nav-link" href="<?php echo base_url()?>index.php/controllerEmpleados/funcionLogOutUsuario ">
				Cerrar Session
			</a>


		</form>
	</div>
</nav>
<!-- este necesita un hover sobre los elemtnso de la web  -->
<!-- esto necesita mas estilos -->

