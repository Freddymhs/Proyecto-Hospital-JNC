<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllerBusquedaAvanzada extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		// disable_cache();
	}

	public function index()
	{

	}


	public function PC(){

		$this->load->model('modelComputadorM');
		// forma correcta usadndo $this->modelComputador->AllPc(); + $this->modelComputadorM->modeloXserial(); y marge array
		$contenido['r'] = $this->modelComputadorM->modeloXserial();

		$this->load->view('WEBbusquedaAvanzada/pageSearchPC',$contenido);
	}

	public function Monitor(){
		$this->load->model('modelMonitorM');
		// $this->load->model('modelMonitorM');
		$contenido['r'] = $this->modelMonitorM->modeloXserial();
		$this->load->view('WEBbusquedaAvanzada/pageSearchMonitor', $contenido);
	}

	public function Impresora(){
		$this->load->model('modelImpresoraM');
		
		$conteido['r']=$this->modelImpresoraM->modeloXserial();
		
		$this->load->view('WEBbusquedaAvanzada/pageSearchImpresora',$conteido);
	}
	public function Ups(){
		$this->load->model('modelUPSM');
		// $this->load->model('modelUPSM')
		$conteido['r']=$this->modelUPSM->modeloXserial();
		$this->load->view('WEBbusquedaAvanzada/pageSearchUps', $conteido);
	}
	public function Telefono(){
		$this->load->model('modelTelefono');
		$conteido['rP']= $this->db->query("select * from inventario_soporte_hjnc")->result();
		$conteido['r']=$this->modelTelefono->AllTElefono();
		$this->load->view('WEBbusquedaAvanzada/pageSearchTelefono', $conteido);
	}
	public function personas(){
		$this->load->model('modelEmpleados');
		$conteido['r'] = $this->modelEmpleados->AllPersona();
		
		$this->load->view('WEBbusquedaAvanzada/pageSearchPersonas' ,$conteido);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */