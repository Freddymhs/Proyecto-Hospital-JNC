<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllerUps extends CI_Controller {

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

	



	public function informacion($serial){
		$this->load->model('modelUPS');
		$d = $this->modelUPS->DatosPerfil($serial);
		$contenido['ups'] = $d;
		$this->load->view('WEBpageRegistroInventario/perfilElemento/ups.php',$contenido );
	}

	

}

/* End of file controllerComputador.php */
/* Location: ./application/controllers/controllerComputador.php */