<?php
// Inicio de secion
session_start();
// Incluyo clase login
require_once('login.class.php');
// Creo variables SESIONES
$username = $_SESSION["username"];
$tipo_usuario = $_SESSION["tipo_usuario"];
// Creando la instancioa
$Login	= new Login;
// Chequeado permisos
$Login->checkauth();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Reportes de Examenes</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!--FUNCION CARGA TIPO EXAMEN-->
	<script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>
<body class="body" onfocus="enviaQueryExamen('tipo_exam','servicios/ws_getTipoExamen.php')">
<div id="formContenedorReporte">
 <div id="divcompletoReporte">
  <form id="" action="servicios/print_reporte_examen.php" method="get" target="_blank">
	 <table id="miTablaReporte" border="0">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="155">&nbsp;</td>
        <td width="185">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="176">&nbsp;</td>
        <td width="200">&nbsp;</td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5" class="cabeceTitulos">FORMULARIO DE REPORTES</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Tipo Examen</td>
        <td colspan="4">: 
        	<select id="tipo_exam" name="tipo_exam">
             <option value="0">-- Seleccione Examen --</option>
            </select>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>F. Inicio</td>
        <td>: <input class="inputFecha" id="inputField" name="fecha_inicio" type="text" maxlength="10"/></td>
        <td>F. Termino</td>
        <td>:
          <input class="inputFecha" id="inputField1" name="fecha_fin" type="text" maxlength="10" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input id="ButtonBuscar" type="submit"  value="Buscar"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
       <button onclick="Menu()">Menu</button>
    </div>
  </div>
 </div>
</body>
</html>