<?php
include_once "../clases/pdf/fpdf.php";
//include_once "../clases/class.Basedato.php";

class PDF extends FPDF
{
	//--FUNCIONES PARA LA CREACION DE LAS TABLA--//
	
	//Tabla simple
	function BasicTable($titles,$dataarreglo)
	{
	    //Cabecera
	    $estado = array(17,14,55,110,51,11,48,12,14,20);//
	    $i=0;
	    foreach($titles as $col)
	        $this->Cell($estado[$i++],5,$col,1);
	    	$this->Ln();
	    
	    //Datos
	    foreach($dataarreglo as $row)
	    {
	    	$estado1 = array(17,14,55,110,51,11,48,12,14,20);
	    	$y=0;
	        foreach($row as $col)
	            $this->Cell($estado1[$y++],5,$col,1);
	        	$this->Ln();
	    }
	}
   //---------------FIN-----------------//
  
}
?>