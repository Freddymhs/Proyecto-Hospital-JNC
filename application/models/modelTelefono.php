<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelTelefono extends CI_Model {

	public $numero;
	public $disponibilidad;

	public function __construct()
	{
		parent::__construct();
		
	}
	

	public function rowDeTelefono($numero){
		return $this->db->query("SELECT * FROM telefono WHERE NROANEXO = $numero")->result();
	}
	// contable
	public function FueraDeServicio(){
		return $this->db->query("SELECT * FROM telefono WHERE disponibilidad like 0 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE telefono.NROANEXO = inventario_soporte_hjnc.NROANEXO)")->num_rows();
	}
	public function Disponible(){
		return $this->db->query("SELECT * FROM telefono WHERE disponibilidad like 1 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE telefono.NROANEXO = inventario_soporte_hjnc.NROANEXO)")->num_rows();
	}
	public function Resolver(){
		return  $this->db->query("SELECT * FROM telefono WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE telefono.NROANEXO = inventario_soporte_hjnc.NROANEXO and DISPONIBILIDAD LIKE '0')")->num_rows();
	}
	public function Correcto(){
		return $this->db->query("SELECT * FROM telefono WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE telefono.NROANEXO = inventario_soporte_hjnc.NROANEXO and DISPONIBILIDAD LIKE '1')")->num_rows();		
	}

	public function CantidadTotal(){
		return $this->db->query("SELECT * FROM `telefono`")->num_rows();
	}

	// x

	public function disableTelefono($anexo){
		$this->db->query("UPDATE `telefono` SET `DISPONIBILIDAD` = '0' WHERE `telefono`.`NROANEXO` = '$anexo'");
	}

	public function AllTElefono(){
		return $this->db->query("select * from telefono")->result();
	}
	public function formRegTelefono($obj){
		$this->db->query("
			INSERT INTO `telefono` (`NROANEXO`, `DISPONIBILIDAD`) VALUES ('$obj->numero', '$obj->disponibilidad');
			");
	}



}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */