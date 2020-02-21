<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelUPSM extends CI_Model {

	public $modelo;
	public $capacidad;
	public $funcionalidad;
	public $marca;





	public function __construct()
	{
		parent::__construct();
		
	}

	public function modeloXserial(){
		return $this->db->query("

			SELECT ups.SERIALUPS,ups.DISPONIBILIDAD, upsmodelo.MODELOUPS , upsmodelo.CAPACIDAD , upsmodelo.TIPOFUNCIONALIDAD ,upsmodelo.DURABILIDAD ,upsmodelo.MARCA , upsmodelo.IMAGEN
			FROM upsmodelo
			INNER JOIN ups
			ON ups.MODELOUPS = upsmodelo.MODELOUPS
			
			")->result();
	}
	
	public function formUPDModelUps($OB){

		$data = array( 
			
			'CAPACIDAD'=> $OB->capacidad,
			'TIPOFUNCIONALIDAD'=> $OB->funcionalidad, 
			'MARCA'=>$OB->marca
			
			
		);


		$this->db->where('MODELOUPS' , $OB->modelo);
		return $this->db->update('upsmodelo', $data);
		
		
	}

	public function formRegModelUps($obj){
		$this->db->query("
			INSERT INTO `upsmodelo` (`MODELOUPS`, `CAPACIDAD`, `TIPOFUNCIONALIDAD`, `DURABILIDAD`, `MARCA`, `IMAGEN`) 
			VALUES ('$obj->modelo', '$obj->capacidad', '$obj->funcionalidad', NULL, '$obj->marca', NULL);
			");
	}

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */