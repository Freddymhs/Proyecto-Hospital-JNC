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
    <!--MASCARA FECHA-->
    <script language="javascript" type="text/javascript" src="js/mascara_fecha.js"></script>
    <!--FUNCION HORA-->
    <script language="javascript" type="text/javascript" src="js/mascara_hora.js"></script>
    <!--FUNCION VALIDA FORMULARIO-->
    <script language="javascript" type="text/javascript" src="js/validacion_detalle_orden.js"></script>
</head>
<body>
<div id="formContenedorDetalle">
 <form id="formulario">
  <div id="transparenciaDetalle">
   <div id="transparenciaMensajeDetalle"></div>
  </div>
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
            <td width="17"><input name="id" type="hidden" value="<?php echo $res[$i]['id_orden'] ?>" /></td>
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
            <td width="300">:</td>
            <td width="60">&nbsp;</td>
            <td width="325">&nbsp;</td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3"class="tdrespuesta"><textarea name="solucion" cols="60" rows="7"><?php echo $res[$i]['solucion']; ?><?php echo $res[$i]['solucion1']; ?><?php echo $res[$i]['solucion2']; ?><?php echo $res[$i]['solucion3']; ?><?php echo $res[$i]['solucion4']; ?><?php echo $res[$i]['solucion5']; ?><?php echo $res[$i]['solucion6']; ?><?php echo $res[$i]['solucion7']; ?><?php echo $res[$i]['solucion8']; ?><?php echo $res[$i]['solucion9']; ?><?php echo $res[$i]['solucion10']; ?>
            </textarea>
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Fecha</td>
     <td>: <input name="fecha_fin" type="text" onKeyUp = "this.value=formateafecha(this.value);" value="<?php $fecha_fin = $res[$i]['fecha_fin'];
																										    $fecha_fin = $ut->reviertefecha2($fecha_fin); 
																											echo $fecha_fin ?>" size="12" /></td>
            <td>Hora</td>
            <td>: <input name="caja" type="text" onblur="CheckTime(this)" value="<?php echo $res[$i]['hora_fin']; ?>" size="1" maxlength="5"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Estado</td>
            <td>: 
             <select id="estado"  name="estado" >
                <option value="0">-- Escoge un Estado --</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Realizada">Realizada</option>
             </select>
            </td>
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
       <td width="200">
         <button id="botonEnviar" onClick="validaForm()" type="button">Guardar</button>
         <button type="reset">Limpiar</button>
       </td>
     </tr>
    </table>
 </form>
</div>
</body>
</html>
<?
}//CIERRE FOR
?>
