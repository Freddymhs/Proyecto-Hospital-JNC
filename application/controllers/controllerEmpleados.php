<?php

class controllerEmpleados extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');
		// disable_cache();
	}



	public function informacion($rut){
		$this->load->model('modelEmpleados');
		$d = $this->modelEmpleados->RowDelEmpleado($rut);
		$contenido['personaDatos'] = $d;
		$this->load->view('WEBpageRegistroInventario/perfilElemento/Empleado.php',$contenido );
	}


	public function ViewDatoPersona($d)
	{
		$this->load->model('modelEmpleados');
		$res = $this->modelEmpleados->buscaUsuario($d);

		$conteidos['conteidos'] = $res;
		$this->load->view('WEBgestionUsuario/formularioVistaUnica', $conteidos);
	}


	public function UpdatePersonaD()
	{

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txtF1', 'RUT', 'required|min_length[9]|max_length[9]|trim|alpha_numeric'); // necesario siempre....
		$this->form_validation->set_rules('txtF2', 'Nombre', 'required|min_length[3]|max_length[44]'); // necesario siempre....
		$this->form_validation->set_rules('txtF3', 'Contraseña', 'required|min_length[3]|max_length[44]'); // necesario siempre....
		$this->form_validation->set_rules('txtF5', 'Correo', 'required|min_length[5]|max_length[44]|trim'); // necesario siempre....
		$this->form_validation->set_rules('txtF4', 'Rol', 'required'); // necesario siempre....


		if ($this->form_validation->run() == FALSE) { // form NO valido 
			$this->ViewDatoPersona($this->input->post("txtF1"));
			echo "<script>alert('el nombre debe tener minimo 3 caracteres , su contraseña 3 y el correo minimo 5 , complete todos los campos');</script>";
		} else {
			$this->load->model('modelEmpleados');
			$r = $this->modelEmpleados->RowDelEmpleado($rut);
			$QT = new modelEmpleados;
			$QT->rut  = $this->input->post("txtF1");
			$QT->nombreRol =  $this->input->post("txtF4");
			$QT->nombres =  $this->input->post("txtF2");
			$QT->password =  $this->input->post("txtF3");
			$QT->correo =  $this->input->post("txtF5");
			$QT->disponibilidad = "1";
			$this->modelEmpleados->updateUsuarioInForm($QT);
		}
	}





	public function LoginFmarcosDev()
	{
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtusuario', 'RUT', 'required|numeric');
		$this->form_validation->set_rules('txtpassword', 'Contraseña', 'required');

		if ($this->form_validation->run() == FALSE) { // form NO valido 
			$this->load->view('pageLogin');
		} else {  // form VAlido

			$this->load->model('modelEmpleados');
			$usr  = $this->input->post('txtusuario');
			$pwd  = $this->input->post('txtpassword');
			$existePersona = $this->modelEmpleados->metodoValidaForm($usr, $pwd);

			if ((count($existePersona) > 0)) {
				$RUTfound = $this->modelEmpleados->obtenerRut($usr, $pwd);
				$NOMBREfound = $this->modelEmpleados->obtenerNombre($usr, $pwd);
				$this->session->set_userdata('RutIngreso', $RUTfound);


				$NOMBREfound = explode(" ", trim($NOMBREfound));
				$this->session->set_userdata('NombreIngreso', $NOMBREfound[0]);


				$CARGOfound = $this->modelEmpleados->obtenerCargo($usr, $pwd);
				$this->session->set_userdata('CargoAsignado', $CARGOfound);

				if ($this->session->CargoAsignado == 'basico') {
					redirect('controllerEmpleados/pageHomeBasico','refresh');
				}




				redirect('controllerEmpleados/pageHome');
			} else {
				echo "<script>alert('Sus datos no estan registrados');</script>";
				redirect('controllerEmpleados/LoginFmarcosDev', 'refresh');
			}
		}
	} //end login

	public function DeletePersona($d)
	{
		$this->load->model('modelEmpleados');

		//existe o no para borrar y avisar ademas de ver si es el ultimo superadmin
		$resutlado = $this->modelEmpleados->BorrarUsr($d);
	}




	public function updateDatosUsuario()
	{
		$this->load->model('modelEmpleados');
		$updObj = new modelEmpleados;
		$updObj->rut = $this->input->post("txtRut");
		$updObj->nombres = $this->input->post("txtnewNombres");
		$updObj->password = $this->input->post("txtnewPasswrd");
		$updObj->correo = $this->input->post("txtnewCorreo");
		$action =	$this->modelEmpleados->ActualizaPerfilUsuario($updObj);
		redirect('controllerEmpleados/pagePerfilEmpleado');
	}

	public function BorrarUsuario()
	{

		$this->load->model('modelEmpleados');
		$rutDel = $this->input->post("txtDelRut");

		///
		$cargo =  $this->modelEmpleados->BorrarUsr($rutDel);
	}




	public function addData()
	{
		var_dump($this->input->post());

		$this->load->model('modelEmpleados');
		$updObj = new modelEmpleados;
		$updObj->nombreRol = $this->input->post("txtnewRol");
		$updObj->unidad =  $this->input->post("txtnewUnidad");
		$updObj->nombres = $this->input->post("txtnewNombres");
		$updObj->password = $this->input->post("txtnewPasswrd");
		$updObj->correo = $this->input->post("txtnewCorreo");
		$updObj->disponibilidad = $this->input->post("txtnewDisponibilidad");

		$action =	$this->modelEmpleados->UPDATEusuario($updObj);
		if ($action) {
			echo 'logrado';
		} else {
			echo 'no logrado';
		}
	}


	public function fomularioElementos()
	{


		//setp 1
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('collapTelefonoNum', 'Numero Telefonico', 'is_unique[telefono.NROANEXO]|min_length[4]|max_length[4]|numeric');
		// step2
		if ($this->form_validation->run() == FALSE) {

			$d1 = $this->db->query("SELECT * FROM `empleados` ORDER BY `RUT` ASC ")->result();
			$d2 = $this->db->query("SELECT * FROM `telefono`  ")->result();
			$d3 = $this->db->query("SELECT * FROM `unidad`")->result();
			$d4 = $this->db->query("SELECT * FROM `monitormodelo`  ")->result();
			$d5 = $this->db->query("SELECT * FROM `computadormodelo` ")->result();
			$d6 = $this->db->query("SELECT * FROM `impresoramodelo` ")->result();
			$d7 = $this->db->query("SELECT * FROM `upsmodelo`  ")->result();

			$contenidos["listpersonas"] = $d1;
			$contenidos["listtelefonos"] = $d2;
			$contenidos["listunidades"] = $d3;
			$contenidos["listmonitores"] = $d4;
			$contenidos["listcomputadores"] = $d5;
			$contenidos["listimpresoras"] = $d6;
			$contenidos["listups"] = $d7;


			$this->load->view('pageRegistroInventario', $contenidos);
		} else {

			$d1 = $this->db->query("SELECT * FROM `empleados` ORDER BY `RUT` ASC ")->result();
			$d2 = $this->db->query("SELECT * FROM `telefono`  ")->result();
			$d3 = $this->db->query("SELECT * FROM `unidad`")->result();
			$d4 = $this->db->query("SELECT * FROM `monitormodelo`  ")->result();
			$d5 = $this->db->query("SELECT * FROM `computadormodelo` ")->result();
			$d6 = $this->db->query("SELECT * FROM `impresoramodelo` ")->result();
			$d7 = $this->db->query("SELECT * FROM `upsmodelo`  ")->result();

			$contenidos["listpersonas"] = $d1;
			$contenidos["listtelefonos"] = $d2;
			$contenidos["listunidades"] = $d3;
			$contenidos["listmonitores"] = $d4;
			$contenidos["listcomputadores"] = $d5;
			$contenidos["listimpresoras"] = $d6;
			$contenidos["listups"] = $d7;


			$this->load->view('pageRegistroInventario', $contenidos);
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function creandoPersona()
	{
		$this->load->model('modelEmpleados');
		$nuevaPersona = new modelEmpleados;

		$nuevaPersona->rut  = $this->input->post("newRpersona");
		$nuevaPersona->nombreRol = $this->input->post("newRolpersona");
		$nuevaPersona->nombres = $this->input->post("newNpersona");
		$nuevaPersona->password = $this->input->post("newPpersona");
		$nuevaPersona->correo = $this->input->post("newCpersona");
		$nuevaPersona->disponibilidad = "1";

		$r = $this->modelEmpleados->formRegPersona($nuevaPersona);

		if ($r === true) {
			redirect('controllerEmpleados/formularioCreate', 'refresh');
		}
	}


	public function actualizandoPersona()
	{
		$this->load->model('modelEmpleados');
		$nuevaPersona = new modelEmpleados;
		$nuevaPersona->rut  = $this->input->post("newRpersona");
		$nuevaPersona->nombreRol = $this->input->post("newRolpersona");
		$nuevaPersona->nombres = $this->input->post("newNpersona");
		$nuevaPersona->password = $this->input->post("newPpersona");
		$nuevaPersona->correo = $this->input->post("newCpersona");
		$nuevaPersona->disponibilidad = "1";





		$r = $this->modelEmpleados->updateUsuarioInForm($nuevaPersona);
		// $r = $this->modelEmpleados->actualizaEmpleado($nuevaPersona);


	}


	public function PerfilEmpleado($rut)
	{ }

	public function formularioCreate()
	{ //step 1
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// cargar
		$this->load->model('modelEmpleados');
		$roles = $this->modelEmpleados->rolesPosibles();
		$listaUsuarios = $this->modelEmpleados->ListaSOloDisponibles();
		$QT["list"]  = $listaUsuarios;
		$QT["roles"] = $roles;


		// cargar			
		$this->form_validation->set_rules('newRpersona', 'RUT', 'required|min_length[9]|max_length[9]|trim|alpha_numeric|is_unique[empleados.RUT]'); // necesario siempre....
		$this->form_validation->set_rules('newNpersona', 'Nombre', 'required|min_length[1]|max_length[44]'); // necesario siempre....
		$this->form_validation->set_rules('newPpersona', 'Contraseña', 'required|min_length[3]|max_length[44]'); // necesario siempre....
		$this->form_validation->set_rules('newCpersona', 'Correo', 'required|min_length[5]|max_length[44]|trim'); // necesario siempre....
		$this->form_validation->set_rules('newRolpersona', 'Rol', 'required'); // necesario siempre....



		if ($this->form_validation->run() == FALSE) { // form NO valido 
			$this->load->view('pageGestionUsuario', $QT); //formulario para agregar usuarios\
		} else {
			$r = $this->input->post("newRpersona");
			$this->load->model('modelEmpleados');
			$existePErsona = $this->modelEmpleados->ExistenciaPersona($r);

			if (count($existePErsona) > 0) {



				$this->actualizandoPersona();
			} else {
				// preguntar


				$this->creandoPersona();
			}
		}
	}


	public function confirmCreate()
	{ //step 2

		$this->load->model('modelEmpleados');
		$foundData = $this->modelEmpleados->BuscaRutyDisponibilidad($this->input->post("txtRut"));
		if (!empty($foundData)) {
			echo '<script type="text/javascript">alert("este rut ya esta registrado");</script>';
			redirect('controllerEmpleados/formularioCreate', 'refresh');
		} else {
			$nuevoEmpleado = new modelEmpleados;
			$nuevoEmpleado->rut = $this->input->post("txtRut");
			$nuevoEmpleado->nombres	= $this->input->post("txtNombres");
			$nuevoEmpleado->unidad	= $this->input->post("txtUnidad");
			$nuevoEmpleado->nombres	= $this->input->post("txtNombres");
			$nuevoEmpleado->correo	= $this->input->post("txtCorreo");
			$nuevoEmpleado->password = $this->input->post("txtPassword");
			$nuevoEmpleado->nombreRol = $this->input->post("txtRol");

			$existencia = $this->modelEmpleados->buscaUsuario($this->input->post("txtRut"));
			if (!empty($existencia)) {
				$res = $this->modelEmpleados->UPDATEusuario($nuevoEmpleado);
			} else {

				$res = $this->modelEmpleados->ADDusuario($nuevoEmpleado);
			}
			if ($res == true) {
				redirect('controllerEmpleados/formularioCreate');
			} else {
				redirect('controllerEmpleados/formularioCreate');
			}
		}
	}



	public function ADDusuario()
	{
		$this->load->model('modelEmpleados');
		$encontrados = $this->modelEmpleados->VIEWusuarios();
	}

	public function busquedaBasica()
	{
		$this->load->model('modelEmpleados');
		$datos['hello'] = $this->modelEmpleados->mostrarUsuario();
		$this->load->view('Home', $datos);
	}

	public function pageHomeBasico()
	{
		$this->load->model('modelInventarioHJNC');
		$contenido['r'] = $this->modelInventarioHJNC->getInventario();


		$this->load->view('pageHomeBasico', $contenido);
	}
	public function pageHome()
	{
		$this->load->model('modelInventarioHJNC');
		$contenido['r'] = $this->modelInventarioHJNC->getInventario();


		$this->load->view('pageHome', $contenido);
	}

	public function muestraEmpleados()
	{ }


	public function funcionLogOutUsuario()
	{
		session_destroy();
		redirect(base_url());
	}
}





// foreach ($query->result() as $row)
// {
//         echo $row->title;
//         echo $row->name;
//         echo $row->body;
// }
