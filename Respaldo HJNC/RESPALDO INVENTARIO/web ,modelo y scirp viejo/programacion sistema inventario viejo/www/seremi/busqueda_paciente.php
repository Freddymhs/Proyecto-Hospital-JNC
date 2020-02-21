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
	<title>Busqueda de Pacientes</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!--VALIDA RUT-->
    <script language="javascript" type="text/javascript" src="js/funcion_validarut.js" ></script>
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    <!--GREYBOX-->
    <script type="text/javascript">
        var GB_ROOT_DIR = "./greybox/greybox/";
    </script>
    
    <script type="text/javascript" src="greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/greybox/gb_scripts.js"></script>
    <link href="greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>

<body class="body">
 <div id="formContenedorbuscar">
   <div id="divcompleto">
    <form id="formulario" name="formalario" action="busqueda_paciente.php" method="get">
	 <table id="miTablaUpd">
      <tr>
        <td width="19">&nbsp;</td>
        <td width="180">&nbsp;</td>
        <td width="350">&nbsp;</td>
        <td width="337">&nbsp;</td>
        <td width="30">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" class="cabeceTitulos">FORMULARIO BUSQUEDA</td>
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
        <td>Rut</td>
        <td>:
          <input class="inputRut" name="rut" id="rut" type="text" maxlength="12" onblur="return Rut(formulario.rut.value)" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input id="ButtonBuscar" type="submit"  value="Buscar"/></td>
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
        <td colspan="3" class="cabeceratablaInt">INFORMACION DEL PACIENTE</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" rowspan="4">
          <div id="divTablaInt">
           <table id="miTablaInt" cellspacing="0">
              <tr class="tr">
                <th class="th" scope="col" width="120">CODIGO</th>
                <th class="th" scope="col" width="120">F. FICHA</th>
                <th class="th" scope="col" width="120">RUT</th>
                <th class="th" scope="col" width="480">NOMBRE</th>
              </tr>
              <?
			  	include_once "clases/class.Ficha.php";
				include_once "clases/Utiles.inc";
				
				$ficha = new Ficha();
				
				if(empty($_GET["rut"])){
				   $rut = '0';//0
				}else{
				   $rut = $_GET["rut"];
				}
				
				$res = $ficha->get_registro($rut);
				
				for ($i=0; $i < sizeof($res); $i++){
				
					$id = $res[$i]['id_ficha'];
				
					echo"<tr id='celda1' name='celda1'>";
					  if($tipo_usuario == 1){
						echo"<td class='td'><a href='actualiza_paciente.php?id=$id' rel='gb_page_center[822, 570]'>".$res[$i]['id_ficha']."</a></td>";
					  }else{
						echo"<td class='td'>".$res[$i]['id_ficha']."</td>";
					  }
						echo"<td class='td'>".$res[$i]['num_ficha']."</td>";
						echo"<td class='td'>".$res[$i]['rut_pac']."</td>";
						echo"<td class='td'>".$res[$i]['nombre']."</td>";
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
    <div id="divBotonBuscar">
     <button onclick="Menu()">Menu</button>
    </div>
   </div>
  </div>
</body>
</html>