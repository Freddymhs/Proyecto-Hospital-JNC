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
	<title>Ingresar Examne</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- FUNCION VALIDA FORMULARIO-->
    <script language="javascript" type="text/javascript" src="js/validacion.js"></script>
    <!--FUNCION CARGA LAS UNIDADES-->
	<script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
    <!--FUNCION JQUERY-->
    <script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
    <!--FUNCION OCULTA DIV--->
	<script language="javascript" type="text/javascript" src="js/funcion_agrega_select.js"></script>

</head>
<body class="body" onfocus="enviaQueryUnidad('unidad','servicios/ws_getunidad.php')">
<div id="formContenedor">
 <div id="transparencia">
  <div id="transparenciaMensaje"></div>
 </div>
 <form id="formulario" name="formulario">
  <table border="0" id="TablaRegistro">
   <tr>
    <td width="20">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="335">&nbsp;</td>
    <td width="142">&nbsp;</td>
    <td width="242">&nbsp;</td>
    <td width="20">&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="4" class="cabeceTitulos">FORMULARIO INGRESO DE EXAMENES</td>
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
    <td>N° Examen</td>
    <td>: <input class="inputNumExamen" id="numero" name="numero" type="text" maxlength="15"/></td>
    <td>Fecha Examen</td>
    <td>: <input class="inputFecha" id="inputField" name="fecha_exam" type="text" maxlength="10"/></td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Nombre Paciente</td>
    <td>: <input class="inputNombres" id="nombre_pac" name="nombre_pac" type="text" /></td>
    <td>Fecha Retorno</td>
    <td>: <input class="inputFecha" id="inputField1" name="fecha_ret" type="text" maxlength="10"/></td>
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
    <td>Tipo Examen</td>
    <td colspan="3">:
      <select id="exam" name="exam">
        <option value="0">-- Seleccione Examen --</option>
        <?
                include_once "clases/class.TipoExamen.php";
                
                $tec = new TipoExamen();
                
                $res = $tec->get_tipoExamen();
                for ($i=0; $i < sizeof($res); $i++){
                    echo"<option value=".$res[$i]->id_tipoexamen.">".$res[$i]->tipoexamen_nombre."</option>";
                }
            ?>
        </select>
      <button id="buttonAddSelect">+</button>
    </td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Tipo Examen 2</td>
    <td colspan="3">
     <div id="tipo_exam2" style="display:none;"> :
      <select id="exam2" name="exam2">
        <option value="0">-- Seleccione Examen --</option>
        <?
                include_once "clases/class.TipoExamen.php";
                
                $tec = new TipoExamen();
                
                $res = $tec->get_tipoExamen();
                for ($i=0; $i < sizeof($res); $i++){
                    echo"<option value=".$res[$i]->id_tipoexamen.">".$res[$i]->tipoexamen_nombre."</option>";
                }
            ?>
        </select>
      <button id="buttonAddSelect2">+</button>
	  <button id="buttonDelSelect2">-</button>
     </div>
    </td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Tipo Examen 3</td>
    <td colspan="3">
     <div id="tipo_exam3" style="display:none;"> :
      <select id="exam3" name="exam3">
        <option value="0">-- Seleccione Examen --</option>
        <?
                include_once "clases/class.TipoExamen.php";
                
                $tec = new TipoExamen();
                
                $res = $tec->get_tipoExamen();
                for ($i=0; $i < sizeof($res); $i++){
                    echo"<option value=".$res[$i]->id_tipoexamen.">".$res[$i]->tipoexamen_nombre."</option>";
                }
            ?>
        </select>
      <button id="buttonAddSelect3">+</button>
	  <button id="buttonDelSelect3">-</button>
     </div>
    </td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Tipo Examen 4</td>
    <td colspan="3">
     <div id="tipo_exam4" style="display:none;"> :
      <select id="exam4" name="exam4">
        <option value="0">-- Seleccione Examen --</option>
        <?
                include_once "clases/class.TipoExamen.php";
                
                $tec = new TipoExamen();
                
                $res = $tec->get_tipoExamen();
                for ($i=0; $i < sizeof($res); $i++){
                    echo"<option value=".$res[$i]->id_tipoexamen.">".$res[$i]->tipoexamen_nombre."</option>";
                }
            ?>
        </select>
      <button id="buttonAddSelect4">+</button>
	  <button id="buttonDelSelect4">-</button>
     </div>
    </td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Tipo Examen 5</td>
    <td colspan="3">
     <div id="tipo_exam5" style="display:none;"> :
      <select id="exam5" name="exam5">
        <option value="0">-- Seleccione Examen --</option>
        <?
                include_once "clases/class.TipoExamen.php";
                
                $tec = new TipoExamen();
                
                $res = $tec->get_tipoExamen();
                for ($i=0; $i < sizeof($res); $i++){
                    echo"<option value=".$res[$i]->id_tipoexamen.">".$res[$i]->tipoexamen_nombre."</option>";
                }
            ?>
        </select>
	  <button id="buttonDelSelect5">-</button>
     </div>
    </td>
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
    <td>Procedencia</td>
    <td>: 
       <select id="unidad" name="unidad">
         <option value="0">-- Seleccione Servicio --</option>
         <option value=""></option>
        </select>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Estado</td>
    <td>: 
    	<select id="estado" name="estado">
         <option value="0">-- Seleccione Estado --</option>
         <option value="Normal">Normal</option>
         <option value="Urgente">Urgente</option>
         <option value="Critica">Crítica</option>
        </select>
    </td>
    <td>Destino</td>
    <td>: 
    	<select id="destino" name="destino">
         <option value="0">-- Seleccione Destino --</option>
         <option value="Arica">Arica</option>
         <option value="Santiago">Santiago</option>
        </select>
    </td>
    <td>&nbsp;</td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Diagnostico</td>
    <td colspan="2">: <input class="inputDiagnostico" id="diag" name="diag" type="text"  maxlength="100"/></td>
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
  <br>
  <div id="divBoton">
    <input type="hidden" id="usuario" name="usuario" value="<? echo $username ?>" />
    <button id="botonEnviar" onClick="validaForm()" type="button">Guardar</button>
    <button onclick="Menu()">Menu</button>
  </div>
 </form>
</div>
</body>
</html>