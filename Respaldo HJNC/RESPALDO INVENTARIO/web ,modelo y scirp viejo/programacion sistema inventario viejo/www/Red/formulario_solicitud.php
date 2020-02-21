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
	<title>FORMULARIO DE INGRESO</title>
    <!-- ESTILO CSS -->
	<link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- FUNCION CARGA UNIDADES -->
    <script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!-- FUNCINO VALIDA FORMULARIO -->
    <script language="javascript" type="text/javascript" src="js/validacion.js"></script>
	<!--FUNCION CARGAR INPUT CON OPCION SELECT-->
    <script language="javascript" type="text/javascript" src="js/funcionselectmodelo.js"></script>
    <!--FUNCION ENTRAR MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
    
</head>
<body class="body" onfocus="enviaQueryUnidad('unidad','servicios/ws_getunidad.php')">
 <div id="formContenedor">
   <div id="transparencia">
     <div id="transparenciaMensaje"></div>
   </div>
   <form id="formulario">
    <div </div>
	 <table cellpadding="0" cellspacing="0" id="miTabla"> 
      <tr>
        <td width="20">&nbsp;</td>
        <td width="184">&nbsp;</td>
        <td width="328" colspan="2">&nbsp;</td>
        <td width="150">&nbsp;</td>
        <td width="28">&nbsp;</td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" class="cabeceratabla">FORMULARIO DE REGISTRO</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Ip</td>
        <td colspan="2">: <input class="inputIp" type="text" name="ip" id="ip" maxlength="15"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Mac</td>
        <td colspan="2">: <input class="inputMac" type="text" name="mac" id="mac" maxlength="17"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Red</td>
        <td colspan="2">: <input class="inputRed" type="text" name="red" id="red" maxlength="4"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Grupo de Trabajo</td>
        <td colspan="2">: <input class="inputGrupo" type="text"  name="grupo" id="grupo" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Unidad</td>
        <td colspan="2">:
            <select class="select" id="unidad"  name="unidad" >
                <option value="0">--Seleccione una Unidad--</option>
            </select>                       
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Netbios</td>
        <td colspan="2">: <input class="inputUsuario" type="text"  name="net" id="net" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Usuario</td>
        <td colspan="2">: <input class="inputUsuario" type="text"  name="usuario" id="usuario" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Impresora</td>
        <td colspan="2">: <input class="inputUsuario" type="text"  name="impresora" id="impresora" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Telefono</td>
        <td colspan="2">: <input class="inputTelefono" type="text" name="telefono" id="telefono" maxlength="6" value="0"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Establecimiento</td>
        <td colspan="2" >: Hospital Dr Juan Noe</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>N° Inv o Serie Pc</td>
        <td colspan="2">: <input class="inputSerie" type="text" name="serie_pc" id="serie_pc" maxlength="15"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>N° Inv o Serie Mont</td>
        <td colspan="2">: <input class="inputSerie" type="text" name="serie_monitor" id="serie_monitor" maxlength="15"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Modelo Pc</td>
        <td>:
            <select class="select" id="modelo_pc"  name="modelo_pc" onchange="selecOp()">
            	<option value="0">--Seleccione Modelo--</option>
            	<option value="Otros">GENERICO</option>
                <option value="Lenovo 1">LENOVO 1</option>
                <option value="Lenovo 2">LENOVO 2</option>
                <option value="Olidata">OLIDATA</option>
                <option value="Olidata Alicon">OLIDATA ALICON</option>
                <option value="HP ProOne 400 G1">HP ProOne 400 G1</option>
                <option value="HP EliteDesk 800 G1">HP EliteDesk 800 G1</option>
		<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>
            </select> 
        </td>
        <td>Modelo Monitor</td>
        <td colspan="2">:
            <select class="select" id="modelo_mon"  name="modelo_mon" >
                <option value="0">--Seleccione Modelo--</option>
                <option value="CRT 14">CRT 14</option>
                <option value="CRT 15">CRT 15</option>
                <option value="CRT 17">CRT 17</option>
                <option value="CRT 19">CRT 19</option>
                <option value="LCD 15">LCD 15</option>
                <option value="LCD 17">LCD 17</option>
                <option value="LCD 19">LCD 19</option>
		<option value="LCD 21.5">LCD 21.5</option>	
                <option value="Integrada All-One">Integrada All-One</option>
                <option value="Otros">Otros</option>
            </select> 
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Procesador</td>
        <td colspan="2">: <input class="inputUsuario" type="text"  name="procesador" id="procesador" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Disco Duro</td>
        <td colspan="2">: <input class="inputUsuario" type="text"  name="disco_duro" id="disco_duro" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>Ram</td>
        <td colspan="2">: <input class="inputUsuario" type="text"  name="ram" id="ram" maxlength="50"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     </table>
    <br>
    <div id="divBoton">
        <button id="botonEnviar" onClick="validaForm()" type="button">Guardar</button>
        <button onclick="Menu()">Menu</button>
    </div>
   </form>
  </div>
</body>
</html>
