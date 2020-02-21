<?
$hora = date('H:i:s',time());
$hora_new = substr($hora,0,2);

if($hora_new==00){
   $hora_new=12;
}

//****HORARIO INVIERNO****//
//$hora_new = $hora_new - 1;

//****HORARIO VERANO****//
$hora_new = $hora_new + 1;

$hora_replace = substr($hora,2,6);
$hora_replace = $hora_new.$hora_replace;

echo $hora_replace;
?>