<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllerMonitorM extends CI_Controller {

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

}

/* End of file controllerComputador.php */
/* Location: ./application/controllers/controllerComputador.php */