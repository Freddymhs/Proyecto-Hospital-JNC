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
echo "fondo";
?>
<?
include_once "clases/class.Ficha.php";
include_once "clases/Utiles.inc";

$ficha = new Ficha();

$id_ficha = $id;

$res = $ficha->get_registrosid($id_ficha);


for ($i=0; $i < sizeof($res); $i++){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Actualiza un Paciente</title>
    
    <!-- ESTILO PAGINA -->
    <link type="text/css" rel="stylesheet" href="css/css.css" />
    <!-- FUNCION VALIDA FORMULARIO -->
    <script language="javascript" type="text/javascript" src="js/validacion_upd.js"></script>
    <!--MASCARA FECHA-->
    <script language="javascript" type="text/javascript" src="js/mascara_fecha.js"></script>
</head>
<body>
<div id="formContenedorUpd">
 <div id="transparenciaUpd">
  <div id="transparenciaMensajeUpd"></div>
 </div>
 <form id="formularioUpd">
  <table border="0" id="TablaUpdate">
  <tr>
    <td width="20">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="353">&nbsp;</td>
    <td width="111">&nbsp;</td>
    <td width="189">&nbsp;</td>
    <td width="20">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4" class="cabeceTitulosUpd">FORMULARIO DE ACTUALIZACION</td>
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
    <td>: <input class="inputNumFicha" id="num_ficha" name="num_ficha" type="text" value="<?php echo $res[$i]['num_ficha']; ?>"  maxlength="10"/></td>
    <td>N° Ficha HOS</td>
    <td>: <input class="inputNumFicha" id="num_ficha_hosp" name="num_ficha_hosp" type="text" value="<?php echo $res[$i]['num_ficha_hosp']; ?>" maxlength="10"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Rut</td>
    <td>: <input class="inputRut" id="rut" name="rut" type="text" value="<?php echo $res[$i]['rut_pac']; ?>" disabled="disabled"/></td>
    <td>F. Creada</td>
    <td>: <input class="inputFecha" id="inputField" name="fecha_creada" type="text" value="<?php echo $res[$i]['fecha_ficha']; ?>" onKeyUp = "this.value=formateafecha(this.value);" maxlength="10" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nombres</td>
    <td>: <input class="inputNombres" id="nombres" name="nombres" type="text" value="<?php echo $res[$i]['nombres_pac']; ?>"/></td>
    <td>F. Nacimiento</td>
    <td>: <input class="inputFecha" id="inputField1" name="fecha_nac" type="text" value="<?php echo $res[$i]['fecha_nac']; ?>" onKeyUp = "this.value=formateafecha(this.value);" maxlength="10"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Apellidos</td>
    <td>: <input class="inputNombres" id="apellidos" name="apellidos" type="text" value="<?php echo $res[$i]['apellidos_pac']; ?>"/></td>
    <td>Edad</td>
    <td>: <input class="inputEdad" id="edad" name="edad" type="text" value="<?php echo $res[$i]['edad']; ?>"maxlength="3"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Direccion</td>
    <td colspan="2">: <input class="inputDireccion" id="direccion" name="direccion" type="text" value="<?php echo $res[$i]['direccion']; ?>"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Profesion o Actividad</td>
    <td>: <input class="inputNombres" id="profesion" name="profesion" type="text" value="<?php echo $res[$i]['profesion']; ?>"/></td>
    <td>Procedendia</td>
    <td>: <input class="inputProcedencia" id="procedencia" name="procedencia" type="text" value="<?php echo $res[$i]['procedencia']; ?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Escolaridad</td>
    <td>:
    	<select id="escolaridad" name="escolaridad">
            <option value="<?php echo $res[$i]['escolaridad']; ?>"><?php echo $res[$i]['escolaridad']; ?></option>
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
            <option value="<?php echo $res[$i]['estado_civil']; ?>"><?php echo $res[$i]['estado_civil']; ?></option>
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
    <td>: <input class="inputNombres" id="mac" name="mac" type="text" value="<?php echo $res[$i]['mac']; ?>"/></td>
    <td>Genero</td>
    <td>:
    	<select id="genero" name="genero">
        	<option value="<?php echo $res[$i]['genero']; ?>"><?php echo $res[$i]['genero']; ?></option>
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
            <option value="<?php echo $res[$i]['transfusiones']; ?>"><?php echo $res[$i]['transfusiones']; ?></option>
        	<option value="0">-- Tiene transfusiones--</option>
            <option value="si">Si</option>
            <option value="no">No</option>
    	</select>
    </td>
    <td>Sexo</td>
    <td>:
    	<select id="sexo" name="sexo">
            <option value="<?php echo $res[$i]['sexo']; ?>"><?php echo $res[$i]['sexo']; ?></option>
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
            <option value="<?php echo $res[$i]['alergia']; ?>"><?php echo $res[$i]['alergia']; ?></option>
        	<option value="0">-- Es Alergico --</option>
            <option value="si">Si</option>
            <option value="no">No</option>
    	</select>
    </td>
    <td>Donante</td>
    <td>:
    	<select id="donante" name="donante">
            <option value="<?php echo $res[$i]['donante']; ?>"><?php echo $res[$i]['donante']; ?></option>
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
    <td colspan="2"><textarea id="observaciones" name="observaciones" cols="50" rows="7"><?php echo $res[$i]['observaciones']; ?></textarea>
    </td>
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
  <div id="divBotonUpd">
    <button id="botonEnviarUpd" onClick="validaForm()" type="button">Actualizar</button>
    <input id="id_ficha" name="id_ficha" type="hidden" value="<?php echo $res[$i]['id_ficha']; ?>"/>
  </div>
 </form>
</div>
</body>
</html>
<?
}
?>