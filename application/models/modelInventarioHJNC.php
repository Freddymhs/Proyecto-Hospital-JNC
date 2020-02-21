<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelInventarioHJNC extends CI_Model {

	
	public $ipv6;
	public $idInventario;  //done
	public $PERSONA; // 
	public $TELEFONO;// 
	public $ipv4;    // 
	public $red;     // 	
	public $IMPRESORA;	//
	public $MONITOR;//
	public $UNIDAD; // 
	public $PC; 	//
	public $UPS;	//
	

	public function __construct()
	{
		parent::__construct();
		
	}



	Public function busquedaElementos($ELEMENTO , $ELEMENTO2){
		return $this->db->query("SELECT * FROM $ELEMENTO WHERE DISPONIBILIDAD LIKE $ELEMENTO2 ORDER BY 1 ASC")->result();
	}
	



	public function getInventario(){
		return $this->db->query("	SELECT 
			inventario_soporte_hjnc.RUT,
			inventario_soporte_hjnc.ID_INVENTARIO,
			empleados.NOMBRES,
			inventario_soporte_hjnc.NROANEXO,
			inventario_soporte_hjnc.SERIALMONITOR,
			monitor.MODELOMON,
			monitor.FINARRIENDOMONITOR,
			inventario_soporte_hjnc.SERIALCOMPUTADOR,
			computador.MODELOCOMP,

			computador.DISPONIBILIDAD as dispPC,
			monitor.DISPONIBILIDAD as dispMonitor,
			impresora.DISPONIBILIDAD as disIMPR,
			ups.DISPONIBILIDAD as disUPS,
			empleados.DISPONIBILIDAD as dispEMpleados,
			telefono.DISPONIBILIDAD as dispTelefono,

			computador.NETBIOS,
			computador.DIRECCIONMAC,
			computador.FINARRIENDOPC,
			inventario_soporte_hjnc.SERIALIMPRESORA,
			impresora.MODELOIMP,
			impresora.FINARRIENDOIMP,
			inventario_soporte_hjnc.SERIALUPS,
			ups.MODELOUPS,
			inventario_soporte_hjnc.DIRECCIONIPV4,
			inventario_soporte_hjnc.RED,
			inventario_soporte_hjnc.NOMBREUNIDAD
			from inventario_soporte_hjnc 
			left join computador on inventario_soporte_hjnc.SERIALCOMPUTADOR = computador.SERIALCOMPUTADOR
			left join monitor on inventario_soporte_hjnc.SERIALMONITOR = monitor.SERIALMONITOR
			left join empleados on inventario_soporte_hjnc.RUT = empleados.RUT
			left join unidad on inventario_soporte_hjnc.NOMBREUNIDAD = unidad.NOMBREUNIDAD
			left JOIN telefono on inventario_soporte_hjnc.NROANEXO = telefono.NROANEXO
			left JOIN impresora on inventario_soporte_hjnc.SERIALIMPRESORA = impresora.SERIALIMPRESORA
			left JOIN ups on inventario_soporte_hjnc.SERIALUPS = ups.SERIALUPS
			")->result(); 
	}

	
	public function ObtenDato($idseleccionada){
		return	$this->db->query(" select * from inventario_soporte_hjnc WHERE ID_INVENTARIO LIKE '$idseleccionada' ")->result();
	}


	
	public function metodoUPDATEInventario($OB){

		$data = array( 
			
			'RUT'=> $OB->PERSONA, 
			'DIRECCIONIPV4'=> $OB->ipv4,
			'NROANEXO'=> $OB->TELEFONO, 
			'SERIALCOMPUTADOR'=> $OB->PC,
			'SERIALIMPRESORA'=> $OB->IMPRESORA, 
			'SERIALUPS'=> $OB->UPS, 
			'SERIALMONITOR'=> $OB->MONITOR, 
			'NOMBREUNIDAD'=> $OB->UNIDAD, 
			'DIRECCIONIPV6'=> NULL, 
			'RED'=> $OB->red
		);

		// var_dump($OB);
		$this->db->where('ID_INVENTARIO' , $OB->idInventario);
		return 	$this->db->update('inventario_soporte_hjnc', $data);



	}
	
	public function metodoADDinventario($OB){

		$data = array( 
			'ID_INVENTARIO'  => NULL, 
			'RUT'=> $OB->PERSONA, 
			'DIRECCIONIPV4'=> $OB->ipv4,
			'NROANEXO'=> $OB->TELEFONO, 
			'SERIALCOMPUTADOR'=> $OB->PC,
			'SERIALIMPRESORA'=> $OB->IMPRESORA, 
			'SERIALUPS'=> $OB->UPS, 
			'SERIALMONITOR'=> $OB->MONITOR, 
			'NOMBREUNIDAD'=> $OB->UNIDAD, 
			'DIRECCIONIPV6'=> NULL, 
			'RED'=> $OB->red
		);
		return $this->db->insert('inventario_soporte_hjnc', $data);

	}


	

}

/* End of file modelInventarioHJNC.php */
/* Location: ./application/models/modelInventarioHJNC.php */