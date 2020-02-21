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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Formulario de Busqueda</title>
    
    <!--ESTILO-->
	<link href="css/css.css" rel="stylesheet" type="text/css" />
    <!--FUNCION ENTRAR MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    
</head>
<body class="body">
<div id="formContenedorBuscar">
    <table id="miTablaBuscar">
     <form action="historial_turno.php" method="post">
      <tr>
        <td width="16">&nbsp;</td>
        <td width="92">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="650">&nbsp;</td>
        <td width="17">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3" class="cabeceratabla">FORMULARIO DE BUSQUEDA</td>
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
        <td><input name="nivel" type="hidden" value="1" /></td>
        <td>Fecha :</td>
        <td><input id="inputField" name="fecha" type="text" size="12"  /></td>
        <td><input id="BotonBuscar" type="submit" value="Buscar"/></td>
        <td>&nbsp;</td>
      </tr>
     </form>
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
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">
          <div id="divTablaInt">
               <table id="miTablaInt">
                  <tr>
					<td>   
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=1'>";
                        echo"<img src='imagenes/Dias/Dia1.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
					</td>
					<td>  
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=2'>";
                        echo"<img src='imagenes/Dias/Dia2.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=3'>";
                        echo"<img src='imagenes/Dias/Dia3.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=4'>";
                        echo"<img src='imagenes/Dias/Dia4.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=5'>";
                        echo"<img src='imagenes/Dias/Dia5.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=6'>";
                        echo"<img src='imagenes/Dias/Dia6.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=7'>";
                        echo"<img src='imagenes/Dias/Dia7.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                  </tr>
                  <tr>
                    <td>   
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=8'>";
                        echo"<img src='imagenes/Dias/Dia8.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
					</td>
					<td>  
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=9'>";
                        echo"<img src='imagenes/Dias/Dia9.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=10'>";
                        echo"<img src='imagenes/Dias/Dia10.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=11'>";
                        echo"<img src='imagenes/Dias/Dia11.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=12'>";
                        echo"<img src='imagenes/Dias/Dia12.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=13'>";
                        echo"<img src='imagenes/Dias/Dia13.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=14'>";
                        echo"<img src='imagenes/Dias/Dia14.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                  </tr>
                  <tr>
                    <td>   
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=15'>";
                        echo"<img src='imagenes/Dias/Dia15.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
					</td>
					<td>  
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=16'>";
                        echo"<img src='imagenes/Dias/Dia16.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=17'>";
                        echo"<img src='imagenes/Dias/Dia17.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=18'>";
                        echo"<img src='imagenes/Dias/Dia18.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=19'>";
                        echo"<img src='imagenes/Dias/Dia19.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=20'>";
                        echo"<img src='imagenes/Dias/Dia20.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=21'>";
                        echo"<img src='imagenes/Dias/Dia21.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                  </tr>
                  <tr>
                    <td>   
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=22'>";
                        echo"<img src='imagenes/Dias/Dia22.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
					</td>
					<td>  
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=23'>";
                        echo"<img src='imagenes/Dias/Dia23.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=24'>";
                        echo"<img src='imagenes/Dias/Dia24.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=25'>";
                        echo"<img src='imagenes/Dias/Dia25.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=26'>";
                        echo"<img src='imagenes/Dias/Dia26.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=27'>";
                        echo"<img src='imagenes/Dias/Dia27.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=28'>";
                        echo"<img src='imagenes/Dias/Dia28.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                  </tr>
                  <tr>
                    <td>   
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=29'>";
                        echo"<img src='imagenes/Dias/Dia29.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
					</td>
					<td>  
                    <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=30'>";
                        echo"<img src='imagenes/Dias/Dia30.png' class='ImgMenu'/>";
                     echo"</a>";
					?>
                    </td>
                    <td>
                     <?           
                     echo"<a href='historial_turno.php?fecha=$fecha&operador=$operador&dia=31'>";
                        echo"<img src='imagenes/Dias/Dia31.png' class='ImgMenu'/>";
                     echo"</a>";
					 ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
          </div>
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
    <div id="divBotonBuscar">
     <button onclick="Menu()">Salir</button>
    </div> 
</div>
</body>
</html>