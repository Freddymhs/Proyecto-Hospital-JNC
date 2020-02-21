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
	<title>FORMULARIO DE BUSQUEDA</title>
    <!-- ESTILO CSS -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- FUNCION CARGA UNIDADES -->
    <script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!--GREYBOX-->
    <script type="text/javascript">
        var GB_ROOT_DIR = "./greybox/greybox/";
    </script>
    
    <script type="text/javascript" src="greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/greybox/gb_scripts.js"></script>
    <link href="greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="greybox/static_files/help.js"></script>
    <link href="greybox/static_files/help.css" rel="stylesheet" type="text/css" media="all" />
    
    <!--ILUMINAR TABLAS-->
    <script language="javascript" type="text/javascript" src="js/iluminarceldas.js"></script>
    <!--FUNCION ENTRAR MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>
<body class="body" onfocus="enviaQueryUnidad('unidad','servicios/ws_getunidad.php')">
 <div id="formContenedorbuscar">
   <div id="divcompleto">
    <form id="" action="formulario_busqueda_historial.php" method="get">
	 <table id="miTablaBuscar">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="163">&nbsp;</td>
        <td width="344">&nbsp;</td>
        <td width="319">&nbsp;</td>
        <td width="20">&nbsp;</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr
      ><tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr
      ><tr>
        <td>&nbsp;</td>
        <td colspan="3" class="cabeceratabla">FORMULARIO DE BUSQUEDA</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr
      ><tr>
        <td>&nbsp;</td>
        <td>Mac</td>
        <td><input class="inputMac" type="text" name="mac" id="mac" maxlength="17"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Ip</td>
        <td><input class="inputIp" type="text" name="ip" id="ip" maxlength="15"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Unidad</td>
        <td>
         <select class="select" id="unidad" name="unidad">
          <option value="0">-- Seleccione una Unidad --</option>
         </select>        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Usuario</td>
        <td><input class="inputUsuario" type="text" name="nombre" id="nombre"  maxlength="50"></td>
        <td><input id="ButtonBuscar" type="submit"  value="Buscar"/></td>
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
        <td colspan="3" class="cabeceratablaInt">LISTA DE INVENTARIO</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" rowspan="4">
          <div id="divTablaInt">
             <table id="miTablaInt" cellspacing="0">
              <tr class="tr">
                <th class="th" scope="col" width="80">CODIGO</th>
                <th class="th" scope="col" width="130">IP</th>
                <th class="th" scope="col" width="200">MAC</th>
                <th class="th" scope="col" width="300">UNIDAD</th>
                <th class="th" scope="col" width="30">RED</th>
                <th class="th" scope="col" width="380">USUARIO</th>
                <th class="th" scope="col" width="180">CRUPO TRABAJO</th>
                <th class="th" scope="col" width="200">NETBIOS</th>
                <th class="th" scope="col" width="300">IMPRESORA</th>
                <th class="th" scope="col" width="90">TELEFONO</th>
                <th class="th" scope="col" width="200">PERTENECE</th>
                <th class="th" scope="col" width="170">SERIE PC</th>
                <th class="th" scope="col" width="170">SERIE MONT</th>
                <th class="th" scope="col" width="170">MODELO PC</th>
                <th class="th" scope="col" width="170">MODELO MONT</th>
                <th class="th" scope="col" width="400">PROCESADOR</th>
                <th class="th" scope="col" width="90">HDD</th>
                <th class="th" scope="col" width="90">RAM</th>
              </tr>
              <?
              	include_once "clases/class.Inventario_pc.php";
				include_once "clases/Utiles.inc";
				
				$inv = new Inventario_pc();
				
				if (empty($_GET["mac"]))
				{		$mac = '%';//
				}else {
						$mac = $_GET["mac"];
				}
				
				if (empty($_GET["ip"]))
				{		$ip = '%';
				}else {
						$ip = $_GET["ip"];
				}
				
				if($_GET["unidad"] == "-- Seleccione una Unidad --"){
				   $unidad = '%';//
				}else{
				   $unidad = $_GET["unidad"];
				}
				
				if (empty($_GET["nombre"]))
				{		$nombre = '%';
				}else {
						$nombre = $_GET["nombre"];
				}
				
				$res = $inv->get_inventarioall($mac,$ip,$unidad,$nombre);
				
				for ($i=0; $i < sizeof($res); $i++){
				
					$mac = $res[$i]['mac'];
					$id  = $res[$i]['id_inventario'];
				
					echo"<tr onclick='ilumina(this)' id='celda1' name='celda1'>";
						echo"<td class='td'><a href='formulario_ver_historial.php?id=$id&mac=$mac' rel='gb_page_center[840,690]'>".$res[$i]['id_inventario']."</a></td>";
						echo"<td class='td'>".$res[$i]['ip']."</td>";
						echo"<td class='td'>".$res[$i]['mac']."</td>";
						echo"<td class='td'>".$res[$i]['nombre_unidad']."</td>";
						echo"<td class='td'>".$res[$i]['red']."</td>";
						echo"<td class='td'>".$res[$i]['nombre_usuario']."</td>";
						echo"<td class='td'>".$res[$i]['grupo_trabajo']."</td>";
						echo"<td class='td'>".$res[$i]['netbios']."</td>";
						echo"<td class='td'>".$res[$i]['impresora']."</td>";
						echo"<td class='td'>".$res[$i]['telefono']."</td>";
						echo"<td class='td'>".$res[$i]['establecimiento']."</td>";
						echo"<td class='td'>".$res[$i]['serie_pc']."</td>";
						echo"<td class='td'>".$res[$i]['serie_monitor']."</td>";
						echo"<td class='td'>".$res[$i]['modelo_pc']."</td>";
						echo"<td class='td'>".$res[$i]['modelo_monitor']."</td>";
						echo"<td class='td'>".$res[$i]['procesador']."</td>";
						echo"<td class='td'>".$res[$i]['disco_duro']."</td>";
						echo"<td class='td'>".$res[$i]['ram']."</td>";
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
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     </table>
    </form>
    <div id="divBotonBuscar">
     <button onclick="Menu()">Menu</button>
    </div>
   </div>
 </div>
</body>
</html>
