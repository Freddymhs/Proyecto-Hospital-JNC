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
<?php
//** NIVEL DEL USUARI **//
$nivel = $_POST['nivel'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HISTORIAL DEL TURNO</title>
    
    <!--ESTILO-->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
    <!--FUNCION ENTRAR MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
    <!--FUNCION ENTRAR BUSQUEDA-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_buscar.js"></script>
    <!--Funcion Salir-->
    <script type="text/javascript" type="text/javascript" src="js/funcion_salir.js"></script>
    <!--ILUMINAR TABLAS-->
 	<script language="javascript" type="text/javascript" src="js/iluminarceldas.js"></script>
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
     
    
    
</head>
<body class="body">
 <div id="formContenedorHistorial">
     <table id="miTablaHistorial">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="342">&nbsp;</td>
        <td width="181">&nbsp;</td>
        <td width="343">&nbsp;</td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" class="cabeceratabla">ORDENES DIARIAS POR TURNO</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">
          <fieldset><legend id="titulos">TURNO DIA</legend>
        	<div id="divTablaIntHistorial">
              <table id="miTablaIntHistorial">
               	<tr class="tr">
                  <th class="th" scope="col" width="70">CODIGO</th>
                  <th class="th" scope="col" width="95">FECHA</th>
                  <th class="th" scope="col" width="250">UNIDAD</th>
                  <th class="th" scope="col" width="90">ESTADO</th>
                  <th class="th" scope="col" width="250">OPERADOR</th>
                  <th class="th" scope="col">PROBLEMA</th>
                </tr>
                <?
				 	include_once "clases/class.Orden.php";
					include_once "clases/Utiles.inc";
					
					$ord= new Orden();
					$fech = new Utiles();
					
					if($dia != 0){
						$dia = $dia;
						$nivel = 1;
						$fecha = date("Y-m-d");
						$fecha = substr_replace($fecha,$dia,8,9); 
					}else{
						$fecha = $_POST["fecha"];
						$fecha = $fech->reviertefecha3($fecha);
					}
					
					$res = $ord->get_ordenturnodia($fecha);
				 
				    for ($i=0; $i < sizeof($res); $i++){
						
					  $id = $res[$i]['id_orden'];	
					  $estado = $res[$i]['estado'];
					  $fecha_inicio = $fech->reviertefecha2($res[$i]['fecha_inicio']);
					  
					  if($nivel==2){
						$estado='realizada';
					  }
					  
					  
					  echo"<tr onclick='ilumina(this)' id='celda1' name='celda1'>";
						echo"<td class='td'><a href='mostrar.php?id=$id&estado=$estado' rel='gb_page_center[822, 650]'>".$res[$i]['id_orden']."</a></td>";
						echo"<td class='td'>".$fecha_inicio."</td>";
						echo"<td class='td'>".$res[$i]['nombre_unidad']."</td>";
						echo"<td class='td'>".$res[$i]['estado']."</td>";
						echo"<td class='td'>".$res[$i]['nombre_operador']."</td>";
						echo"<td class='td'>".$res[$i]['problema']."</td>";
					  echo"</tr>";
					
					}
								 
				 ?>
              </table>
            </div>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">
         <fieldset><legend id="titulos">TURNO NOCHE</legend>
           <div id="divTablaIntHistorial">
             <table id="miTablaIntHistorial">
               <tr class="tr">
                 <th class="th" scope="col" width="70">CODIGO</th>
                 <th class="th" scope="col" width="95">FECHA</th>
                 <th class="th" scope="col" width="250">UNIDAD</th>
                 <th class="th" scope="col" width="90">ESTADO</th>
                 <th class="th" scope="col" width="250">OPERADOR</th>
                 <th class="th" scope="col">PROBLEMA</th>
                </tr>
                <?
					if($dia != 0){
						$dia = $dia;
						$fecha = date("Y-m-d");
						$fecha = substr_replace($fecha,$dia,8,9); 
					}else{
						$fecha = $_POST["fecha"];
						$fecha = $fech->reviertefecha3($fecha);
					}
					
					$res = $ord->get_ordenturnonoche($fecha);
				 
				    for ($i=0; $i < sizeof($res); $i++){
						
					  $id = $res[$i]['id_orden'];
					  $estado = $res[$i]['estado'];
					  $fecha_inicio = $fech->reviertefecha2($res[$i]['fecha_inicio']);
						
					  if($nivel==2){
						$estado='realizada';
					  }
					  
					  echo"<tr onclick='ilumina(this)' id='celda1' name='celda1'>";
						echo"<td class='td'><a href='mostrar.php?id=$id&estado=$estado' rel='gb_page_center[822, 650]'>".$res[$i]['id_orden']."</a></td>";
						echo"<td class='td'>".$fecha_inicio."</td>";
						echo"<td class='td'>".$res[$i]['nombre_unidad']."</td>";
						echo"<td class='td'>".$res[$i]['estado']."</td>";
						echo"<td class='td'>".$res[$i]['nombre_operador']."</td>";
						echo"<td class='td'>".$res[$i]['problema']."</td>";
					  echo"</tr>";
					
					}
				
				?>
             </table>
           </div>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <br>
    <?PHP
    if($nivel==1){
	?>
        <div id="divBotonHistorial">
         <button onclick="Buscar()">Buscar</button>
        </div>
        <div id="divBotonBuscar">
         <button onclick="Menu()">Salir</button>
        </div>
    <?PHP
    }
	?>
    <?PHP
    if($nivel==2){
	?>
        <div id="divBotonHistorial">
         <button onclick="BuscarBloqueado()">Buscar</button>
        </div>
        <div id="divBotonBuscar">
         <button onclick="Salir()">Salir</button>
        </div>
    <?PHP
    }
	?>
  </div>
</body>
</html>