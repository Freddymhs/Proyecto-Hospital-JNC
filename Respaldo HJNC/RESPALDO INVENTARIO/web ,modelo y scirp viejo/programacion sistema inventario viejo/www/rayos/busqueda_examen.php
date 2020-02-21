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
	<title>Buscar Examen</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!--FUNCION CARGA TIPO EXAMEN-->
	<script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!--GREYBOX-->
    <script type="text/javascript">
        var GB_ROOT_DIR = "./greybox/greybox/";
    </script>
    <script type="text/javascript" src="greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/greybox/gb_scripts.js"></script>
    <link href="greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    <!--ILUMINAR TABLAS-->
    <script language="javascript" type="text/javascript" src="js/iluminarceldas.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>
<body class="body" onfocus="enviaQueryExamen('tipo_exam','servicios/ws_getTipoExamen.php')">
 <div id="formContenedorbuscar">
  <div id="divcompleto">
   <form id="" action="busqueda_examen.php" method="get">
	<table id="miTablaBuscar">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="160">&nbsp;</td>
        <td width="194">&nbsp;</td>
        <td width="160">&nbsp;</td>
        <td width="338">&nbsp;</td>
        <td width="30">&nbsp;</td>
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
      </tr
      ><tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr
      ><tr>
        <td>&nbsp;</td>
        <td colspan="4" class="cabeceTitulos">FORMULARIO DE BUSQUEDA</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr
      ><tr>
        <td>&nbsp;</td>
        <td>N° Examen</td>
        <td>: <input class="inputNumExamen" id="numero" name="numero" type="text" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Tipo Examen</td>
        <td colspan="3">: 
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
        <td>: <input class="inputFecha" id="inputField1" name="fecha_fin" type="text" maxlength="10" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Nombres Paciente</td>
        <td colspan="2">: <input class="inputNombres" id="nombre_pac" name="nombre_pac" type="text" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input id="ButtonBuscar" type="submit"  value="Buscar"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4" class="cabeceratablaInt">LISTA DE EXAMENES</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="4" rowspan="4">
          <div id="divTablaInt">
             <table id="miTablaInt" cellspacing="0">
              <tr class="tr">
                <th class="th" scope="col" width="90">N° Examen</th>
                <th class="th" scope="col" width="110">F. Examen</th>
                <th class="th" scope="col" width="300">Nombre Paciente</th>
                <th class="th" scope="col" width="600">Examen</th>
              </tr>
              <?
              	include_once "clases/class.Examen.php";
				include_once "clases/Utiles.inc";
				
				$examen = new Examen();
				
				if (empty($_GET["numero"]))
				{		$numero = '%';//
				}else {
						$numero = $_GET["numero"];
				}
				
				if(empty($_GET["tipo_exam"])){
				   $tipo_exam = '%';//
				}else if($_GET["tipo_exam"] == "-- Seleccione un Examen --"){
				   $tipo_exam = '%';//
				}else{
				   $tipo_exam = $_GET["tipo_exam"];
				}
				
				if(empty($_GET["fecha_inicio"])){
				   $fecha_inicio = '%';
				}else{
				   $fecha_inicio = $_GET["fecha_inicio"];
				}
				
				if(empty($_GET["fecha_fin"])){
				   $fecha_fin = '%';
				}else{
				   $fecha_fin = $_GET["fecha_fin"];
				}
				
				if (empty($_GET["nombre_pac"]))
				{		$nombre_pac = '%';//
				}else {
						$nombre_pac = $_GET["nombre_pac"];
				}
				
				$res = $examen->get_examen($numero,$tipo_exam,$fecha_inicio,$fecha_fin,$nombre_pac);
				
				for ($i=0; $i < sizeof($res); $i++){
				
					$id = $res[$i]['id_examen'];
				
					echo"<tr onclick='ilumina(this)' id='celda1' name='celda1'>";
						echo"<td class='td'><a href='visualiza_examen.php?id=$id' rel='gb_page_center[822, 480]'>".$res[$i]['num_examen']."</a></td>";
						echo"<td class='td'>".$res[$i]['examen_fecha']."</td>";
						echo"<td class='td'>".$res[$i]['examen_nombre_paciente']."</td>";
						echo"<td class='td'>".$res[$i]['tipoexamen_nombre']."</td>";
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