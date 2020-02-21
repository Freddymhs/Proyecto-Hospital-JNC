<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelUnidad extends CI_Model {

	
	public $nombre;
	public $ubicacionPasada;
	public $especificacion;


	public function __construct()
	{
		parent::__construct();
		
	}
	public function ASignaAInventario(){
		
	}

	public function formRegUnidad($obj){
		$this->db->query("
			INSERT INTO `unidad` (`NOMBREUNIDAD`, `UBICACIONACTUAL`, `UBICACIONANTERIOR`, `ESPECIFICACION`)
			VALUES ('$obj->nombre', NULL, NULL, '$obj->especificacion');
			");
	}

	public function TodasLasUnidades(){ // siempre estaran disponibles , tienen o no inventario dentro pero se le permitira cambiar el nombre a la unidad
		return	$this->db->query("SELECT * FROM `unidad` ORDER BY `NOMBREUNIDAD` ASC")->result();
	}

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */