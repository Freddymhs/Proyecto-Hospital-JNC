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
	<title>HISTORIAL DEL INVENTARIO</title>
    
    <!-- ESTILO CSS -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- DEVUELVE EL DETALLE DEL EQUIPO BUSCADO -->
    <script language="javascript" type="text/javascript" src="js/funcion_busca_equipo.js"></script>
</head>
<body onload="traerDatos(this.form)">
 <div id="divcompletoHistorial">
     <table id="miTablaUpdHistorial">
      <tr>
        <td width="1">&nbsp;</td>
        <td width="160">&nbsp;</td>
        <td width="300">&nbsp;</td>
        <td width="300">&nbsp;</td>
        <td width="1">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" align="center">FORMULARIO HISTORIAL</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">
         <fieldset>
          <legend class="titulosInt">DATOS DEL EQUIPO</legend>
           <table width="800" border="0">
              <tr>
                <td width="142">&nbsp;</td>
                <td width="337">&nbsp;</td>
                <td width="147">&nbsp;</td>
                <td width="156">&nbsp;</td>
              </tr>
              <tr>
                <td>Mac</td>
                <td>: <input class="inputMac" type="text" name="mac" id="mac" value="<? $mac = $mac; echo $mac; ?>" disabled="disabled"/>
                </td>
                <td>N° Inv/Serie Pc</td>
                <td>: <input class="inputSerie" type="text" name="serie_pc" id="serie_pc" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Ip</td>
                <td>: <input class="inputIp" type="text" name="ip" id="ip" disabled="disabled"/></td>
                <td>N° Inv/Serie Mon</td>
                <td>: <input class="inputSerie" type="text" name="serie_monitor" id="serie_monitor" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Grupo de Trabajo</td>
                <td>: <input class="inputGrupo" type="text"  name="grupo" id="grupo" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Unidad</td>
                <td>: <input class="inputUnidad" type="text" name="unidad" id="unidad" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Netbios</td>
                <td>: <input class="inputUsuario" type="text" name="net" id="net" disabled="disabled"/></td>
                <td>Modelo Pc</td>
                <td>: <input class="inputSerie" type="text" name="modelo_pc" id="modelo_pc" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Usuario</td>
                <td>: <input class="inputUsuario" type="text"  name="usuario" id="usuario" disabled="disabled"/></td>
                <td>Modelo Monitor</td>
                <td>: <input class="inputSerie" type="text" name="modelo_mon" id="modelo_mon" disabled="disabled"/></td>
              </tr>
              <tr>
                <td>Procesador</td>
                <td>: <input class="inputUsuario" type="text"  name="procesador" id="procesador" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Disco Duro</td>
                <td>: <input class="inputUsuario" type="text"  name="disco_duro" id="disco_duro" disabled="disabled"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Memoria RAM</td>
                <td>: <input class="inputUsuario" type="text"  name="ram" id="ram" disabled="disabled"/></td>
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
        <td colspan="3" class="cabeceratablaInt">HISTORIAL DE CAMBIOS</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" rowspan="4">
          <div id="divTablaIntHistorial">
            <table id="miTablaIntHistorial" cellspacing="0">
              <tr class="trHistorial">
                <th class="thHistorial" scope="col" width="20">USUARIO</th>
                <th class="thHistorial" scope="col" width="14">MODELO</th>
                <th class="thHistorial" scope="col" width="14">SERIE</th>
                <th class="thHistorial" scope="col" width="22">FECHA</th>
                <th class="thHistorial" scope="col" width="60">PROCESADOR</th>
                <th class="thHistorial" scope="col" width="10">HDD</th>
                <th class="thHistorial" scope="col" width="10">RAM</th>
              </tr>
             <?
			 	include_once "clases/class.Basedato.php";
				include_once "clases/class.Historial.php";
				include_once "clases/Utiles.inc";
				
				$hist = new Historial();
				
				$res = $hist->get_historial($id);
				
				for ($i=0; $i < sizeof($res); $i++){
				
					echo"<tr>";
						echo"<td class='tdHistorial'>".$res[$i]['usuario_cambio']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['his_modelo_pc']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['his_serie_pc']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['fecha_cambio']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['his_procesador']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['his_disco_duro']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['his_ram']."</td>";
					echo"</tr>";
				}
		     ?>
            </table>
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div> 
</body>
</html>