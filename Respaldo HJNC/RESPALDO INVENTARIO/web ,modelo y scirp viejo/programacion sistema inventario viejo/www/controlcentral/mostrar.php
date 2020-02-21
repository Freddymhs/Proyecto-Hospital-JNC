<?php
// Inicio de secion
session_start();
// Incluyo clase login
require_once('login.class.php');
// Creando la instancioa
$Login	= new Login;
// Chequeado permisos
$Login->checkauth();
?>
<?

if($estado=='Ingresada' || $estado=='Pendiente'){
	
	include('detalle_orden.php');
	
}else{
	
	include('detalle_orden_realizada.php');
	
}

?>