<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllerMonitor extends CI_Controller {

///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso///sin uso
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
	public function ON($serial){
		$this->load->model('modelMonitor');
		$this->modelMonitor->enableMonitor($serial);
		
	}
	public function OFF($serial){
		$this->load->model('modelMonitor');
		$this->modelMonitor->disableMonitor($serial);


	}

	
	public function informacion($serial){
		$this->load->model('modelMonitor');
		$d = $this->modelMonitor->DatosPerfil($serial);
		$contenido['monitor'] = $d;
		$this->load->view('WEBpageRegistroInventario/perfilElemento/monitor.php',$contenido );
	}

}

/* End of file controllerComputador.php */
/* Location: ./application/controllers/controllerComputador.php */