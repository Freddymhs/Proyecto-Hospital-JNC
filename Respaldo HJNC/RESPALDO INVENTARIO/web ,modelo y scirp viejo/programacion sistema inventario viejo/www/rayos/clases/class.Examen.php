<?php

/*** Llamada clase Basedato ***/
 include("class.Basedatos.php");
 
 class Examen
 {
 	 // --- ATTRIBUTES ---
    
    /**
     * Short description of attribute id_examen
     *
     * @access public
     * @var smallint
     */
    public $id_examen = 0;
    
    /**
     * Short description of attribute id_tipoexamen
     *
     * @access public
     * @var smallint
     */
    public $id_tipoexamen= 0;
    
    /**
     * Short description of attribute id_unidad
     *
     * @access public
     * @var smallint
     */
    public $id_unidad = 0;
    
    /**
     * Short description of attribute num_examen
     *
     * @access public
     * @var numeric
     */
    public $num_examen = 0;
 	
 	/**
     * Short description of attribute examen_nombre_paciente
     *
     * @access public
     * @var string
     */
    public $examen_nombre_paciente = '';
    
    /**
     * Short description of attribute examen_fecha
     *
     * @access public
     * @var date
     */
    public $examen_fecha = '';
    
    /**
     * Short description of attribute examen_fecha_retorno
     *
     * @access public
     * @var date
     */
    public $examen_fecha_retorno = '';
    
    /**
     * Short description of attribute examen_estado
     *
     * @access public
     * @var string
     */
    public $examen_estado = '';
    
    /**
     * Short description of attribute examen_diagnostico
     *
     * @access public
     * @var string
     */
    public $examen_diagnostico = '';
    
    /**
     * Short description of attribute examen_destino
     *
     * @access public
     * @var string
     */
    public $examen_destino = '';
    
    /**
     * Short description of attribute examen_nombre_usuario
     *
     * @access public
     * @var string
     */
    public $examen_nombre_usuario = '';
    
    
    
    // --- OPERATIONS ---
    
    
    
    /**
	 * Se agrega un nuevo registro al sistema.
	 *
	 * @param $id_tipoexamen,$id_unidad,$num_examen,$examen_nombre_paciente,$examen_fecha,$examen_fecha_retorno,$examen_estado,$examen_diagnostico,$examen_destino,$usuario
	 * @name add_examen
	 * @return Boolean
	 */
    function add_examen($id_tipoexamen,$id_tipoexamen2,$id_tipoexamen3,$id_tipoexamen4,$id_tipoexamen5,$id_unidad,$num_examen,$examen_nombre_paciente,$examen_fecha,$examen_fecha_retorno,$examen_estado,$examen_diagnostico,$examen_destino,$usuario,$contador){
    	
    	$f = new Utiles();
    	
    	$examen_fecha = $f->reviertefecha3($examen_fecha);
		$examen_fecha_retorno = $f->reviertefecha3($examen_fecha_retorno);
    	
		$sql = "INSERT INTO examen(id_unidad,num_examen,examen_nombre_paciente,examen_fecha,examen_fecha_retorno,examen_estado,examen_diagnostico,examen_destino,examen_nombre_usuario)
							VALUES(".$id_unidad.",".$num_examen.",'".$examen_nombre_paciente."','".$examen_fecha."','".$examen_fecha_retorno."','".$examen_estado."','".$examen_diagnostico."','".$examen_destino."','".$usuario."');";
		
		//$f->addlog("../servicios/msj_addregistro.log","$sql\n");
	    	
    	$bd = new Basedatos();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	$id = mysql_insert_id();
    	
		$i = 0;
		if($id_tipoexamen || $id_tipoexamen2 || $id_tipoexamen3 || $id_tipoexamen4 || $id_tipoexamen5 != 0){
		    		
			for($i=0;$i<$contador;$i++){
				
				switch ($i){
					
					case 0:
						$id_tipo = $id_tipoexamen;
					break;
					case 1:
						$id_tipo = $id_tipoexamen2;
					break;
					case 2:
						$id_tipo = $id_tipoexamen3;
					break;
					case 3:
						$id_tipo = $id_tipoexamen4;
					break;
					case 4:
						$id_tipo = $id_tipoexamen5;
					break;
				}
				
				$sql = "INSERT INTO examen_tiene_tipoexamen(id_examen,id_tipoexamen)
													 VALUES(".$id.",".$id_tipo."); ";
							
				$bd = new Basedatos();			
    			$bd->ejecutar_sql_archivo($sql);
				
				//$ut = new Utiles();
				//$ut->addlog("../servicios/msj_addexamen.log","$contador, $id_tipo\n");
			}	
		}
    	
    	return $resultado;
    	
    }
    
    /**
	 * Busca examen en el sistema.
	 *
	 * @param $numero,$tipo_exam,$f_inicio,$f_fin,$nombre_pac
	 * @name get_examen
	 * @return Examen[]
	 */
 	function get_examen($numero,$tipo_exam,$f_inicio,$f_fin,$nombre_pac){
 		
 		$f = new Utiles();
			
		if($f_inicio == '%' || $f_fin == '%'){
		   $f_inicio = '2010-01-01';
		   $f_fin = '2050-01-01';
		}else{
		   $f_inicio = $f->reviertefecha3($f_inicio);
		   $f_fin = $f->reviertefecha3($f_fin);
		}
 		
		$sql = "SELECT examen.id_examen, tipo_examen.tipoexamen_nombre, examen.num_examen, examen.examen_nombre_paciente, examen.examen_fecha, 
					   examen.examen_fecha_retorno, examen.examen_estado, examen.examen_diagnostico, examen.examen_destino, examen.examen_nombre_usuario
				FROM examen
					Inner Join examen_tiene_tipoexamen ON examen.id_examen = examen_tiene_tipoexamen.id_examen
					Inner Join tipo_examen ON tipo_examen.id_tipoexamen = examen_tiene_tipoexamen.id_tipoexamen
				WHERE cast(examen.num_examen as char) like cast('".$numero."' as char)
					AND cast(examen_tiene_tipoexamen.id_tipoexamen as char) like cast('".$tipo_exam."' as char)
					AND examen.examen_fecha BETWEEN '".$f_inicio."'  AND '".$f_fin."'
					AND examen.examen_nombre_paciente LIKE '%$nombre_pac%'
					ORDER BY examen.examen_fecha DESC";
		
		//$f->addlog("msj_getregistro.log","$sql\n");
				
		$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$f = new Utiles();
    	
			$fecha_examen = $f->reviertefecha2($res['examen_fecha']);
			$fecha_examen_retorno = $f->reviertefecha2($res['examen_fecha_retorno']);
			
			$arreglodatos[$i]['id_examen'] = $res['id_examen'];
			$arreglodatos[$i]['tipoexamen_nombre'] = $res['tipoexamen_nombre'];
			$arreglodatos[$i]['num_examen'] = $res['num_examen'];
			$arreglodatos[$i]['examen_nombre_paciente'] = $res['examen_nombre_paciente'];
			$arreglodatos[$i]['examen_fecha'] = $fecha_examen;
			$arreglodatos[$i]['examen_fecha_retorno'] = $fecha_examen_retorno;
			$arreglodatos[$i]['examen_estado'] = $res['examen_estado'];
			$arreglodatos[$i]['examen_diagnostico'] = $res['examen_diagnostico'];
			$arreglodatos[$i]['examen_destino'] = $res['examen_destino'];
			$arreglodatos[$i++]['examen_nombre_usuario'] = $res['examen_nombre_usuario'];
			
		}
 		
		return $arreglodatos;
 	}
 	
 	/**
	 * Busca examen especifico en el sistema.
	 *
	 * @param id_examen
	 * @name get_examen
	 * @return Examen[]
	 */
 	function get_examenid($id_examen){
 		
 		$sql = "SELECT examen.id_examen, tipo_examen.tipoexamen_nombre, unidad.unidad_nombre, examen.num_examen, examen.examen_nombre_paciente, examen.examen_fecha, 
					   examen.examen_fecha_retorno, examen.examen_estado,examen.examen_diagnostico, examen.examen_destino, examen.examen_nombre_usuario
				FROM examen
					Inner Join examen_tiene_tipoexamen ON examen.id_examen = examen_tiene_tipoexamen.id_examen
					Inner Join tipo_examen ON tipo_examen.id_tipoexamen = examen_tiene_tipoexamen.id_tipoexamen
					Inner Join unidad ON unidad.id_unidad = examen.id_unidad
				WHERE examen.id_examen = ".$id_examen." ";
 		
 		$bd = new Basedatos();
		$resultado = $bd->ejecutar_sql_archivo($sql);
		
		$arreglodatos = array();
		$i = 0;
		
		while($res = mysql_fetch_array($resultado)){
			
			$f = new Utiles();
    	
			$fecha_examen = $f->reviertefecha2($res['examen_fecha']);
			$fecha_examen_retorno = $f->reviertefecha2($res['examen_fecha_retorno']);
			
			$arreglodatos[$i]['id_examen'] = $res['id_examen'];
			$arreglodatos[$i]['tipoexamen_nombre'] = $res['tipoexamen_nombre'];
			$arreglodatos[$i]['unidad_nombre'] = $res['unidad_nombre'];
			$arreglodatos[$i]['num_examen'] = $res['num_examen'];
			$arreglodatos[$i]['examen_nombre_paciente'] = $res['examen_nombre_paciente'];
			$arreglodatos[$i]['examen_fecha'] = $res['examen_fecha'];
			$arreglodatos[$i]['examen_fecha_retorno'] = $res['examen_fecha_retorno'];
			$arreglodatos[$i]['examen_estado'] = $res['examen_estado'];
			$arreglodatos[$i]['examen_diagnostico'] = $res['examen_diagnostico'];
			$arreglodatos[$i]['examen_destino'] = $res['examen_destino'];
			$arreglodatos[$i++]['examen_nombre_usuario'] = $res['examen_nombre_usuario'];
			
		}
 		
		return $arreglodatos;
 	}
 	
 }
 
 
 
 