<?
// Inicio de secion
session_start();
// Incluyo clase login
require_once('login.class.php');
// Creando la instancioa
$Login	= new Login;
// Chequeado permisos
$Login->checkauth();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FORMULARIO DE LOGEO</title>
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <link href="logeo/css/login.css" rel="stylesheet" media="all" type="text/css" />
    <link rel="shortcut icon" href="mantencion.ico" />
	<script language="javascript" type="text/javascript" src="logeo/js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="logeo/js/form.js"></script>
    <script language="javascript" type="text/javascript" src="logeo/js/login.js"></script>
</head>
<body class="body">
    <div id="err"></div>
    <!--SOLO MUESTRA CUANDO LA SESION ESTA INICIADA DIRECCIONANDO A LA PAG INDEX.PHP-->
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="wrapper"></div>
</body>
</html>