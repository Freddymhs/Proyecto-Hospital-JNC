<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelMonitorM extends CI_Model {

	public $modelo;
	public $funcionalidad;
	public $resolucion;
	public $pulgadas;
	public $marca;
	public $durabilidad;
	public $imagen;


	public function __construct()
	{
		parent::__construct();
		
	}

	public function modeloXserial(){
		return $this->db->query("

			SELECT monitor.SERIALMONITOR , monitor.MODELOMON ,monitor.DISPONIBILIDAD ,monitor.FINARRIENDOMONITOR , monitormodelo.MODELOMON , monitormodelo.TIPOFUNCIONALIDADES , monitormodelo.RESOLUCION ,monitormodelo.PULGADAS ,monitormodelo.MARCA , monitormodelo.DURABILIDAD, monitormodelo.IMAGEN
			FROM monitormodelo
			INNER JOIN monitor
			ON monitor.MODELOMON = monitormodelo.MODELOMON 
			")->result();
	}
	
	

	public function formParaUpdateModeloMOnitor($OB){

		$data = array( 
			'TIPOFUNCIONALIDADES'=> $OB->funcionalidad, 
			'RESOLUCION'=> $OB->resolucion,
			'PULGADAS'=> $OB->pulgadas, 
			'MARCA'=>$OB->marca
			

		);


		$this->db->where('MODELOMON' , $OB->modelo);
		return $this->db->update('monitormodelo', $data);
		
		
	}


	public function formRegModeloMonitor($obj){

		$this->db->query("
			INSERT INTO `monitormodelo` (`MODELOMON`, `TIPOFUNCIONALIDADES`, `RESOLUCION`, `PULGADAS`, `MARCA`, `DURABILIDAD`, `IMAGEN`) 
			VALUES ('$obj->modelo', '$obj->funcionalidad', '$obj->resolucion', '$obj->pulgadas', '$obj->marca', NULL, NULL);
			");
	}

}

/* End of file modelMonitorM.php */
/* Location: ./application/models/modelMonitorM.php */