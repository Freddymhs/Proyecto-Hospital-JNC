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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Formulario Repostes</title>
    <!--ESTILO-->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    <!--Funcion Salir-->
    <script type="text/javascript" type="text/javascript" src="js/funcion_salir.js"></script>
</head>
<body class="body">
<div id="formContenedorReporte">
   <form action="historial_turno.php" method="post">
    <table id="miTablaReporte">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="98">&nbsp;</td>
        <td width="309">&nbsp;</td>
        <td width="114">&nbsp;</td>
        <td width="337">&nbsp;</td>
        <td width="22">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4" class="tituloReporte">Formulario de Reportes</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Fecha</td>
        <td>: <input id="inputField" name="fecha" type="text" size="12"  /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="nivel" type="hidden" value="2" /></td>
        <td><input id="BotonBuscar" type="submit" value="Reporte"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
   </form>
   <div id="divBotonReporte">
    <button onclick="Salir()">Salir</button>
   </div> 
</div>
</body>
</html>