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
	<title>BUSQUEDA MANTENCION PREVENTIVA</title>
    
    <!-- ESTILO CSS -->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
    <!-- DEVUELVE LAS UNIDADES DEL SISTEMA -->
    <script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>
<body class="body" onload="enviaQueryUnidad('unidad','servicios/ws_getunidad.php')" >
 <div id="formContenedorbuscar">
   <div id="divcompleto">
    <form id="" action="busqueda_mantencion.php" method="get">
     <table id="miTablaUpd">
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
        <td colspan="3" align="center">FORMULARIO BUSQUEDA</td>
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
        <td>Mac</td>
        <td><input class="serie" id="mac" name="mac" type="text" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Unidad</td>
        <td>
         <select class="combobox" id="unidad" name="unidad">
          <option value="0">-- Seleccione una Unidad --</option>
         </select>        
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Usuario</td>
        <td><input class="usuario" id="usuario" name="usuario" type="text" /></td>
        <td><input id="ButtonBuscar" type="submit"  value="Buscar"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" class="cabeceratablaInt">LISTADO DE EQUIPOS</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" rowspan="4">
          <div id="divTablaInt">
            <table id="miTablaInt" border="1">
               <?
				include_once "clases/class.Inventario_pc.php";
				include_once "clases/Utiles.inc";
				
				$inv = new Inventario_pc();
				
				if (empty($_GET["mac"]))
				{		$mac = '%';//
				}else {
						$mac = $_GET["mac"];
				}
				
				if($_GET["unidad"] == "-- Seleccione una Unidad --")
				{  $unidad = '%';//
				}else{
				   $unidad = $_GET["unidad"];
				}
				
				if (empty($_GET["usuario"]))
				{		$usuario = '%';
				}else {
						$usuario = $_GET["usuario"];
				}
				
				$res = $inv ->get_inventarioequipo($mac,$usuario,$unidad);
				
			    ?>    
                <tr class="tr">	
                  <td align="center">
                   <?  $mac = $res[0]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[0]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[0]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[0]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[0]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
					<? }else if($res[0]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? } ?>
              			<br /><? echo $res[0]['nombre_usuario']?><br /><? echo $res[0]['mac']?><br /><? echo $res[0]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[1]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[1]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[1]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[1]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[1]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />      
                    <? }else if($res[1]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[1]['nombre_usuario']?><br /><? echo $res[1]['mac']?><br /><? echo $res[1]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[2]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[2]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[2]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[2]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[2]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />      
                    <? }else if($res[2]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[2]['nombre_usuario']?><br /><? echo $res[2]['mac']?><br /><? echo $res[2]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[3]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[3]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[3]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[3]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[3]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[3]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[3]['nombre_usuario']?><br /><? echo $res[3]['mac']?><br /><? echo $res[3]['ip']; ?>
                   </a>
                  </td>
                <tr>
                <tr class="tr">	
                  <td align="center">
                   <?  $mac = $res[4]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[4]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[4]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[4]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[4]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[4]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[4]['nombre_usuario']?><br /><? echo $res[4]['mac']?><br /><? echo $res[4]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[5]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[5]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[5]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[5]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[5]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[5]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[5]['nombre_usuario']?><br /><? echo $res[5]['mac']?><br /><? echo $res[5]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[6]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[6]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[6]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[6]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[6]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[6]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[6]['nombre_usuario']?><br /><? echo $res[6]['mac']?><br /><? echo $res[6]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[7]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[7]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[7]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[7]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[7]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[7]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[7]['nombre_usuario']?><br /><? echo $res[7]['mac']?><br /><? echo $res[7]['ip']; ?>
                   </a>
                  </td>
                <tr>
                <tr class="tr">	
                  <td align="center">
                   <?  $mac = $res[8]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[8]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[8]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[8]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[8]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[8]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[8]['nombre_usuario']?><br /><? echo $res[8]['mac']?><br /><? echo $res[8]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[9]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[9]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[9]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[9]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[9]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[9]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[9]['nombre_usuario']?><br /><? echo $res[9]['mac']?><br /><? echo $res[9]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[10]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[10]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[10]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[10]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[10]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[10]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[10]['nombre_usuario']?><br /><? echo $res[10]['mac']?><br /><? echo $res[10]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[11]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[11]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[11]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[11]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[11]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[11]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[11]['nombre_usuario']?><br /><? echo $res[11]['mac']?><br /><? echo $res[11]['ip']; ?>
                   </a>
                  </td>
                <tr>
                <tr class="tr">	
                  <td align="center">
                   <?  $mac = $res[12]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[12]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[12]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[12]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[12]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[12]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[12]['nombre_usuario']?><br /><? echo $res[12]['mac']?><br /><? echo $res[12]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[13]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[13]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[13]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[13]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[13]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[13]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[13]['nombre_usuario']?><br /><? echo $res[13]['mac']?><br /><? echo $res[13]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[14]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[14]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[14]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[14]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[14]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[14]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[14]['nombre_usuario']?><br /><? echo $res[14]['mac']?><br /><? echo $res[14]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[15]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[15]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[15]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[15]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[15]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[15]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[15]['nombre_usuario']?><br /><? echo $res[15]['mac']?><br /><? echo $res[15]['ip']; ?>
                   </a>
                  </td>
                <tr>
                <tr class="tr">	
                  <td align="center">
                   <?  $mac = $res[16]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[16]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[16]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[16]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[16]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[16]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[16]['nombre_usuario']?><br /><? echo $res[16]['mac']?><br /><? echo $res[16]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[17]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[17]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[17]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[17]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[17]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[17]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[17]['nombre_usuario']?><br /><? echo $res[17]['mac']?><br /><? echo $res[17]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[18]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[18]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[18]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[18]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[18]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[18]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[18]['nombre_usuario']?><br /><? echo $res[18]['mac']?><br /><? echo $res[18]['ip']; ?>
                   </a>
                  </td>
                  <td align="center">
                   <?  $mac = $res[19]['mac'];  ?>
                   <a href="historial_mantenciones.php?mac=<? echo $mac ?>">
                    <? if($res[19]['modelo_pc'] == 'Lenovo 1'){
						  ?><img src="imagenes/lenovo_1.png" />
					<? }else if($res[19]['modelo_pc'] == 'Lenovo 2'){ 
					      ?><img src="imagenes/lenovo_2.png" />
                    <? }else if($res[19]['modelo_pc'] == 'Olidata'){
						  ?><img src="imagenes/Olidata.png" />
                    <? }else if($res[19]['modelo_pc'] == 'Olidata Alicon'){
						  ?><img src="imagenes/Olidata_Alicon.png" />
                    <? }else if($res[19]['modelo_pc'] == 'Otros'){
						  ?><img src="imagenes/generico.png" />
					<? }  ?>
              			<br /><? echo $res[19]['nombre_usuario']?><br /><? echo $res[19]['mac']?><br /><? echo $res[19]['ip']; ?>
                   </a>
                  </td>
                <tr>
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
    </table>
    <div id="divBotonBuscar">
     <button onclick="Menu()">Menu</button>
    </div> 
    </form>
   </div>
</div>
</body>
</html>
