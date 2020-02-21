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
	<title>Menu Usuario</title>
    <!--ESTILO-->
    <link type="text/css" rel="stylesheet" href="css/css.css"  />
</head>
<body class="body">
  <div id="formContenedorMenu" >
    <table id="miTablaMenu">
      <tr>
        <td>&nbsp;</td>
        <td align="center">
          <?
			if($tipo_usuario == 1){
		  ?>
          <a href="registro_paciente.php" ><img src="imagenes/boton_ingreso.png" height="80" class="ImgMenu" /></a><br />
          <?
			}
		  ?>
          <a href="busqueda_paciente.php" ><img src="imagenes/boton_buscar.png" height="80" class="ImgMenu" /></a><br />
          <a href="?a=logout" ><img src="imagenes/boton_salir.png" height="80" class="ImgMenu" /></a><br />
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</body>
</html>