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
	<title>Formulario Ingresos</title>  
    
    <!--ESTILO-->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
    <!--VALIDACION DEL FORMULARIO-->
    <script language="javascript" type="text/javascript" src="js/validacion.js"></script>
    <!--FUNCION RELOJ-->
 	<script language="javascript" type="text/javascript" src="funcion_reloj.js"></script>
    <!--FUNCION CARGA TODAS LA UNIDADES-->
    <script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!--FUNCION MAX DE CARACTERES AREA DE TEXTO-->
 	<script language="javascript" type="text/javascript" src="js/funcionmaxtextarea.js"></script>
    <!--FUNCION ENTRAR MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>
<body class="body" onfocus="enviaQueryUnidad('unidad','servicios/ws_getunidad.php')">
<div id="formContenedor">
 <div id="transparencia">
   <div id="transparenciaMensaje"></div>
 </div>
 <form id="formulario">
    <table id="miTabla">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="110">&nbsp;</td>
        <td width="379">&nbsp;</td>
        <td width="77">&nbsp;</td>
        <td width="274">&nbsp;</td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4" class="cabeceratabla">FORMULARIO DE INGRESO</td>
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
        <td>Operador</td>
        <td>:
        	<select name="operador">                     
			 <option value="0">-- Seleccione Operador --</option>
			 <?
				include_once "clases/class.Operador.php";
				include_once "clases/Utiles.inc";
				
				$operario = new Operador();
				
				$res = $operario->get_operador();
					for ($i=0; $i < sizeof($res); $i++){
						echo"<option value=".$res[$i]->id_operador.">".$res[$i]->nombre_operador."</option>";
					}
			 ?>
			</select> 
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Turno</td>
        <td>:
            <select name="turno">
             <option value="0">-- Seleccione Turno --</option>
             <option value="08:00-20:00">08:00 -- 20:00</option>
             <option value="20:00-08:00">20:00 -- 08:00</option>
            </select>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Fecha</td>
        <td>:
         <?php
           $fecha = date("d-m-Y");
           echo "$fecha";
          ?>
        </td>
        <td>Hora</td>
        <td><div id="debajo" class="campo"></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Unidad</td>
        <td>:
          <select class="areatexto" id="unidad"  name="unidad">
            <option value="0">--Seleccione una Unidad--</option>
          </select>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Problema</td>
        <td>:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><textarea  id="problema" name="problema" cols="55" rows="7" onKeyUp="return maximaLongitud(this,500)"></textarea></td>
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
     <button id="botonEnviar" onClick="validaForm()" type="button">Guardar</button>
     <button onclick="Menu()">Salir</button>
    </div> 
  </form>
 </div>
</div>
</body>
</html>