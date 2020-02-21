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
	<title>FORMULARIO DE ACTUALIZACION</title>
    <!-- ESTILO CSS -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- FUNCION CARGA UNIDADES -->
    <script language="javascript" type="text/javascript" src="js/funcionesajax.js"></script>
    <!-- FUNCINO VALIDA FORMULARIO -->
    <script language="javascript" type="text/javascript" src="js/validacion_upd.js"></script>
    <!-- FUNCINO VALIDA FORMULARIO -->
    <script language="javascript" type="text/javascript" src="js/validacion_upd_cambio.js"></script>
    <!--FUNCION CARGAR INPUT CON OPCION SELECT-->
    <script language="javascript" type="text/javascript" src="js/funcionselectmodeloupd.js"></script>
    
</head>
<body class="bodyupdate">
 <form id="formContenedorUpdate">
   <div id="transparenciaUpd">
    <div id="transparenciaMensajeUpd"></div>
   </div>
	 <table id="miTablaUpdate"> 
      <tr>
        <td width="12">&nbsp;</td>
        <td width="184">&nbsp;</td>
        <td width="344" colspan="2" class="cabeceratablaupdate">FORMULARIO DE ACTUALIZACION</td>
        <td width="150">&nbsp;</td>
        <td width="12">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?
	  	include_once "clases/class.Inventario_pc.php";
		include_once "clases/Utiles.inc";
		
		$id_mant = $id;
		
		$inv = new Inventario_pc();
		
		$res = $inv->get_inventario($id);
		
		for ($i=0; $i < sizeof($res); $i++){
	  ?>
          <tr>
            <td>&nbsp;</td>
            <td>Ip</td>
            <td colspan="2"><input class="inputIpUpd" type="text" value="<?php echo $res[$i]['ip']; ?>" name="ip" id="ip" maxlength="15"></td>
            <td><input  name="id" id="id" type="hidden" value="<?php echo $id_mant; ?>" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Mac</td>
            <td colspan="2"><input class="inputMacUpd" type="text" value="<?php echo $res[$i]['mac']; ?>" name="mac" id="mac" maxlength="17"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Red</td>
            <td colspan="2"><input class="inputRedUpd" type="text" value="<?php echo $res[$i]['red']; ?>" name="red" id="red" maxlength="4"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Grupo de Trabajo</td>
            <td colspan="2"><input class="inputGrupoUpd" type="text"  value="<?php echo $res[$i]['grupo_trabajo']; ?>" name="grupo" id="grupo" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      <tr>
        <td class="tdformupd">&nbsp;</td>
        <td>Unidad</td>
        <td colspan="2">
           <select class='select' id='unidad' name='unidad'>
             	<option value="<?php echo $res[$i]['id_unidad']; ?>"><?php echo $res[$i]['nombre_unidad']; ?></option>
         <?
            }
         ?>
           		<option value="0">-- Seleccione una Unidad --</option>
                <?
				
				$res = $inv->get_unidadupd();
				
					for ($i=0; $i < sizeof($res); $i++){
						echo"<option value=".$res[$i]['id_unidad'].">".$res[$i]['nombre_unidad']."</option>";
					}
				?>
           </select>                    
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?
	    $res = $inv->get_inventario($id);
		
		for ($i=0; $i < sizeof($res); $i++){
      ?>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Netbios</td>
            <td colspan="2"><input class="inputUsuarioUpd" type="text" value="<?php echo $res[$i]['netbios']; ?>" name="net" id="net" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Usuario</td>
           <td colspan="2"><input class="inputUsuarioUpd" type="text" value="<?php echo $res[$i]['nombre_usuario']; ?>" name="usuario" id="usuario" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Impresora</td>
           <td colspan="2"><input class="inputUsuarioUpd" type="text" value="<?php echo $res[$i]['impresora']; ?>"  name="impresora" id="impresora" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Telefono</td>
            <td colspan="2"><input class="inputTelefonoUpd" type="text" value="<?php echo $res[$i]['telefono']; ?>" name="telefono" id="telefono" maxlength="6"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Establecimiento</td>
            <td colspan="2">Hospital Dr Juan Noe</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>N° Inv o Serie Pc</td>
            <td colspan="2"><input class="inputSerieUpd" type="text" value="<?php echo $res[$i]['serie_pc']; ?>" name="serie_pc" id="serie_pc" maxlength="15"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>N° Inv o Serie Mont</td>
  <td colspan="2"><input class="inputSerieUpd" type="text" value="<?php echo $res[$i]['serie_monitor']; ?>" name="serie_monitor" id="serie_monitor" maxlength="15"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Modelo Pc</td>
            <td>
            	<?
				$mod = $res[$i]['modelo_pc'];
				
				switch($mod){
					case "Otros" :
					?><input name="num" id="num" value="0" type="hidden" /><?
					echo"<select class='select' id='modelo_pc'  name='modelo_pc' onchange='selecOp()'>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
					
					case "Lenovo 1" :
					?><input name="num" id="num" value="1" type="hidden" /><?
					echo"<select class='select' id='modelo_pc1'  name='modelo_pc1' onchange='selecOp()'>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
					
					case "Lenovo 2" :
					?><input name="num" id="num" value="2" type="hidden" /><?
					echo"<select class='select' id='modelo_pc2'  name='modelo_pc2' onchange='selecOp()'>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
					
					case "Olidata":
					?><input name="num" id="num" value="3" type="hidden" /><?
					echo"<select class='select' id='modelo_pc3'  name='modelo_pc3' onchange='selecOp()'>";
					    echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
					
					case "Olidata Alicon":
					?><input name="num" id="num" value="4" type="hidden" /><?
					echo"<select class='select' id='modelo_pc4'  name='modelo_pc4' onchange='selecOp()'>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
					
					case "HP ProOne 400 G1":
					?><input name="num" id="num" value="5" type="hidden" /><?
					echo"<select class='select' id='modelo_pc5'  name='modelo_pc5' onchange='selecOp()'>";
					    echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
					
					case "HP EliteDesk 800 G1":
					?><input name="num" id="num" value="6" type="hidden" /><?
					echo"<select class='select' id='modelo_pc6'  name='modelo_pc6' onchange='selecOp()'>";
					    echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo thinkCentre</option>";
					echo"</select>";
					break;

					//nuevo//

					case "Lenovo Thinkcentre M700z":
					?><input name="num" id="num" value="7" type="hidden" /><?
					echo"<select class='select' id='modelo_pc7'  name='modelo_pc7' onchange='selecOp()'>";
					    echo"<option value='Lenovo Thinkcentre M700z'>Lenovo Thinkcentre M700z</option>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
					echo"</select>";
					break;
					
					case 0:
					?><input name="num" id="num" value="0" type="hidden" /><?
					echo"<select class='select' id='modelo_pc'  name='modelo_pc' onchange='selecOp()'>";
						echo"<option value='Otros'>GENERICO</option>";
						echo"<option value='Lenovo 1'>LENOVO 1</option>";
						echo"<option value='Lenovo 2'>LENOVO 2</option>";
						echo"<option value='Olidata'>OLIDATA</option>";
						echo"<option value='Olidata Alicon'>OLIDATA ALICON</option>";
						echo"<option value='HP ProOne 400 G1'>HP ProOne 400 G1</option>";
						echo"<option value='HP EliteDesk 800 G1'>HP EliteDesk 800 G1</option>";
						echo"<option value='Lenovo Thincentre M700z'>Lenovo ThinkCentre</option>";
					echo"</select>";
					break;
				}
				?>   
            </td>
            <td>Modelo Monitor</td>
            <td colspan="2">
               <select class="select" id="modelo_mon"  name="modelo_mon" >
				<?
                $mod_mon = $res[$i]['modelo_monitor'];
                
				switch($mod_mon){
					case "CRT 14": 
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
					break;
					case "CRT 15": 
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
					break;
					case "CRT 17":
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
					break;
					case "CRT 19": 
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
					break;
					case "LCD 15":
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
					break;
					case "LCD 17": 
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
					break;
					case "LCD 19": 
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
					break;
					case "Integrada All-One": 
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
					break;
					case "Otros": 
						echo"<option value='Otros'>Otros</option>";
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
					break;
					case 0: 
						echo"<option value='CRT 14'>CRT 14</option>";
						echo"<option value='CRT 15'>CRT 15</option>";
						echo"<option value='CRT 17'>CRT 17</option>";
						echo"<option value='CRT 19'>CRT 19</option>";
						echo"<option value='LCD 15'>LCD 15</option>";
						echo"<option value='LCD 17'>LCD 17</option>";
						echo"<option value='LCD 19'>LCD 19</option>";
						echo"<option value='Integrada All-One'>Integrada All-One</option>";
						echo"<option value='Otros'>Otros</option>";
					break;
				}
                ?>
              </select> 
            </td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Procesador</td>
         <td colspan="2"><input class="inputUsuarioUpd" type="text" value="<?php echo $res[$i]['procesador']; ?>" name="procesador" id="procesador" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Disco Duro</td>
         <td colspan="2"><input class="inputUsuarioUpd" type="text" value="<?php echo $res[$i]['disco_duro']; ?>" name="disco_duro" id="disco_duro" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="tdformupd">&nbsp;</td>
            <td>Ram</td>
            <td colspan="2"><input class="inputUsuarioUpd" value="<?php echo $res[$i]['ram']; ?>" type="text"  name="ram" id="ram" maxlength="50"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      <?
		}
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
     </table>
    <br>
    <div id="divBotonUpdate">
        <button id="botonEnviar" onClick="validaForm()" type="button">Actualizar</button>
        <button id="botonEnviar" onClick="validaFormCambio()" type="button">Recambio</button>
        <input name="username" type="hidden" value="<?php echo $username; ?>" />
    </div>
 </form>
</body>
</html>
