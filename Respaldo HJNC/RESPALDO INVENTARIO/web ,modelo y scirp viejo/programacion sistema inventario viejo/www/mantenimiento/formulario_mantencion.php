<?php
// start session
session_start();
// include config class
require_once('login.class.php');
// create instance
$Login	= new Login;
// check permission, Llama a la funcion checkauth() que permite destruir la sesion cuando apretamos 'a = logout'
$Login->checkauth();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FORMULARIO DE MANTENCION PREVENTIVA</title>
    
    <!-- ESTILO CSS -->
    <link href="css/css.css" rel="stylesheet" type="text/css" />
    <!-- DEVUELVE EL DETALLE DEL EQUIPO BUSCADO -->
    <script language="javascript" type="text/javascript" src="js/funcion_busca_equipo.js"></script>
    <!-- VALIDAR FORMULARIO-->
    <script language="javascript" type="text/javascript" src="js/validacion.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
    
</head>
<body class="body">
 <div id="formContenedor">
  <div id="divcompleto">
   <div id="transparencia">
    <div id="transparenciaMensaje"></div>
   </div>
   <form id="formulario">
 	 <table id="miTabla" border="0">
      <tr>
        <td width="12">&nbsp;</td>
        <td width="213">&nbsp;</td>
        <td width="380">&nbsp;</td>
        <td width="20">&nbsp;</td>
        <td width="60">&nbsp;</td>
        <td width="156">&nbsp;</td>
        <td width="12">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5" align="center">FORMULARIO REGISTRO MANTENCION</td>
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
        <td colspan="5">
         <fieldset>
          <legend class="titulosInt">DATOS DEL EQUIPO</legend>
           <table width="870" border="0">
              <tr>
                <td width="175">&nbsp;</td>
                <td width="314">&nbsp;</td>
                <td width="190">&nbsp;</td>
                <td width="163">&nbsp;</td>
              </tr>
              <tr>
                <td>Mac</td>
                <td><input class="inputMac" type="text" name="mac" id="mac" onkeypress="traerDatos(this.form)"/></td>
                <td>N° Inv o Serie Pc</td>
                <td><input class="inputSerie" type="text" name="serie_pc" id="serie_pc" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Ip</td>
                <td><input class="inputIp" type="text" name="ip" id="ip" disabled="disabled"/></td>
                <td>N° Inv o Serie Monitor</td>
                <td><input class="inputSerie" type="text" name="serie_monitor" id="serie_monitor" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Grupo de Trabajo</td>
                <td><input class="inputGrupo" type="text"  name="grupo" id="grupo" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Unidad</td>
                <td><input class="inputUnidad" type="text" name="unidad" id="unidad" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Netbios</td>
                <td><input class="inputUsuario" type="text" name="net" id="net" disabled="disabled"/></td>
                <td>Modelo Pc</td>
                <td><input class="inputSerie" type="text" name="modelo_pc" id="modelo_pc" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Usuario</td>
                <td><input class="inputUsuario" type="text"  name="usuario" id="usuario" disabled="disabled"/></td>
                <td>Modelo Monitor</td>
                <td><input class="inputSerie" type="text" name="modelo_mon" id="modelo_mon" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Procesador</td>
                <td><input class="inputUsuario" type="text"  name="procesador" id="procesador" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Disco Duro</td>
                <td><input class="inputUsuario" type="text"  name="disco_duro" id="disco_duro" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Memoria RAM</td>
                <td><input class="inputUsuario" type="text"  name="ram" id="ram" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
           </table>
         </fieldset>
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5">
         <fieldset>
          <legend class="titulosInt">INGRESAR DATOS MANTENCION</legend>
            <table width="870" border="0">
              <tr>
                <td width="175">&nbsp;</td>
                <td width="314">&nbsp;</td>
                <td width="190">&nbsp;</td>
                <td width="163">&nbsp;</td>              
              </tr>
              <tr>
                <td>Técnico</td>
                <td>
                 <select class="combobox" id="tecnico" name="tecnico">
                  <option value="0">-- Seleccione un Técnico --</option>
                  <option value="Pablo Leiva">Pablo Leiva</option>
                  <option value="Jeffers Castro">Jeffers Castro</option>
                  <option value="Adrián Prieto">Adrián Prieto</option>
		  <option value="Daniel Fooks">Daniel Fooks</option>
                 </select>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">Mantención Preventiva</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><textarea class="areatexto" id="mant_prev" name="mant_prev" cols="45" rows="5">- Diagnostico de Software y SO.
- Limpiezas temporales y registros de internet de Windows. 
- Actualizacion de Antivirus, Windows, Anti espias.
- Deteccion y eliminación de virus, troyanos, spyware.
- Soporte a usuarios.
- Solucion problema de conectividad de redes. 
                 </textarea></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">Mantención Correctiva</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3"><textarea class="areatexto2" id="mant_correct" name="mant_correct" cols="45" rows="5">- Limpieza interna y externa del PC.
- Limpieza ventilacion y coolers del PC.
- Limpieza de teclado.
- Limpieza de monitor.
- Cambio de piezas con problemas detectados. 
- Limpieza interna y externa impresoras.
- Se realiza un respaldo de toda la informacion del equipo.
- Se reinstala el Sistema Operativo del equipo.
- Se instalan todos los programas, antivirus y actualizaciones.
- Se copian todos los datos respaldados previamente. 
                 </textarea></td>
              </tr>
              <tr>
                <td>F. Actual Mantención</td>
                <td>
                 <?php
					$fecha = date("d-m-Y");
					echo "$fecha";
				 ?>
                </td>
                <td>Días Asignados</td>
                <td>
                 <select id="dias" name="dias">
                  <option value="0"> --Días-- </option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                 </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
         </fieldset>
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
        <td>&nbsp;</td>
      </tr>
    </table>
    <div id="divBoton">
     <button id="botonEnviar" onClick="validaForm()" type="button">Guardar</button>
     <button onclick="Menu()">Menu</button>
    </div> 
   </form> 
  </div>  
 </div>
</body>
</html>