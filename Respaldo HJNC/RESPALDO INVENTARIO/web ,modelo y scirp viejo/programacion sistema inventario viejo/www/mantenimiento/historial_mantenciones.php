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
	<title>HISTORIAL MANTENCION PREVENTIVA</title>
    
    <!-- ESTILO CSS -->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
    <!-- GREYBOX -->
	<script type="text/javascript">
        var GB_ROOT_DIR = "./greybox/greybox/";
    </script>
    
    <script type="text/javascript" src="greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/greybox/gb_scripts.js"></script>
    <link href="greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    
    <script type="text/javascript" src="greybox/static_files/help.js"></script>
    <link href="greybox/static_files/help.css" rel="stylesheet" type="text/css" media="all" />
    <!-- DEVUELVE EL DETALLE DEL EQUIPO BUSCADO -->
    <script language="javascript" type="text/javascript" src="js/funcion_busca_equipo.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>
<body class="body" onfocus="traerDatos(this.form)">
 <div id="formContenedorhistorial">
   <div id="divcompletoHistorial">
     <table id="miTablaUpdHistorial">
      <tr>
        <td width="14">&nbsp;</td>
        <td width="185">&nbsp;</td>
        <td width="350">&nbsp;</td>
        <td width="337">&nbsp;</td>
        <td width="30">&nbsp;</td>
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
        <td colspan="3" align="center">FORMULARIO HISTORIAL</td>
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
        <td colspan="3">
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
                <td><input class="inputMac" type="text" name="mac" id="mac" value="<? $mac = $mac; echo $mac; ?>" disabled="disabled"/></td>
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
        <td colspan="3" class="cabeceratablaInt">HISTORIAL DE MANTENCIONES</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" rowspan="4">
          <div id="divTablaIntHistorial">
            <table id="miTablaIntHistorial" cellspacing="0">
              <tr class="trHistorial">
                <th class="thHistorial" scope="col" width="14">CODIGO</th>
                <th class="thHistorial" scope="col" width="22">FECHA</th>
                <th class="thHistorial" scope="col" width="60">UNIDAD</th>
                <th class="thHistorial" scope="col" width="60">TECNICO</th>
                <th class="thHistorial" scope="col" width="5">DIAS</th>
              </tr>
          
          
             <?
				include_once "clases/class.Mantencion.php";
				include_once "clases/Utiles.inc";
				
				$mat = new Mantencion();
				
				$res = $mat->get_mantencion($mac);
				
				for ($i=0; $i < sizeof($res); $i++){
				
					$id = $res[$i]['id_mantencion'];
					
					echo"<tr>";
		echo"<td class='tdHistorial'><a href='mantencion_detalle.php?id=$id' rel='gb_page_center[822, 650]'>".$res[$i]['id_mantencion']."</a></td>";
					    echo"<td class='tdHistorial'>".$res[$i]['fecha_actual_mantencion']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['nombre_unidad']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['nombre_tecnico']."</td>";
						echo"<td class='tdHistorial'>".$res[$i]['dias_asignados']."</td>";
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
    <div id="divBotonBuscar">
     <button onclick="VolverHistorial()">Menu</button>
    </div> 
   </div>
  </div>
</body>
</html>
