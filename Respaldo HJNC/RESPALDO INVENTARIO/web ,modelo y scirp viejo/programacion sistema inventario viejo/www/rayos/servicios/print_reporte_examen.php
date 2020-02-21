<?php
include_once "../clases/pdf/fpdf.php";
include_once "../clases/pdf/class.Pdf.php";
include_once "../clases/Utiles.inc";
include_once "../clases/class.Basedatos.php";


$ut = new Utiles();

//**** OBTENCION DE VARIABLES GET ****//
if($_GET["tipo_exam"] == "-- Seleccione un Examen --"){
   $tipo_exam = '%';//
}else{
   $tipo_exam = $_GET["tipo_exam"];
}

if(empty($_GET["fecha_inicio"])){
   $fecha_inicio = '01-01-2012';//0
   $fecha_inicio = $ut->reviertefecha3($fecha_inicio);
}else{
   $fecha_inicio = $_GET["fecha_inicio"];
   $fecha_inicio = $ut->reviertefecha3($fecha_inicio);
}
				
if(empty($_GET["fecha_fin"])){
   $fecha_fin = '01-01-2012';//0
   $fecha_fin = $ut->reviertefecha3($fecha_fin);
}else{
   $fecha_fin = $_GET["fecha_fin"];
   $fecha_fin = $ut->reviertefecha3($fecha_fin);
}


//******** CREACION DEL PDF *********//
$pdf = new PDF('L','mm','Legal');//mm
$pdf->SetTopMargin(2);
$pdf->SetLeftMargin(2);
$pdf->AddPage();
$pdf->SetFont('Arial','',20);


//TITULO DEL PDF
$pdf->Cell(140);
$pdf->Cell(40,10,'LISTA DE EXAMENES',0,'C');
$pdf->Ln(20);


//*************** SQL ***************//
//******* BUSCO NOMBRE EXAMEN *******//

if($tipo_exam!='%'){
	
	$sql = "SELECT tipoexamen_nombre
			FROM tipo_examen
			WHERE id_tipoexamen = ".$tipo_exam." ";

	$bd = new Basedatos();
	$resultado = $bd->ejecutar_sql_archivo($sql);
	$res = mysql_fetch_array($resultado);
	$tipo_exam_nombre = $res['tipoexamen_nombre'];
	
}else{
	$tipo_exam_nombre = "Todos";
}

//*************** SQL ***************//
//********* BUSCO EXAMENES **********//
$sql1 = "SELECT examen.id_examen, examen.num_examen, examen.examen_nombre_paciente, examen.examen_fecha, examen.examen_fecha_retorno, examen.examen_estado,
			    examen.examen_diagnostico, examen.examen_destino, examen.examen_nombre_usuario, tipo_examen.tipoexamen_nombre, unidad.unidad_nombre
		 FROM examen
			Inner Join examen_tiene_tipoexamen ON examen.id_examen = examen_tiene_tipoexamen.id_examen
			Inner Join tipo_examen ON tipo_examen.id_tipoexamen = examen_tiene_tipoexamen.id_tipoexamen
			Inner Join unidad ON unidad.id_unidad = examen.id_unidad
		 WHERE cast(examen_tiene_tipoexamen.id_tipoexamen as char) like cast('".$tipo_exam."' as char)
			AND examen.examen_fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
		 ORDER BY examen_tiene_tipoexamen.id_tipoexamen, examen.examen_fecha ";

$bd = new Basedatos();
$resultado1 = $bd->ejecutar_sql_archivo($sql1);

$i = 0;
$count = 0;
$arreglodatos = array();

while($res1 = mysql_fetch_array($resultado1)){
	  
	 $arreglodatos[$i]['num_examen'] = $res1['num_examen'];
	 $arreglodatos[$i]['examen_fecha'] = $res1['examen_fecha'];
	 $arreglodatos[$i]['examen_nombre_paciente'] = $res1['examen_nombre_paciente'];
	 $arreglodatos[$i]['tipoexamen_nombre'] = $res1['tipoexamen_nombre'];
	 $arreglodatos[$i]['unidad_nombre'] = $res1['unidad_nombre'];
	 $arreglodatos[$i]['examen_estado'] = $res1['examen_estado'];
	 $arreglodatos[$i]['examen_diagnostico'] = $res1['examen_diagnostico'];
	 $arreglodatos[$i]['examen_destino'] = $res1['examen_destino'];
	 $arreglodatos[$i]['examen_fecha_retorno'] = $res1['examen_fecha_retorno'];
	 $arreglodatos[$i++]['examen_nombre_usuario'] = $res1['examen_nombre_usuario'];
	
	 $count = $count + 1;
}


//****** CONTINUACION DEL PDF *******//
$pdf->SetFont('Arial','',14,'B');
$pdf->Cell(5,10,"Tipo Examen      :".'    '.$tipo_exam_nombre);
$pdf->Cell(260);
$pdf->Cell(140,10,"Fecha Inicio      :".'    '.$fecha_inicio);
$pdf->Ln(8);
$pdf->Cell(5,10,"Total                   :".'    '.$count);
$pdf->Cell(260);
$pdf->Cell(140,10,"Fecha Fin         :".'    '.$fecha_fin);
$pdf->Ln(10);


//***************  Títulos de las columnas, el orden se lo doy en la Query o en arreglo ***************/
$pdf->SetFont('Arial','',7);
$titles = array('N° Examen','F. Examen','Nombre Paciente','Examen','Procedencia','Estado','Diagnostico','Destino','F. Retorno','Usuario');

$pdf->SetFont('Arial','',7);
$pdf->BasicTable($titles,$arreglodatos);
$pdf->Ln(10);


$pdf->Output();

?>