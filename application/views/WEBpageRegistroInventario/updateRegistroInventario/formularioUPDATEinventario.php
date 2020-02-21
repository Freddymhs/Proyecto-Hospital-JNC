
<?php $cargo = $this->session->userdata('CargoAsignado'); ?>

<?php if (($cargo == "superadmin") || ($cargo == "admin")): ?>

<?php else: ?>
	<?php redirect(base_url()); ?>
<?php endif ?>


<!doctype html>
<html lang="en">
<head>
	<!-- css de bootstrap  -->
	<?php 	$this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoHead.php') ;?>
	<!-- javascript de disable and enable inp  -->
	<script type="text/javascript">
		function protectSerialDates(){  // para seriales y fecha arriendo
			if (document.getElementById("collapModMon").value == ''  && document.getElementById("selectMonitor").value == '' ) {
				document.getElementById("txtserialmonitor").disabled = true;
				document.getElementById("txtserialmonitor").value = '';
				document.getElementById("dateMonitor").disabled = true;			}
				if (document.getElementById("collapModelPC").value == ''  && document.getElementById("selectpc").value == '' ) {
					document.getElementById("txtserialpc").disabled = true;
					document.getElementById("txtserialpc").value = '';
					document.getElementById("datePC").disabled = true;
				}
				if (document.getElementById("collapModelImpr").value == ''  && document.getElementById("selectImpresora").value == '' ) {
					document.getElementById("txtserialimpresora").disabled = true;
					document.getElementById("txtserialimpresora").value = '';
					document.getElementById("dateImpresora").disabled = true;
				}
				if (document.getElementById("collapModUPs").value == ''  && document.getElementById("selectups").value == '' ) {
					document.getElementById("txtserialups").disabled = true;
					document.getElementById("txtserialups").value = '';
				}

			}
			function unlockIdate(){
				if (document.getElementById("txtserialimpresora").value != '') {
					document.getElementById("dateImpresora").disabled = false;
					document.getElementById("dateImpresora").style.borderColor = 'grey';
				}
				if (document.getElementById("txtserialmonitor").value != '') {document.getElementById("dateMonitor").disabled = false;
				document.getElementById("dateMonitor").style.borderColor = 'grey';
			}
			if (document.getElementById("txtserialpc").value != '') {document.getElementById("datePC").disabled = false;
			document.getElementById("datePC").style.borderColor = 'grey';
		}
	}
	function fM(){
		
		document.getElementById("dateMonitor").value = '';
		document.getElementById("dateMonitor").disabled = true;
		document.getElementById("dateMonitor").style.borderColor = 'white';
	}
	function fP(){
		
		document.getElementById("datePC").value = '';
		document.getElementById("datePC").disabled = true;
		document.getElementById("datePC").style.borderColor = 'white';
	}
	function fI(){

		document.getElementById("dateImpresora").disabled = true;
		document.getElementById("dateImpresora").value = '';
		document.getElementById("dateImpresora").style.borderColor = 'white';

		
	}
</script>




<title>Inventario Web</title>
</head>
<body >


	<!-- =========================================================================================================================== -->
	<header>
		<!-- nav -->
		<?php 	$this->load->view('WEBcontenidoBasico/barraNavegacion.php') ;?>
		<!-- end nav -->
	</header>
	<!-- =========================================================================================================================== -->
	
	<!-- main -->
	<main class="container-fluid " onmouseover="protectSerialDates()"   >	 <!-- enableDates , permite usar las fechas cuando seriales existen -->
		<div class="row ">
			<div class="col-1  " ></div>
			<div class="col-10  "  onmouseover="unlockIdate()">
				
				<?php $this->load->view('WEBpageRegistroInventario/updateRegistroInventario/formularioActualiza'); ?>
			</div>
			<div class="col-1  "></div>
		</div>
	</main>
	<!-- main -->

	


	<!-- footer -->
	<?php $this->load->view('WEBcontenidoBasico/footer.php'); ?>
	<!-- end footer -->
	<!-- ==================================================================================================================== -->
	
	<!-- jquery , boostrap y js -->
	<?php $this->load->view('WEBcontenidoBasico/contenidoImportar/contenidoBot'); ?>


</body>
</html>


