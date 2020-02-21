<?

include_once "clases/class.Mantencion.php";
include_once "clases/Utiles.inc";

$mat = new Mantencion();
$id = $id;

$res = $mat->get_mantenciondetalle($id);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>DETALLE MANTENCION</title>
    
    <!-- ESTILO CSS -->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div id="DivContenedorDetalle">
    <table id="miTablaDetMant">
      <tr>
        <td width="20">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="336">&nbsp;</td>
        <td width="131">&nbsp;</td>
        <td width="151">&nbsp;</td>
        <td width="22">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Código</td>
        <td class="tdrespuesta">: <? echo $res[0]['id_mantencion']; ?></td>
        <td>Fecha</td>
        <td class="tdrespuesta">: <? echo $res[0]['fecha_actual_mantencion']; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Unidad</td>
        <td class="tdrespuesta">: <? echo $res[0]['nombre_unidad']; ?></td>
        <td>Dias Asig</td>
        <td class="tdrespuesta">: <? echo $res[0]['dias_asignados']; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Técnico</td>
        <td class="tdrespuesta">: <? echo $res[0]['nombre_tecnico']; ?></td>
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
        <td class="td_mat">Mant Preventiva</td>
        <td>:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3" class="tdrespuesta"><? echo $res[0]['mantencion_prev']; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Mant Correctiva</td>
        <td>:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3" class="tdrespuesta"><? echo $res[0]['mantencion_corr']; ?></td>
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
 </div>
</body>
</html>
