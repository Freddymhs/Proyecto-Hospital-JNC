<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelMonitor extends CI_Model {

	public $modelMonitor;
	
	public $finArriendo;
	public $disponibilidad;

	public $serial;


	public function __construct()
	{
		parent::__construct();
		
	}
// datos contables
	public function FueraDeServicio(){
		return $this->db->query("SELECT * FROM monitor WHERE disponibilidad like 0 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE monitor.SERIALMONITOR = inventario_soporte_hjnc.SERIALMONITOR)")->num_rows();
	}
	public function Disponible(){
		return $this->db->query("SELECT * FROM monitor WHERE disponibilidad like 1 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE monitor.SERIALMONITOR = inventario_soporte_hjnc.SERIALMONITOR)")->num_rows();
	}
	public function Resolver(){
		return  $this->db->query("SELECT * FROM monitor WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE monitor.SERIALMONITOR = inventario_soporte_hjnc.SERIALMONITOR and DISPONIBILIDAD LIKE '0')")->num_rows();
	}
	public function Correcto(){
		return $this->db->query("SELECT * FROM monitor WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE monitor.SERIALMONITOR = inventario_soporte_hjnc.SERIALMONITOR and DISPONIBILIDAD LIKE '1')")->num_rows();		
	}

	public function CantidadTotal(){
		return $this->db->query("SELECT * FROM `monitor`")->num_rows();
	}



//
	public function MonitoresActivos(){

	}

	public function enableMonitor($serial){
		$this->db->query("UPDATE `monitor` SET `DISPONIBILIDAD` = '1' WHERE `monitor`.`SERIALMONITOR` = '$serialMtr'");
	}

	public function disableMonitor($serialMtr){
		$this->db->query("UPDATE `monitor` SET `DISPONIBILIDAD` = '0' WHERE `monitor`.`SERIALMONITOR` = '$serialMtr'");
	}

	public function AllMonitores(){
		return $this->db->query("select * from monitor")->result();
	}
	
	public function formUpdateMONItor($OB){


		$data = array( 
			'MODELOMON'=> $OB->modelMonitor, 
			// 'DISPONIBILIDAD'=> $OB->disponibilidad,
			'FINARRIENDOMONITOR'=> $OB->finArriendo
		);

		$this->db->where('SERIALMONITOR' , $OB->serial);
		return 	$this->db->update('monitor', $data);
		

		


	}


	public function DatosPerfil($s){
		return $this->db->query("SELECT * FROM `monitor` WHERE SERIALMONITOR LIKE '$s'")->result();
	}

	public function formRegMonitor($obj){
		$this->db->query("
			INSERT INTO `monitor` (`SERIALMONITOR`, `MODELOMON`, `DISPONIBILIDAD`, `FINARRIENDOMONITOR`) 
			VALUES ('$obj->serial', '$obj->modelMonitor', '$obj->disponibilidad', '$obj->finArriendo');
			");

	}

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */