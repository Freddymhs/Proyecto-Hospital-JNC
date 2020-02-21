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
<?
include_once "clases/class.Examen.php";
include_once "clases/Utiles.inc";

$examen = new Examen();

$id_examen = $id;

$res = $examen->get_examenid($id_examen);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Visualiza Examen</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
</head>

<body>
<fieldset><legend class="cabeceTitulos">DATOS DEL EXAMEN</legend>
<table id="miTablaVisualizaExamen" border="0">
  <tr>
    <td width="21">&nbsp;</td>
    <td width="181">&nbsp;</td>
    <td width="257">&nbsp;</td>
    <td width="160">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="25">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>N° Examen</td>
    <td class="Datos">: <?php echo $res[0]['num_examen']; ?></td>
    <td>Fecha Examen</td>
    <td class="Datos">: <?php echo $res[0]['examen_fecha']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Fecha Retorno</td>
    <td class="Datos">: <?php echo $res[0]['examen_fecha_retorno']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nombre Paciente</td>
    <td colspan="3" class="Datos">: <?php echo $res[0]['examen_nombre_paciente']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Examen 1</td>
    <td colspan="3" class="Datos">: <?php echo $res[0]['tipoexamen_nombre']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Examen 2</td>
    <td colspan="3" class="Datos">: <?php echo $res[1]['tipoexamen_nombre']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Examen 3</td>
    <td colspan="3" class="Datos">: <?php echo $res[2]['tipoexamen_nombre']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Examen 4</td>
    <td colspan="3" class="Datos">: <?php echo $res[3]['tipoexamen_nombre']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Examen 5</td>
    <td colspan="3" class="Datos">: <?php echo $res[4]['tipoexamen_nombre']; ?></td>
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
    <td>Procedencia</td>
    <td colspan="2" class="Datos">: <?php echo $res[0]['unidad_nombre']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Estado</td>
    <td class="Datos">: <?php echo $res[0]['examen_estado']; ?></td>
    <td>Enviado por</td>
    <td class="Datos">: <?php echo $res[0]['examen_nombre_usuario']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Destino</td>
    <td class="Datos">: <?php echo $res[0]['examen_destino']; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Diagnostico</td>
    <td colspan="3" class="Datos">: <?php echo $res[0]['examen_diagnostico']; ?></td>
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
</body>
</html>