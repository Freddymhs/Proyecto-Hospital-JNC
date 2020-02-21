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
<?
include_once "clases/class.Orden.php";
include_once "clases/Utiles.inc";

$id_orden = $id;

$ord= new Orden();
$ut = new Utiles();

$res = $ord->get_ordenid($id_orden);

for ($i=0; $i < sizeof($res); $i++){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>DETALLE ORDEN</title>
    <!--ESTILO-->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="formContenedorDetalle">
  <div class="cabeceratablaupdate">ACTUALIZAR ORDEN</div>
   <table id="miTablaDetalle">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="678">&nbsp;</td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
         <fieldset class="titulosInt"><legend>DATOS DE ORDEN</legend>
         <table id="miTablaIntDetalle">
          <tr>
            <td width="18">&nbsp;</td>
            <td width="110">Codigo</td>
            <td width="270" class="tdrespuesta">: <? echo $res[$i]['id_orden']?></td>
            <td width="59">Fecha</td>
            <td width="298" class="tdrespuesta">: <? $fecha_inicio = $res[$i]['fecha_inicio'];
												     $fecha_inicio = $ut->reviertefecha2($fecha_inicio); 
												     echo $fecha_inicio ?></td>
            <td width="17">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Unidad</td>
            <td class="tdrespuesta">: <? echo $res[$i]['nombre_unidad']?></td>
            <td>Hora</td>
            <td class="tdrespuesta">: <? echo $res[$i]['hora_inicio']?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Turno</td>
            <td class="tdrespuesta">: <? echo $res[$i]['turno']?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Operador</td>
            <td class="tdrespuesta">: <? echo $res[$i]['nombre_operador']?></td>
            <td>Estado</td>
            <td class="tdrespuesta">: <? echo $res[$i]['estado']?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Problema</td>
            <td class="tdrespuesta">:</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3" class="tdrespuesta"> <?php echo $res[$i]['problema']; ?><br />
				<?php echo $res[$i]['problema1']; ?><br />
                <?php echo $res[$i]['problema2']; ?><br />
                <?php echo $res[$i]['problema3']; ?><br />
                <?php echo $res[$i]['problema4']; ?><br />
                <?php echo $res[$i]['problema5']; ?><br />
                <?php echo $res[$i]['problema6']; ?><br />
                <?php echo $res[$i]['problema7']; ?><br />
                <?php echo $res[$i]['problema8']; ?><br />
                <?php echo $res[$i]['problema9']; ?><br />
                <?php echo $res[$i]['problema10']; ?>
            </td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
         <fieldset class="titulosInt"><legend>DATOS DE CIERRE</legend>
         <table width="776" id="miTablaIntDetalle">
          <tr>
            <td width="20">&nbsp;</td>
            <td width="115">Solucion</td>
            <td width="300" class="tdrespuesta">:</td>
            <td width="60">&nbsp;</td>
            <td width="325">&nbsp;</td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3" class="tdrespuesta"><?php echo $res[$i]['solucion']; ?><br />
				<?php echo $res[$i]['solucion1']; ?><br />
                <?php echo $res[$i]['solucion2']; ?><br />
                <?php echo $res[$i]['solucion3']; ?><br />
                <?php echo $res[$i]['solucion4']; ?><br />
                <?php echo $res[$i]['solucion5']; ?><br />
                <?php echo $res[$i]['solucion6']; ?><br />
                <?php echo $res[$i]['solucion7']; ?><br />
                <?php echo $res[$i]['solucion8']; ?><br />
                <?php echo $res[$i]['solucion9']; ?><br />
                <?php echo $res[$i]['solucion10']; ?>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Fecha</td>
     		<td class="tdrespuesta">: <?php $fecha_fin = $res[$i]['fecha_fin'];
					    $fecha_fin = $ut->reviertefecha2($fecha_fin); 
						echo $fecha_fin ?>
            </td>
            <td>Hora</td>
            <td class="tdrespuesta">: <?php echo $res[$i]['hora_fin']; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Estado</td>
            <td class="tdrespuesta">: <?php echo $res[$i]['estado']; ?> </td>
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
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
      </tr>
    </table>
    <table id="miTablaBotonDetalle">
     <tr>
       <td width="17">&nbsp;</td>
       <td width="581">&nbsp;</td>
       <td width="200">&nbsp;</td>
     </tr>
    </table>
</body>
</html>
<?
}//CIERRE FOR
?>
