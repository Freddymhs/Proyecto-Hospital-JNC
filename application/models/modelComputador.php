<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelComputador extends CI_Model {


	public $serialPc;
	public $modelo;
	public $netbios;
	public $dirMac;
	public $disponibilidad;
	public $finArriendo;



	public function __construct()
	{
		parent::__construct();
		
	}
	
// contable
	public function FueraDeServicio(){
		return $this->db->query("SELECT * FROM computador WHERE disponibilidad like 0 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE computador.SERIALCOMPUTADOR = inventario_soporte_hjnc.SERIALCOMPUTADOR)")->num_rows();
	}
	public function Disponible(){
		return $this->db->query("SELECT * FROM computador WHERE disponibilidad like 1 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE computador.SERIALCOMPUTADOR = inventario_soporte_hjnc.SERIALCOMPUTADOR)")->num_rows();
	}
	public function Resolver(){
		return  $this->db->query("SELECT * FROM computador WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE computador.SERIALCOMPUTADOR = inventario_soporte_hjnc.SERIALCOMPUTADOR and DISPONIBILIDAD LIKE '0')")->num_rows();
	}
	public function Correcto(){
		return $this->db->query("SELECT * FROM computador WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE computador.SERIALCOMPUTADOR = inventario_soporte_hjnc.SERIALCOMPUTADOR and DISPONIBILIDAD LIKE '1')")->num_rows();		
	}

	public function CantidadTotal(){
		return $this->db->query("SELECT * FROM `computador`")->num_rows();
	}

	// x

	public function disablePc($serialPC){
		$this->db->query("UPDATE `computador` SET `DISPONIBILIDAD` = '0' WHERE `computador`.`SERIALCOMPUTADOR` = '$serialPC'");	
	}

	public function AllPc(){
		return  $this->db->query("select * from computador")->result();
	}





	public function formUpdatePC($OB){


		$data = array( 
			'MODELOCOMP'=> $OB->modelo, 
			'NETBIOS'=> $OB->netbios,
			'DIRECCIONMAC'=> $OB->dirMac, 
			'FINARRIENDOPC'=>$OB->finArriendo
		);



		// var_dump($OB);
		
		$this->db->where('SERIALCOMPUTADOR' , $OB->serialPc);
		return 	$this->db->update('computador', $data);
		

		


	}

	public function DatosPerfil($s){
		return $this->db->query("select * from computador WHERE SERIALCOMPUTADOR LIKE '$s'")->result();
	}

	public function formRegComputador($obj){
		$this->db->query("

			INSERT INTO `computador` (`SERIALCOMPUTADOR`, `MODELOCOMP`, `NETBIOS`, `DIRECCIONMAC`, `DISPONIBILIDAD`, `FINARRIENDOPC`) 
			VALUES ('$obj->serialPc', '$obj->modelo', '$obj->netbios', '$obj->dirMac', '$obj->disponibilidad', '$obj->finArriendo');
			
			");
	}


	

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */