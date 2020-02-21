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
	<title>Registro de Pacientes</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- FUNCION VALIDA FORMULARIO-->
    <script language="javascript" type="text/javascript" src="js/validacion.js"></script>
    <!--VALIDA RUT-->
    <script language="javascript" type="text/javascript" src="js/funcion_validarut.js" ></script>
    <!--CALENDARIO-->
    <link rel="stylesheet" type="text/css"  media="all"  href="jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
    <script type="text/javascript" src="js/funcion_calendario.js"></script>
    <!--FUNCION MAX DE CARACTERES AREA DE TEXTO-->
    <script language="javascript" type="text/javascript" src="js/funcionmaxtextarea.js"></script>
    <!--FUNCION VOLVER MENU-->
    <script language="javascript" type="text/javascript" src="js/funcion_ir_menu.js"></script>
</head>

<body class="body">
<div id="formContenedor">
 <div id="transparencia">
  <div id="transparenciaMensaje"></div>
 </div>
 <form id="formulario" name="formulario">
 <table border="0" id="TablaRegistro">
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="372">&nbsp;</td>
    <td width="112">&nbsp;</td>
    <td width="195">&nbsp;</td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4" class="cabeceTitulos">FORMULARIO DE REGISTRO</td>
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
    <td>N° Ficha</td>
    <td>: <input class="inputNumFicha" id="num_ficha" name="num_ficha" type="text" maxlength="10"/></td>
    <td>N° Ficha HOS</td>
    <td>: <input class="inputNumFicha" id="num_ficha_hosp" name="num_ficha_hosp" type="text" maxlength="10"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Rut</td>
    <td>: <input class="inputRut" name="rut" id="rut" type="text" maxlength="12" onblur="return Rut(formulario.rut.value)" /></td>
    <td>F. Creada</td>
    <td>: <input class="inputFecha" id="inputField" name="fecha_creada" type="text" maxlength="10"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nombres</td>
    <td>: <input class="inputNombres" id="nombres" name="nombres" type="text" /></td>
    <td>F. Nacimiento</td>
    <td>: <input class="inputFecha" id="inputField1" name="fecha_nac" type="text" maxlength="10"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Apellidos</td>
    <td>: <input class="inputNombres" id="apellidos" name="apellidos" type="text" /></td>
    <td>Edad</td>
    <td>: <input class="inputEdad" id="edad" name="edad" type="text" maxlength="3"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Direccion</td>
    <td colspan="2">: <input class="inputDireccion" id="direccion" name="direccion" type="text" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Profesion o Actividad</td>
    <td>: <input class="inputNombres" id="profesion" name="profesion" type="text" /></td>
    <td>Procedendia</td>
    <td>: <input class="inputProcedencia" id="procedencia" name="procedencia" type="text"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Escolaridad</td>
    <td>:
    	<select id="escolaridad" name="escolaridad">
        	<option value="0">-- Seleccione Escolaridad--</option>
            <option value="Ensenanza Basica">Ens. Basica</option>
            <option value="Ensenanza Media">Ens. Media</option>
            <option value="Est. Universitario">Est. Universitario</option>
            <option value="Tecnico">Tecnico</option>
            <option value="Profesional">Profesional</option>
    	</select>
    </td>
    <td>Estado Civil</td>
    <td>:
    	<select id="estado_civil" name="estado_civil">
        	<option value="0">-- Seleccione Estado--</option>
            <option value="casado(a)">Casado(a)</option>
            <option value="separado(a)">Separado(a)</option>
            <option value="viudio(a)">Viudo(a)</option>
            <option value="soltero(a)">Soltero(a)</option>
            <option value="conviviente">Conviviente(a)</option>
    	</select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Mac</td>
    <td>: <input class="inputNombres" id="mac" name="mac" type="text" /></td>
    <td>Genero</td>
    <td>:
    	<select id="genero" name="genero">
        	<option value="0">-- Seleccione Genero--</option>
            <option value="hetero">Hetero</option>
            <option value="Homosexual">Homosexual</option>
            <option value="Bisexual">Bisexual</option>
    	</select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Transfusiones</td>
    <td>:
    	<select id="transfusiones" name="transfusiones">
        	<option value="0">-- Tiene transfusiones--</option>
            <option value="si">Si</option>
            <option value="no">No</option>
    	</select>
    </td>
    <td>Sexo</td>
    <td>:
    	<select id="sexo" name="sexo">
        	<option value="0">-- Seleccione Sexo--</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
    	</select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Alergia a Penicilina</td>
    <td>:
    	<select id="alergia" name="alergia">
        	<option value="0">-- Es Alergico --</option>
            <option value="si">Si</option>
            <option value="no">No</option>
    	</select>
    </td>
    <td>Donante</td>
    <td>:
    	<select id="donante" name="donante">
        	<option value="0">-- Es Donante --</option>
            <option value="si">Si</option>
            <option value="no">No</option>
    	</select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Observaciones</td>
    <td colspan="2">:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><textarea  id="observaciones" name="observaciones" cols="50" rows="7" onkeyup="return maximaLongitud(this,500)"></textarea></td>
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
  <br>
  <div id="divBoton">
    <button id="botonEnviar" onClick="validaForm()" type="button">Guardar</button>
    <button onclick="Menu()">Menu</button>
  </div>
 </form>
</div>

</body>
</html>