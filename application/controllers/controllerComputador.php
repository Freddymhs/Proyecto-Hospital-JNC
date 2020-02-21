<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllerComputador extends CI_Controller {

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
	public function ON(){
		
	}
	public function OFF($serial){


	}



	public function informacion($serial){
		$this->load->model('modelComputador');
		$d = $this->modelComputador->DatosPerfil($serial);
		$contenido['computador'] = $d;
		$this->load->view('WEBpageRegistroInventario/perfilElemento/computador.php',$contenido );
	}


}

/* End of file controllerComputador.php */
/* Location: ./application/controllers/controllerComputador.php */