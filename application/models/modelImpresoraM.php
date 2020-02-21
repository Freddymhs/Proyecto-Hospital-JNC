<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelImpresoraM extends CI_Model {

	public $modelo;
	public $funcionalidades;
	public $durabilidad;
	public $marca;
	public $imagen;



	public function __construct()
	{
		parent::__construct();
		
	}


	public function modeloXserial(){
		return $this->db->query("

			SELECT impresora.SERIALIMPRESORA , impresora.DISPONIBILIDAD, impresora.FINARRIENDOIMP,impresoramodelo.MODELOIMP , impresoramodelo.TIPOFUNCIONALIDADES , impresoramodelo.DURABILIDAD ,impresoramodelo.MARCA ,impresoramodelo.IMAGEN 
			FROM impresoramodelo
			INNER JOIN impresora
			ON impresora.MODELOIMP = impresora.MODELOIMP 
			
			")->result();
	}

	public function formParaUpdateModeloIMpr($OB){

		$data = array( 
			'TIPOFUNCIONALIDADES'=> $OB->funcionalidades, 
			'MARCA'=> $OB->marca
			
		);


		$this->db->where('MODELOIMP' , $OB->modelo);
		return $this->db->update('impresoramodelo', $data);
		
		
	}

	public function formRegModelImpresora($obj){
		$this->db->query("
			INSERT INTO `impresoramodelo` (`MODELOIMP`, `TIPOFUNCIONALIDADES`, `DURABILIDAD`, `MARCA`, `IMAGEN`) 
			VALUES ('$obj->modelo', '$obj->funcionalidades', NULL, '$obj->marca', NULL);
			");
	}

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */