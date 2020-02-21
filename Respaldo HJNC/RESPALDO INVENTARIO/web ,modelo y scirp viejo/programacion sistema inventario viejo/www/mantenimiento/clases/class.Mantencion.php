<?php

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * Clase Unidad
 **/

/**
 * Llamada clase Basedato
 **/
 //include("class.Basedato.php");
 include("class.Unidad.php");

class Mantencion
{
	
	
    // --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_mantencion
     *
     * @access public
     * @var smallint
     */
    public $id_mantencion = 0;
    
    /**
     * Short description of attribute id_unidad
     *
     * @access public
     * @var smallint
     */
    public $id_unidad = 0;
    
    /**
     * Short description of attribute num_serie
     *
     * @access public
     * @var string
     */
    public $num_serie = '';
    
    /**
     * Short description of attribute nombre_usuario
     *
     * @access public
     * @var string
     */
    public $nombre_usuario = '';
    
    /**
     * Short description of attribute nombre_tecnico
     *
     * @access public
     * @var string
     */
    public $nombre_tecnico = '';
    
    /**
     * Short description of attribute procedimiento
     *
     * @access public
     * @var string
     */
    public $procedimiento = '';
    
    /**
     * Short description of attribute descripcion
     *
     * @access public
     * @var string
     */
    public $descripcion = '';
    
    /**
     * Short description of attribute fecha_actual_mantencion
     *
     * @access public
     * @var date
     */
    public $fecha_actual_mantencion = '1900-01-01';
    
    /**
     * Short description of attribute fecha_ultima_mantencion
     *
     * @access public
     * @var date
     */
    public $fecha_ultima_mantencion = '1900-01-01';
    
    /**
     * Short description of attribute dias_asignados
     *
     * @access public
     * @var numeric
     */
    public $dias_asignados = 0;
    
    
    
    // --- OPERATIONS ---
    
    
    /**
	 * Inserta una mantencion en el sistema
	 *
	 * @param $serie, $descripcion, $usuario, $unidad, $tecnico, $procedimiento, $f_mat, $dias
	 * @name add_mantecion
	 * @return Mantecion[]
	 */
    function add_mantecion($mac,$unidad,$usuario,$tecnico,$mant_prev,$mant_correct,$dias){
    	
    	$uni = new Unidad();
    	$res = $uni->get_unidadnombre($unidad);
    	$unidad = $res[0]->id_unidad;
    	
    	$sql = "INSERT INTO mantencion (id_unidad, mac, nombre_usuario, nombre_tecnico, mantencion_prev, mantencion_corr, fecha_actual_mantencion, dias_asignados)
								 VALUES(".$unidad.",'".$mac."','".$usuario."','".$tecnico."','".$mant_prev."','".$mant_correct."',CURDATE(),".$dias.");";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_mantenimiento($sql);
    	$id = mysql_insert_id();
    	
    	$arreglo_resultado = array();
		
		if($resultado==1){
			$arreglo_resultado[0]['respuesta'] = 1;
			$arreglo_resultado[1]['id'] = $id;
		}else{
			$arreglo_resultado[0]['respuesta'] = 0;
		}
		
		return $arreglo_resultado;
		
    }
    
   /**
	 * Recupera las mantencion del equipo en el sistema
	 *
	 * @param $mac
	 * @name get_mantencion(
	 * @return Mantecion[]
	 */
    function get_mantencion($mac){
    	
    	$sql = "SELECT mantencion.id_mantencion, unidad.nombre_unidad, mantencion.nombre_tecnico, 
				       mantencion.fecha_actual_mantencion,mantencion.dias_asignados
				FROM mantencion
				     Inner Join unidad ON unidad.id_unidad = mantencion.id_unidad
				WHERE mantencion.mac = '".$mac."'
				ORDER BY mantencion.fecha_actual_mantencion";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_mantenimiento($sql);
    
    	$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['id_mantencion'] = $res['id_mantencion'];
			$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
			$arreglodatos[$i]['nombre_tecnico'] = $res['nombre_tecnico'];
			$arreglodatos[$i]['fecha_actual_mantencion'] = $res['fecha_actual_mantencion'];
			$arreglodatos[$i++]['dias_asignados'] = $res['dias_asignados'];
		}
    	
		return $arreglodatos;
		
     }
    
   /**
	 * Recupera el detalle completo de la mantencion
	 *
	 * @param $id
	 * @name get_mantenciondetalle
	 * @return Mantecion[]
	 */
    function get_mantenciondetalle($id){
    	
    	$sql = "SELECT mantencion.id_mantencion, unidad.nombre_unidad, mantencion.nombre_tecnico, 
				       mantencion.mantencion_prev, mantencion.mantencion_corr, mantencion.fecha_actual_mantencion, 
				       mantencion.dias_asignados
				FROM mantencion
				     Inner Join unidad ON unidad.id_unidad = mantencion.id_unidad
				WHERE mantencion.id_mantencion = ".$id."
				ORDER BY mantencion.fecha_actual_mantencion";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_mantenimiento($sql);
    
    	$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$arreglodatos[$i]['id_mantencion'] = $res['id_mantencion'];
			$arreglodatos[$i]['nombre_unidad'] = $res['nombre_unidad'];
			$arreglodatos[$i]['nombre_tecnico'] = $res['nombre_tecnico'];
			
			$mat_prev = str_replace('-','<br>',$res['mantencion_prev']);
			$arreglodatos[$i]['mantencion_prev'] = $mat_prev;
			
			$mant_corr = str_replace('-','<br>',$res['mantencion_corr']);
			$arreglodatos[$i]['mantencion_corr'] = $mant_corr;
			
			$arreglodatos[$i]['fecha_actual_mantencion'] = $res['fecha_actual_mantencion'];
			$arreglodatos[$i]['dias_asignados'] = $res['dias_asignados'];
		}
    	
		return $arreglodatos;
		
     }
}