<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelRoles extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function TodosLosRoles(){
		return $this->db->query("SELECT * FROM roles")->result();
	}



}

/* End of file modelComputador.php */
/* Location: ./application/models/modelComputador.php */