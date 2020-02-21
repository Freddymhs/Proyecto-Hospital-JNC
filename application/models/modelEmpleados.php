<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelEmpleados extends CI_Model
{

	public $rut;
	public $nombreRol;


	public $nombres;

	public $password;
	public $correo;
	public $disponibilidad;


	public function __construct()
	{
		parent::__construct();
	}


// contable
	public function FueraDeServicio(){
		return $this->db->query("SELECT * FROM empleados WHERE disponibilidad like 0  AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE empleados.RUT = inventario_soporte_hjnc.RUT)")->num_rows();
	}
	public function Disponible(){
		return $this->db->query("SELECT * FROM empleados WHERE disponibilidad like 1 AND NOT EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE empleados.RUT = inventario_soporte_hjnc.RUT)")->num_rows();
	}
	public function Resolver(){
		return  $this->db->query("SELECT * FROM empleados WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE empleados.RUT = inventario_soporte_hjnc.RUT and DISPONIBILIDAD LIKE '0')")->num_rows();
	}
	public function Correcto(){
		return $this->db->query("SELECT * FROM empleados WHERE EXISTS (SELECT * FROM inventario_soporte_hjnc WHERE empleados.RUT = inventario_soporte_hjnc.RUT and DISPONIBILIDAD LIKE '1')")->num_rows();		
	}

	public function CantidadTotal(){
		return $this->db->query("SELECT * FROM `empleados`")->num_rows();
	}

	// x
	public function RowDelEmpleado($r)
	{

		return $this->db->query("SELECT * FROM `empleados` WHERE RUT LIKE '$r'")->result();
	}



	// public function ActualizaEmpleadoCompleto($OB){



	// 	$data = array( 
	// 		'NOMBREROL'=> $OB->nombreRol, 
	// 		'NOMBRES'=> $OB->nombres,
	// 		'PASSWORD'=> $OB->password,
	// 		'DISPONIBILIDAD'=>$OB->disponibilidad,
	// 		'CORREOELECTRONICO'=>$OB->correo,
	// 	);

	// 	$this->db->where('RUT' , $OB->rut);
	// 	return	$this->db->update('empleados', $data);


	// }



	public function AllPersona()
	{
		return $this->db->query("SELECT * FROM `empleados` ORDER BY `RUT` ASC")->result();
	}


	public function updateUsuarioInForm($OB)
	{

		////////////////////////////=======================================================================step1 , busca rut
		$res = $this->db->query("select * from empleados WHERE RUT LIKE '$OB->rut' ")->result();
		if (!empty($res)) { //existe persona x rut
			////////////////////////////================================================================================setp2 , importancia del rol
			if ($res[0]->NOMBREROL == 'superadmin') {
				// este rol es demaciado imporante pero revisaremos si existe otra persona de igual importancia
				/////////////////////////////////////////==================================================================================step3 , existe otro o no				
				$existente = $this->db->query("SELECT * from empleados WHERE RUT not LIKE '$OB->rut' and NOMBREROL LIKE 'superadmin' and disponibilidad LIKE '1'")->result(); //finx aca
				if (!empty($existente)) { //existe otro usuario superadmin

					$data = array(
						'NOMBREROL' => $OB->nombreRol,
						'NOMBRES' => $OB->nombres,
						'CORREOELECTRONICO' => $OB->correo,
						'PASSWORD' => $OB->password,
						'DISPONIBILIDAD' => $OB->disponibilidad
					);
					$this->db->where('RUT', $OB->rut);
					$this->db->update('empleados', $data);


					echo '<script type="text/javascript">alert("Correcto");</script>';		 	//disponiblidad en false
					redirect('controllerEmpleados/formularioCreate', 'refresh');
				} else { //no existe otro
					echo '<script type="text/javascript">alert("No existe usuario reemplazo para SUPERADMIN");</script>';
					redirect('controllerEmpleados/formularioCreate', 'refresh');
				}
			} else { //no es superadmin y modifica

				echo '<script type="text/javascript">alert("Correcto");</script>';		 	//disponiblidad en false


				$data = array(
					'NOMBREROL' => $OB->nombreRol,
					'NOMBRES' => $OB->nombres,
					'CORREOELECTRONICO' => $OB->correo,
					'PASSWORD' => $OB->password,
					'DISPONIBILIDAD' => $OB->disponibilidad
				);
				$this->db->where('RUT', $OB->rut);
				$this->db->update('empleados', $data);
				redirect('controllerEmpleados/formularioCreate', 'refresh');
			}
		} else { //no existe la persona x rut


			echo '<script type="text/javascript">alert("rut no encontrado , nada que modificar");</script>';
			redirect('controllerEmpleados/formularioCreate', 'refresh');
		}
	}



	// public function removePersona($OB){
	// 	return $this->db->query("UPDATE `empleados` SET `DISPONIBILIDAD` = '0' WHERE `empleados`.`RUT` = '$OB->rut';");
	// }



	public function ExistenciaPersona($rut)
	{
		return	$this->db->query("SELECT * FROM empleados WHERE RUT LIKE '$rut'")->result();
	}



	public function actualizaEmpleado($OB)
	{


		$data = array(
			'NOMBREROL' => $OB->nombreRol,
			'NOMBRES' => $OB->nombres,
			'CORREOELECTRONICO' => $OB->correo,
			'DISPONIBILIDAD' => $OB->disponibilidad
		);



		// var_dump($OB);

		$this->db->where('RUT', $OB->rut);
		return 	$this->db->update('empleados', $data);
	}
	public function ListaSOloDisponibles()
	{
		return $this->db->query("SELECT RUT,NOMBREROL,NOMBRES,CORREOELECTRONICO,DISPONIBILIDAD FROM `empleados` WHERE DISPONIBILIDAD LIKE '1'")->result();
	}
	public function ListaUsuarios()
	{
		return $this->db->query("SELECT RUT,NOMBREROL,NOMBRES,CORREOELECTRONICO,DISPONIBILIDAD FROM `empleados` WHERE 1	")->result();
	}
	public function rolesPosibles()
	{
		return 	$this->db->query("SELECT * FROM `roles`")->result();
	}

	public function formRegPersona($obj)
	{
		return $this->db->query("INSERT INTO `empleados` (`RUT`, `NOMBREROL`, `NOMBRES`, `PASSWORD`, `CORREOELECTRONICO`, `DISPONIBILIDAD`)
			VALUES ('$obj->rut', '$obj->nombreRol', '$obj->nombres', '$obj->password', '$obj->correo', '$obj->disponibilidad');");
	}


	public function ActualizaPerfilUsuario($qt)
	{
		$this->db->query("
			UPDATE `empleados` SET `NOMBRES` = '$qt->nombres', `PASSWORD` = '$qt->password', `CORREOELECTRONICO` = '$qt->correo' WHERE `empleados`.`RUT` = '$qt->rut';
			");
	}

	public function unicoCargoDeTipo($cargo)
	{
		return $this->db->query("SELECT * FROM `empleados` WHERE NOMBREROL LIKE '$cargo' and DISPONIBILIDAD LIKE '1'")->result();
	}

	public function verCargoAntesDeEditar($rut)
	{
		return $this->db->query("select NOMBREROL FROM empleados WHERE RUT LIKE '$rut'")->result();
	}

	public function BorrarUsr($rutDel)
	{
		////////////////////////////=======================================================================step1 , busca rut

		$res = $this->db->query("select * from empleados WHERE RUT LIKE '$rutDel' ")->result();
		if (!empty($res)) { //existe persona x rut
			////////////////////////////================================================================================setp2 , importancia del rol
			if ($res[0]->NOMBREROL == 'superadmin') {
				// este rol es demaciado imporante pero revisaremos si existe otra persona de igual importancia
				/////////////////////////////////////////==================================================================================step3 , existe otro? 
				//busca rut y que sea superadmin				
				$existente = $this->db->query("SELECT * from empleados WHERE RUT not LIKE '$rutDel' and NOMBREROL LIKE 'superadmin' and disponibilidad LIKE '1'")->result(); //finx aca
				if (!empty($existente)) {
					$this->db->query("UPDATE `empleados` SET `DISPONIBILIDAD` = '0' WHERE `empleados`.`RUT` = '$rutDel';");
					echo '<script type="text/javascript">alert("correcto");</script>';		//disponiblidad en false
					redirect('controllerEmpleados/formularioCreate', 'refresh');
				} else {
					echo '<script type="text/javascript">alert("No existe usuario reemplazo para SUPERADMIN");</script>';
					redirect('controllerEmpleados/formularioCreate', 'refresh');
				}
			} else {
				$this->db->query("UPDATE `empleados` SET `DISPONIBILIDAD` = '0' WHERE `empleados`.`RUT` = '$rutDel';");
				echo '<script type="text/javascript">alert("usuario dado de baja");</script>';		 	//disponiblidad en false
				redirect('controllerEmpleados/formularioCreate', 'refresh');
			}
		} else { //no existe la persona x rut
			echo '<script type="text/javascript">alert("rut no encontrado");</script>';
			redirect('controllerEmpleados/formularioCreate', 'refresh');
		}
	}

	// BUSCAMOS QUE EXISTA O NO LA DISPONIBILIDAD  ANTES DE ACTUALIZAR CREAR ALGUN ELEMENTO, que se permita agregar el elemento siendo revisado y luego  una actualizacion
	public function ModificaDisponibilidadUsuario($rutDel)
	{
		$this->db->query("UPDATE `empleados` SET `DISPONIBILIDAD` = '0' WHERE `empleados`.`RUT` = '$rutDel';");
	}
	public function BuscaRutSuperAdmin($rutDel)
	{
		return $this->db->query("SELECT * from empleados WHERE RUT not LIKE '$rutDel' and NOMBREROL LIKE 'superadmin'")->result();
	}
	public function BuscaRutyDisponibilidad($rutPersona)
	{
		return $this->db->query("
			select * from empleados WHERE RUT LIKE '$rutPersona' and DISPONIBILIDAD LIKE '1'
			")->result();
	}
	public function VIEWusuarios()
	{
		return  $this->db->query("SELECT * from empleados WHERE DISPONIBILIDAD LIKE '1'")->result();
	}

	public function buscaUsuario($rrr)
	{
		return	$this->db->query("select * from empleados WHERE RUT LIKE '$rrr'")->result();
	}
	public function UPDATEusuario($obj)
	{
		$this->db->query("
			UPDATE `empleados` SET `NOMBREROL` = '$obj->nombreRol', `NOMBREUNIDAD` = '$obj->unidad', `NOMBRES` = '$obj->nombres', `PASSWORD` = '$obj->password', `CORREOELECTRONICO` = '$obj->correo', `DISPONIBILIDAD` = '1' WHERE `empleados`.`RUT` = '$obj->rut';
			");
	}


	public function ADDusuario($obj)
	{

		$this->db->query(
			"
			INSERT INTO `empleados` (`RUT`, `NOMBREROL`, `NOMBREUNIDAD`, `SERIALTELEFONO`, `NOMBRES`, `APELLIDOS`, `PASSWORD`, `CORREOELECTRONICO`, `DISPONIBILIDAD`) VALUES ('$obj->rut', '$obj->nombreRol', '$obj->unidad', NULL, '$obj->nombres', NULL, '$obj->password', '$obj->correo', '1');
			"
		);
	}

	public function DatosPersonales($rut)
	{
		return $this->db->query("select * from empleados WHERE RUT LIKE '$rut'")->result();
	}

	public function metodoValidaForm($datoA, $datoB)
	{
		return  $this->db->query("select * from empleados WHERE RUT LIKE '$datoA' and PASSWORD LIKE '$datoB' AND DISPONIBILIDAD LIKE '1'")->result();
	}

	// x
	public function obtenerNombre($x, $c)
	{
		$r = $this->db->query(
			"select NOMBRES from empleados WHERE RUT LIKE '$x' and PASSWORD LIKE '$c'"
		)->result();
		foreach ($r as $value) {
			$Nombrefound = $value->NOMBRES;
		}
		return $Nombrefound;
	}

	public function obtenerRut($x, $c)
	{
		$r = $this->db->query(
			"select RUT from empleados WHERE RUT LIKE '$x' and PASSWORD LIKE '$c'"
		)->result();
		foreach ($r as $value) {
			$RUTfound = $value->RUT;
		}
		return $RUTfound;
	}

	public function obtenerCargo($x, $c)
	{
		$c = $this->db->query("select NOMBREROL from empleados WHERE RUT LIKE '$x' and PASSWORD LIKE '$c'")->result();
		foreach ($c as $value) {
			$CARGOfound = $value->NOMBREROL;
		}
		return $CARGOfound;
	}

	public function obtenerRol()
	{
		defined('BASEPATH') or exit('No direct script access allowed');

		return $this->db->query("select NOMBREROL from empleados WHERE RUT LIKE '183140159'")->result();
	}

	public function mostrarUsuario()
	{
		return $this->db->query("select * from empleados")->result();
	}
}

/* End of file modelEmpleados.php */
/* Location: ./application/models/modelEmpleados.php */
