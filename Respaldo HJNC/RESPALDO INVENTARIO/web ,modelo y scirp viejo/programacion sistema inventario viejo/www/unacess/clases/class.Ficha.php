<?php

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/*** Llamada clase Basedato ***/
include("class.Basedatos.php");

class Ficha {
	
	 // --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_ficha
     *
     * @access public
     * @var smallint
     */
    public $id_ficha = 0;
	
	/**
     * Short description of attribute num_ficha
     *
     * @access public
     * @var numeric
     */
    public $num_ficha = 0;
	
	 /**
     * Short description of attribute rut_pac
     *
     * @access public
     * @var char
     */
    public $rut_pac = '';
	
	/**
     * Short description of attribute nombres_pac
     *
     * @access public
     * @var char
     */
    public $nombres_pac = '';
	
	/**
     * Short description of attribute apellidos_pac
     *
     * @access public
     * @var char
     */
    public $apellidos_pac = '';
    
    /**
     * Short description of attribute fecha_nac
     *
     * @access public
     * @var Date
     */
    public $fecha_nac = '2000-01-01';
    
    /**
     * Short description of attribute edad
     *
     * @access public
     * @var numeric
     */
    public $edad = 0;
    
    /**
     * Short description of attribute profesion
     *
     * @access public
     * @var char
     */
    public $profesion = '';
    
    /**
     * Short description of attribute direccion
     *
     * @access public
     * @var char
     */
    public $direccion = '';
    
    /**
     * Short description of attribute fecha_ficha
     *
     * @access public
     * @var Date
     */
    public $fecha_ficha = '2000-01-01';
    
    /**
     * Short description of attribute estado_civil
     *
     * @access public
     * @var char
     */
    public $estado_civil = '';
    
    /**
     * Short description of attribute genero
     *
     * @access public
     * @var char
     */
    public $genero = '';
    
    /**
     * Short description of attribute sexo
     *
     * @access public
     * @var char
     */
    public $sexo = '';
    
    /**
     * Short description of attribute procedencia
     *
     * @access public
     * @var char
     */
    public $procedencia = '';
    
    /**
     * Short description of attribute escolaridad
     *
     * @access public
     * @var char
     */
    public $escolaridad = '';
    
    /**
     * Short description of attribute mac
     *
     * @access public
     * @var char
     */
    public $mac = '';
    
    /**
     * Short description of attribute transfusiones
     *
     * @access public
     * @var char
     */
    public $transfusiones = '';
    
    /**
     * Short description of attribute donante
     *
     * @access public
     * @var char
     */
    public $donante = '';
    
    /**
     * Short description of attribute alergia
     *
     * @access public
     * @var char
     */
    public $alergia = '';
    
    /**
     * Short description of attribute observaciones
     *
     * @access public
     * @var char
     */
    public $observaciones = '';
    
    
    // --- OPERATIONS ---
	
	
	/**
	 * Se agrega un nuevo registro al sistema.
	 *
	 * @param $num_ficha,$num_ficha_hosp,$fecha_creada,$rut,$nombres,$fecha_nac,$apellidos,$edad,$direccion,$profesion,$procedencia,$escolaridad,$estado_civil,$mac,$genero,$transfusiones,$sexo,$alergia,$donante,$observaciones
	 * @name add_geristro
	 * @return Boolean
	 */
    function add_registro($num_ficha,$num_ficha_hosp,$fecha_creada,$rut,$nombres,$fecha_nac,$apellidos,$edad,$direccion,$profesion,$procedencia,$escolaridad,$estado_civil,$mac,$genero,$transfusiones,$sexo,$alergia,$donante,$observaciones){
    	
    	$f = new Utiles();
    	$ficha = new Ficha();
    	
    	$fecha_creada = $f->reviertefecha3($fecha_creada);
		$fecha_nac = $f->reviertefecha3($fecha_nac);
    	
		//-- FUNCION RUT EXISTE --//
    	$existe = $ficha->get_rut($rut);
		
		if($existe == "si"){
			
			$resultado = 0;
		}else{
		
	    	$sql = "INSERT INTO ficha(num_ficha,num_ficha_hosp,rut_pac,nombres_pac,apellidos_pac,fecha_nac,edad,profesion,direccion,fecha_ficha,estado_civil,genero,sexo,procedencia,escolaridad,mac,transfusiones,donante,alergia,observaciones)
	    				       VALUES(".$num_ficha.",".$num_ficha_hosp.",'".$rut."','".$nombres."','".$apellidos."','".$fecha_nac."',".$edad.",'".$profesion."','".$direccion."','".$fecha_creada."','".$estado_civil."','".$genero."','".$sexo."','".$procedencia."','".$escolaridad."','".$mac."','".$transfusiones."','".$donante."','".$alergia."','".$observaciones."');";
	    	
	    	//$f->addlog("../servicios/msj_addregistro.log","$sql\n");
	    	
	    	$bd = new Basedatos();
	    	$resultado = $bd->ejecutar_sql_archivo($sql);
		}
		
    	return $resultado;
    	
    }
    
    /**
	 * Busca registros en el sistema.
	 *
	 * @param $rut
	 * @name get_registro
	 * @return Boolean
	 */
    function get_registro($rut){
    
    	$sql = "SELECT id_ficha, num_ficha, rut_pac, CONCAT(nombres_pac,' ',apellidos_pac) AS nombre
				FROM ficha
				WHERE rut_pac LIKE '".$rut."' ";
    	
    	//$f = new Utiles();
		//$f->addlog("../servicios/msj_addregistro.log","$sql\n");
    	
    	$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
    		
			$arreglodatos[$i]['id_ficha'] = $res['id_ficha'];
			$arreglodatos[$i]['num_ficha'] = $res['num_ficha'];
			$arreglodatos[$i]['rut_pac'] = $res['rut_pac'];
			$arreglodatos[$i++]['nombre'] = $res['nombre'];
    		
    	}
    	
    	return $arreglodatos;
    	
    }
    
    /**
	 * Busca especifica de un registro.
	 *
	 * @param $id_ficha
	 * @name get_registrosid
	 * @return Boolean
	 */
    function get_registrosid($id_ficha){
    	
    	$sql = "SELECT id_ficha, num_ficha_hosp, num_ficha, rut_pac, nombres_pac, apellidos_pac, fecha_nac, edad, profesion, direccion, fecha_ficha, estado_civil,
       				   genero, sexo, procedencia, escolaridad, mac, transfusiones, donante, alergia, observaciones 
				FROM ficha
				WHERE cast(id_ficha as char) like cast('".$id_ficha."' as char) ";
    	
    	$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
    		
			$f = new Utiles();
    	
			$fecha_nac = $f->reviertefecha2($res['fecha_nac']);
			$fecha_ficha = $f->reviertefecha2($res['fecha_ficha']);
			
			$arreglodatos[$i]['id_ficha'] = $res['id_ficha'];
			$arreglodatos[$i]['num_ficha'] = $res['num_ficha'];
			$arreglodatos[$i]['num_ficha_hosp'] = $res['num_ficha_hosp'];
			$arreglodatos[$i]['rut_pac'] = $res['rut_pac'];
			$arreglodatos[$i]['nombres_pac'] = $res['nombres_pac'];
			$arreglodatos[$i]['apellidos_pac'] = $res['apellidos_pac'];
			$arreglodatos[$i]['fecha_nac'] = $fecha_nac;
			$arreglodatos[$i]['edad'] = $res['edad'];
			$arreglodatos[$i]['profesion'] = $res['profesion'];
			$arreglodatos[$i]['direccion'] = $res['direccion'];
			$arreglodatos[$i]['fecha_ficha'] = $fecha_ficha;
			$arreglodatos[$i]['estado_civil'] = $res['estado_civil'];
			$arreglodatos[$i]['genero'] = $res['genero'];
			$arreglodatos[$i]['sexo'] = $res['sexo'];
			$arreglodatos[$i]['procedencia'] = $res['procedencia'];
			$arreglodatos[$i]['escolaridad'] = $res['escolaridad'];
			$arreglodatos[$i]['mac'] = $res['mac'];
			$arreglodatos[$i]['transfusiones'] = $res['transfusiones'];
			$arreglodatos[$i]['donante'] = $res['donante'];
			$arreglodatos[$i]['alergia'] = $res['alergia'];
			$arreglodatos[$i++]['observaciones'] = $res['observaciones'];
			
    	}
    	
    	return $arreglodatos;
    	
    }
    
    /**
	 * Actualiza un registro.
	 *
	 * @param $id_ficha,$num_ficha,$num_ficha_hosp,$fecha_creada,$rut,$nombres,$fecha_nac,$apellidos,$edad,$direccion,$profesion,$procedencia,$escolaridad,$estado_civil,$mac,$genero,$transfusiones,$sexo,$alergia,$donante,$observaciones
	 * @name updregistro
	 * @return Boolean
	 */
    function updregistro($id_ficha,$num_ficha,$num_ficha_hosp,$fecha_creada,$rut,$nombres,$fecha_nac,$apellidos,$edad,$direccion,$profesion,$procedencia,$escolaridad,$estado_civil,$mac,$genero,$transfusiones,$sexo,$alergia,$donante,$observaciones){
    	
    	$f = new Utiles();
    	
    	$fecha_creada = $f->reviertefecha3($fecha_creada);
		$fecha_nac = $f->reviertefecha3($fecha_nac);
    	
    	$sql = "UPDATE ficha SET num_ficha = ".$num_ficha.",
    							 num_ficha_hosp = ".$num_ficha_hosp.",
								 rut_pac = '".$rut."',
								 nombres_pac = '".$nombres."',
								 apellidos_pac = '".$apellidos."',
								 fecha_nac = '".$fecha_nac."',
								 edad = ".$edad.",
								 profesion = '".$profesion."',
								 direccion = '".$direccion."',
								 fecha_ficha = '".$fecha_creada."',
								 estado_civil = '".$estado_civil."',
								 genero = '".$genero."',
								 sexo = '".$sexo."',
								 procedencia = '".$procedencia."',
								 escolaridad = '".$escolaridad."',
								 mac = '".$mac."',
								 transfusiones = '".$transfusiones."',
								 donante = '".$donante."',
								 alergia = '".$alergia."',
								 observaciones = '".$observaciones."'
				WHERE id_ficha = ".$id_ficha." ";
    	
    	$bd = new Basedatos();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	return $resultado;
    }
    
    /**
	 * Buscar rut si existe en el sistema.
	 *
	 * @param $rut
	 * @name get_rut
	 * @return Boolean
	 */
    function get_rut($rut){
    	
    	$sql = "SELECT CASE WHEN rut_pac THEN 'si' ELSE 'no' END AS existe
				FROM ficha
				WHERE rut_pac = '".$rut."' ";
    	
    	$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		$res = mysql_fetch_array($resultado);
		$existe = $res['existe'];
		
		return $existe;
    	
    }
    
    
    
    
    
    
    
    
    
}