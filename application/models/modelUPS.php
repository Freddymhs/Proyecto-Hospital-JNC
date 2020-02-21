<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelUPS extends CI_Model {

	public $serial;
	public $modelo;
	public $disponibilidad;

	public function __construct()
	{
		parent::__construct();
		
	}

// contable
	public function FueraDeServicio(){
		return $this->db->query("SELECT * FROM ups WHERE disponibilidad like 0 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE ups.SERIALUPS = inventario_soporte_hjnc.SERIALUPS)")->num_rows();
	}
	public function Disponible(){
		return $this->db->query("SELECT * FROM ups WHERE disponibilidad like 1 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE ups.SERIALUPS = inventario_soporte_hjnc.SERIALUPS)")->num_rows();
	}
	public function Resolver(){
		return  $this->db->query("SELECT * FROM ups WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE ups.SERIALUPS = inventario_soporte_hjnc.SERIALUPS and DISPONIBILIDAD LIKE '0')")->num_rows();
	}
	public function Correcto(){
		return $this->db->query("SELECT * FROM ups WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE ups.SERIALUPS = inventario_soporte_hjnc.SERIALUPS and DISPONIBILIDAD LIKE '1')")->num_rows();		
	}

	public function CantidadTotal(){
		return $this->db->query("SELECT * FROM `ups`")->num_rows();
	}

	// x

	public function disableUPS($serialUps){
		$this->db->query("UPDATE `ups` SET `DISPONIBILIDAD` = '0' WHERE `ups`.`SERIALUPS` = '$serialUps'");

	}
	public function AllUPs(){
		return  $this->db->query("SELECT * FROM `ups`")->result();
	}
	public function DatosPerfil($s){
		return $this->db->query("SELECT * FROM `ups`  WHERE `SERIALUPS`  LIKE '$s'")->result();
	}

	

	public function formUpdUps($OB){
		$data = array( 
			'MODELOUPS'=> $OB->modelo, 
			// 'DISPONIBILIDAD'=> $OB->disponibilidad
		);

		$this->db->where('SERIALUPS' , $OB->serial);
		return 	$this->db->update('ups', $data);
		

		


	}

	public function formRegUps($obj){
		$this->db->query("
			INSERT INTO `ups` (`SERIALUPS`, `MODELOUPS`, `DISPONIBILIDAD`) 
			VALUES ('$obj->serial', '$obj->modelo', '$obj->disponibilidad');
			");
	}

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */