<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelImpresora extends CI_Model {

	public $serial; 
	public $modelo;
	public $disponibilidad;
	public $fecha;

	public function __construct()
	{
		parent::__construct();
		
	}

// contable
	public function FueraDeServicio(){
		return $this->db->query("SELECT * FROM impresora WHERE disponibilidad like 0 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE impresora.SERIALIMPRESORA = inventario_soporte_hjnc.SERIALIMPRESORA)")->num_rows();
	}
	public function Disponible(){
		return $this->db->query("SELECT * FROM impresora WHERE disponibilidad like 1 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE impresora.SERIALIMPRESORA = inventario_soporte_hjnc.SERIALIMPRESORA)")->num_rows();
	}
	public function Resolver(){
		return  $this->db->query("SELECT * FROM impresora WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE impresora.SERIALIMPRESORA = inventario_soporte_hjnc.SERIALIMPRESORA and DISPONIBILIDAD LIKE '0')")->num_rows();
	}
	public function Correcto(){
		return $this->db->query("SELECT * FROM impresora WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE impresora.SERIALIMPRESORA = inventario_soporte_hjnc.SERIALIMPRESORA and DISPONIBILIDAD LIKE '1')")->num_rows();		
	}

	public function CantidadTotal(){
		return $this->db->query("SELECT * FROM `impresora`")->num_rows();
	}

	// x

	public function disableImpresora($serialImpr){
		$this->db->query("UPDATE `impresora` SET `DISPONIBILIDAD` = '0' WHERE `impresora`.`SERIALIMPRESORA` = '$serialImpr'");
	}

	public function AllImpresora(){
		return $this->db->query("select * from impresora")->result();
	}

	public function DatosPerfil($s){
		return $this->db->query("SELECT * FROM `impresora` WHERE SERIALIMPRESORA LIKE '$s'")->result();
	}

	public function formUPDImpresora($OB){


		$data = array( 
			'MODELOIMP'=> $OB->modelo, 
			// 'DISPONIBILIDAD'=> $OB->disponibilidad
			'FINARRIENDOIMP'=> $OB->fecha
		);

		$this->db->where('SERIALIMPRESORA' , $OB->serial);
		return 	$this->db->update('impresora', $data);
		

		


	}
	public function formRegImpresora($obj){
		$this->db->query("


			INSERT INTO `impresora` (`SERIALIMPRESORA`, `MODELOIMP`, `DISPONIBILIDAD`, `FINARRIENDOIMP`) VALUES ('$obj->serial', '$obj->modelo', '$obj->disponibilidad', '$obj->fecha');



			");
	}

}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */


	// -- INSERT INTO `impresora` (`SERIALIMPRESORA`, `MODELOIMP`, `DISPONIBILIDAD`)
	// 		-- VALUES ('$obj->serial', '$obj->modelo', '$obj->disponibilidad');