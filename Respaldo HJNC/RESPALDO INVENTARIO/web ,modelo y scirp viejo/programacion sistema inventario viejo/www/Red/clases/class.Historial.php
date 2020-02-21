<?php

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

class Historial
{
	
    // --- ATTRIBUTES ---
    
	
	/* Short description of attribute id_inventario
     *
     * @access public
     * @var smallint
     */
    public $id_historial = 0;
    
    /* Short description of attribute id_inventario
     *
     * @access public
     * @var smallint
     */
    public $id_inventario = 0;
    
    /* Short description of attribute fecha_cambio
     *
     * @access public
     * @var Date
     */
    public $fecha_cambio = "1900-01-01";
    
    /**
     * Short description of attribute usuario_cambio
     *
     * @access public
     * @var char
     */
    public $usuario_cambio = "";
    
    /* Short description of attribute serie_pc
     *
     * @access public
     * @var char
     */
    public $his_serie_pc= '';
    
    /**
     * Short description of attribute modelo_pc
     *
     * @access public
     * @var char
     */
    public $his_modelo_pc= '';
    
     /* Short description of attribute procesador
     *
     * @access public
     * @var char
     */
    public $his_procesador= '';
    
    /**
     * Short description of attribute disco_duro
     *
     * @access public
     * @var char
     */
    public $his_disco_duro= '';
    
    /**
     * Short description of attribute ram
     *
     * @access public
     * @var char
     */
    public $his_ram= '';
    
    
    // --- OPERATIONS ---
    
    
    /**
	 * Ingresa un historial de cambio al sistema
	 *
	 * @param $id,$username
	 * @name upd_inventario
	 * @return Boolean
	 */
    function add_historial($id,$username){
    	
    	$inv = new Historial();
    	$res = $inv->get_inventarioid($id);
    	
    	$i=0;
    	$serie_pc = $res[$i]['serie_pc'];
    	$modelo_pc = $res[$i]['modelo_pc'];
    	$procesador = $res[$i]['procesador'];
    	$disco_duro = $res[$i]['disco_duro'];
    	$ram = $res[$i]['ram'];
    	
    	$sql = "INSERT INTO historial(id_inventario,fecha_cambio,usuario_cambio,his_serie_pc,his_modelo_pc,his_procesador,his_disco_duro,his_ram)
							   VALUES(".$id.",CURDATE(),'".$username."','".$serie_pc."','".$modelo_pc."','".$procesador."','".$disco_duro."','".$ram."')";
    	
    	//$ut = new Utiles();
		//$ut->addlog("../servicios/msj_addregistro.log","$sql \n");
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		return $resultado;

    }
    
    /**
	 * Recupera la orden especifica de inventario del sistema
	 *
	 * @param $id
	 * @name get_inventarioid
	 * @return Intentario_pc[]
	 */
	function get_inventarioid($id){
		
		$sql = "SELECT serie_pc,modelo_pc,procesador,disco_duro,ram
				FROM inventario_pc
				WHERE id_inventario = ".$id." ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['serie_pc'] = $res['serie_pc'];
			$arreglodatos[$i]['modelo_pc'] = $res['modelo_pc'];
			$arreglodatos[$i]['procesador'] = $res['procesador'];
			$arreglodatos[$i]['disco_duro'] = $res['disco_duro'];
			$arreglodatos[$i]['ram'] = $res['ram'];
			
		}
		
		return $arreglodatos;
	}
    
	/**
	 * Recupera el historial de un registro
	 *
	 * @param $id
	 * @name  get_historial
	 * @return Intentario_pc[]
	 */
	function get_historial($id){
		
		$sql = "SELECT id_historial, id_inventario, fecha_cambio, usuario_cambio, his_serie_pc, his_modelo_pc,
				       his_procesador, his_disco_duro, his_ram
				FROM historial
				WHERE id_inventario = ".$id." ";
		
		$bd = new Basedato();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$fet = new Utiles();
			$fecha = $fet->reviertefecha2($res['fecha_cambio']);
			
			$arreglodatos[$i]['usuario_cambio'] = $res['usuario_cambio'];
			$arreglodatos[$i]['his_modelo_pc'] = $res['his_modelo_pc'];
			$arreglodatos[$i]['his_serie_pc'] = $res['his_serie_pc'];
			$arreglodatos[$i]['fecha_cambio'] = $fecha;
			$arreglodatos[$i]['his_procesador'] = $res['his_procesador'];
			$arreglodatos[$i]['his_disco_duro'] = $res['his_disco_duro'];
			$arreglodatos[$i++]['his_ram'] = $res['his_ram'];
			
		}
		return $arreglodatos;
	}
	
	
}