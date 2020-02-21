<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelComputadorM extends CI_Model {

	public $modelo;
	public $disco1;
	public $disco2;
	public $procesador;
	public $ram;
	public $so;
	public $marca;
	public $imagen;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function modeloXserial(){

		return $this->db->query("
			SELECT computador.SERIALCOMPUTADOR ,computador.NETBIOS, computador.DIRECCIONMAC,computador.DISPONIBILIDAD,computador.FINARRIENDOPC,computadormodelo.MODELOCOMP , computadormodelo.DISCODUROPRIM , computadormodelo.DISCODUROSEC ,computadormodelo.PROCESADOR ,computadormodelo.MEMORIARAM , computadormodelo.SO, computadormodelo.MARCA,computadormodelo.IMAGEN
			FROM computadormodelo
			INNER JOIN computador
			ON computador.MODELOCOMP = computadormodelo.MODELOCOMP 
			")->result();
	}
	

	
	public function formUpdateMdeoloComputador($OB){

		$data = array( 
			'DISCODUROPRIM'=> $OB->disco1, 
			'DISCODUROSEC'=> $OB->disco2,
			'PROCESADOR'=> $OB->procesador, 
			'MEMORIARAM'=>$OB->ram,
			'SO'=>$OB->so,
			'MARCA'=>$OB->marca
			
		);



		// var_dump($OB);

		$this->db->where('MODELOCOMP' , $OB->modelo);
		return 	$this->db->update('computadormodelo', $data);
	}


	public function formRegModeloComputador($obj){
		$this->db->query("
			INSERT INTO `computadormodelo` (`MODELOCOMP`, `DISCODUROPRIM`, `DISCODUROSEC`, `PROCESADOR`, `MEMORIARAM`, `SO`, `MARCA`, `IMAGEN`) 
			VALUES ('$obj->modelo', '$obj->disco1', '$obj->disco2', '$obj->procesador', '$obj->ram', '$obj->so', '$obj->marca', NULL);
			");

	}




}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */