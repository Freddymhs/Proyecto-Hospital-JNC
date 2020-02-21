<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controllerInventarioHJNC extends CI_Controller {


	public function __construct()
	{
		
		parent::__construct();
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		// disable_cache();

	}


	public function equiposContabilizado(){//eequipos disp
		


		$this->load->model('modelMonitor');
		$M1 = $this->modelMonitor->CantidadTotal();
		$M2 =  $this->modelMonitor->Correcto();
		$M3 = $this->modelMonitor->Resolver();
		$M4 =  $this->modelMonitor->Disponible();
		$M5 = $this->modelMonitor->FueraDeServicio();

		$this->load->model('modelComputador');
		$PC1 = $this->modelComputador->CantidadTotal();
		$PC2 =  $this->modelComputador->Correcto();
		$PC3 = $this->modelComputador->Resolver();
		$PC4 =  $this->modelComputador->Disponible();
		$PC5 = $this->modelComputador->FueraDeServicio();

		$this->load->model('modelImpresora');
		$IMP1 = $this->modelImpresora->CantidadTotal();
		$IMP2 =  $this->modelImpresora->Correcto();
		$IMP3 = $this->modelImpresora->Resolver();
		$IMP4 =  $this->modelImpresora->Disponible();
		$IMP5 = $this->modelImpresora->FueraDeServicio();

		$this->load->model('modelUPS');
		$UP1 = $this->modelUPS->CantidadTotal();
		$UP2 =  $this->modelUPS->Correcto();
		$UP3 = $this->modelUPS->Resolver();
		$UP4 =  $this->modelUPS->Disponible();
		$UP5 = $this->modelUPS->FueraDeServicio();

		$this->load->model('modelTelefono');
		$TE1 = $this->modelTelefono->CantidadTotal();
		$TE2 =  $this->modelTelefono->Correcto();
		$TE3 = $this->modelTelefono->Resolver();
		$TE4 =  $this->modelTelefono->Disponible();
		$TE5 = $this->modelTelefono->FueraDeServicio();

		$this->load->model('modelEmpleados');
		$EM1 = $this->modelEmpleados->CantidadTotal();
		$EM2 =  $this->modelEmpleados->Correcto();
		$EM3 = $this->modelEmpleados->Resolver();
		$EM4 =  $this->modelEmpleados->Disponible();
		$EM5 = $this->modelEmpleados->FueraDeServicio();



		$arrayKZ['contenido'] =   ['M1' => $M1 , 'M2' => $M2 , 'M3' => $M3 ,'M4' => $M4 , 'M5' => $M5];//monitor
		$arrayKZ['contenido2'] =  ['PC1' => $PC1 , 'PC2' => $PC2 , 'PC3' => $PC3 ,'PC4' => $PC4 , 'PC5' => $PC5];//pc
		$arrayKZ['contenido3'] =  ['IMP1' => $IMP1 , 'IMP2' => $IMP2 , 'IMP3' => $IMP3 ,'IMP4' => $IMP4 , 'IMP5' => $IMP5];//impres
		$arrayKZ['contenido4'] =  ['UP1' => $UP1 , 'UP2' => $UP2 , 'UP3' => $UP3 ,'UP4' => $UP4 , 'UP5' => $UP5];//ups
		$arrayKZ['contenido5'] =  ['TE1' => $TE1 , 'TE2' => $TE2 , 'TE3' => $TE3 ,'TE4' => $TE4 , 'TE5' => $TE5];//telefono
		$arrayKZ['contenido6'] =  ['EM1' => $EM1 , 'EM2' => $EM2 , 'EM3' => $EM3 ,'EM4' => $EM4 , 'EM5' => $EM5];//empleado
		
		$this->load->view('WEBgestionEquipos/ElementosContabilizados',$arrayKZ);
	}


	public function enablePC(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `computador` SET `DISPONIBILIDAD` = '1' WHERE `computador`.`SERIALCOMPUTADOR` = '$datos'");	
	}
	public function disablePC(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `computador` SET `DISPONIBILIDAD` = '0' WHERE `computador`.`SERIALCOMPUTADOR` = '$datos'");	
	}

	public function enableMon(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `monitor` SET `DISPONIBILIDAD` = '1' WHERE `monitor`.`SERIALMONITOR` = '$datos'");
	}

	public function disableMon(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `monitor` SET `DISPONIBILIDAD` = '0' WHERE `monitor`.`SERIALMONITOR` = '$datos'");
	}

	public function enableIMpr(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `impresora` SET `DISPONIBILIDAD` = '1' WHERE `impresora`.`SERIALIMPRESORA` = '$datos'");
	}

	public function disableIMpr(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `impresora` SET `DISPONIBILIDAD` = '0' WHERE `impresora`.`SERIALIMPRESORA` = '$datos'");
	}

	public function enableUPS(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `ups` SET `DISPONIBILIDAD` = '1' WHERE `ups`.`SERIALUPS` = '$datos'");
	}

	public function disableUPS(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `ups` SET `DISPONIBILIDAD` = '0' WHERE `ups`.`SERIALUPS` = '$datos'");
	}

	public function enableTelefono(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `telefono` SET `DISPONIBILIDAD` = '1' WHERE `telefono`.`NROANEXO` = '$datos'");
	}
	public function disableTelefono(){
		$datos = $_POST['datos'];
		$this->db->query("UPDATE `telefono` SET `DISPONIBILIDAD` = '0' WHERE `telefono`.`NROANEXO` = '$datos'");
	}

// public function clickOnDwn(){
// alert(this.val());
// obten valor del input txt
// mandarlo como datos
// utiliza el metodo 
// }

	

	public function AJAXelementosPorTipo(){
		$this->load->model('modelInventarioHJNC');
		$OpcionSeleccionada = $_POST['datoDeSelect'];
		$OpcionSeleccionada2 = $_POST['datoDeSelect2'];
		$datos =$this->modelInventarioHJNC->busquedaElementos($OpcionSeleccionada , $OpcionSeleccionada2);


		switch ($OpcionSeleccionada) {
			case 'computador':
			echo "
			<thead class='bg bg-primary text-white'>
			<tr> 
			<th class='text-center'>acciones</th>
			<th>Serial</th>
			<th>Modelo</th>
			<th>Netbios</th>
			<th>Direccion MAC</th>
			<th>Fin arriendo</th>
			</tr>
			</thead>
			";	
			echo '<tbody>';
			foreach ($datos as $v) {

				echo "
				
				<tr>";
				if ($v->DISPONIBILIDAD == 1) {
					echo "<td><button onclick='ajaxDisablePC(this.value)'  value='$v->SERIALCOMPUTADOR' class='black text-white btn btn-danger'>Desactiva</button></td>";
				}else {
					echo "<td><button onclick='ajaxEnablePC(this.value)'  value='$v->SERIALCOMPUTADOR' class='black text-white btn btn-success'>Re activa</button></td>";
				} 

				echo"<td >".$v->SERIALCOMPUTADOR."</td>
				<td >".$v->MODELOCOMP."</td>
				<td >".$v->NETBIOS."</td>
				<td >".$v->DIRECCIONMAC."</td>			
				";

				if ($v->FINARRIENDOPC == "0000-00-00") {

					echo"<td>N/A</td>";

				}else
				{
					echo "<td>".$v->FINARRIENDOPC."</td>";
				}

				echo "

				</tr>

				";	
			}
			echo '	</tbody>	';
			break;

			case 'monitor':

			echo "
			<thead class='bg bg-primary text-white'>
			<tr> 
			<th class='text-center'>acciones</th>
			<th>Serial</th>
			<th>Modelo</th>
			<th>Fin Arriendo</th>
			</tr>
			</thead>

			";	
			foreach ($datos as $v) {

				echo "
				<tbody>
				<tr>
				";


				if ($v->DISPONIBILIDAD == 1) {
					echo "<td><button onclick='ajaxDisableMon(this.value)'  value='$v->SERIALMONITOR' class='black text-white btn btn-danger'>Desactiva</button></td>";
				}else {
					echo "<td><button onclick='ajaxEnableMon(this.value)'  value='$v->SERIALMONITOR' class='black text-white btn btn-success'>Re activa</button></td>";
				} 


				echo"<td >".$v->SERIALMONITOR."</td>

				<td >".$v->MODELOMON	."</td>";


				if ($v->FINARRIENDOMONITOR == "0000-00-00") {

					echo"<td>N/A</td>";

				}else
				{
					echo "<td>".$v->FINARRIENDOMONITOR."</td>";
				}

				echo "

				</tr>
				</tbody>		
				";	
			}



			break;

			case 'impresora':

			echo "
			<thead class='bg bg-primary text-white'>
			<tr> 
			<th class='text-center'>acciones</th>
			<th>Serial</th>
			<th>Modelo</th>
			<th>Fin Arriendo</th>

			</tr>
			</thead>
			";	
			foreach ($datos as $v) {

				echo "
				<tbody>
				<tr>
				";

				if ($v->DISPONIBILIDAD == 1) {
					echo "<td><button onclick='ajaxDisableImpr(this.value)'  value='$v->SERIALIMPRESORA' class='black text-white btn btn-danger'>Desactiva</button></td>";
				}else {
					echo "<td><button onclick='ajaxEnableImpr(this.value)'  value='$v->SERIALIMPRESORA' class='black text-white btn btn-success'>Re activa</button></td>";
				} 

				echo"<td >".$v->SERIALIMPRESORA."</td>
				<td >".$v->MODELOIMP."</td>

				";

				if ($v->FINARRIENDOIMP == "0000-00-00") {

					echo"<td>N/A</td>";

				}else
				{
					echo "<td>".$v->FINARRIENDOIMP."</td>";
				}

				echo "

				</tr>
				</tbody>		
				";	
			}

			break;

			case 'ups':

			echo "
			<thead class='bg bg-primary text-white'>
			<tr> 
			<th class='text-center'>acciones</th>
			<th>Serial</th>
			<th>Modelo</th>


			</tr>
			</thead>
			";	
// ajaxEnableUps
// ajaxDisableUps
			foreach ($datos as $v) {

				echo "
				<tbody>
				<tr>
				";
				if ($v->DISPONIBILIDAD == 1) {
					echo "<td><button onclick='ajaxDisableUps(this.value)'  value='$v->SERIALUPS' class='black text-white btn btn-danger'>Desactiva</button></td>";
				}else {
					echo "<td><button onclick='ajaxEnableUps(this.value)'   value='$v->SERIALUPS' class='black text-white btn btn-success'>Re activa</button></td>";
				} 


				echo"<td >".$v->SERIALUPS."</td>

				<td >".$v->MODELOUPS	."</td>

				</tr>
				</tbody>		
				";	
			}


			break;

			case 'telefono':
			echo "
			<thead class='bg bg-primary text-white'>
			<tr> 
			<th class='text-center'>acciones</th>
			<th>Telefono</th>
			</tr>
			</thead>
			";	

			foreach ($datos as $v) {

				echo "
				<tbody>
				<tr>";
				if ($v->DISPONIBILIDAD == 1) {
					echo "<td><button onclick='ajaxDisableTelefono(this.value)'  value='$v->NROANEXO' class='black text-white btn btn-danger'>Desactiva</button></td>";
				}else {
					echo "<td><button onclick='ajaxEnableTelefono(this.value)'   value='$v->NROANEXO' class='black text-white btn btn-success'>Re activa</button></td>";
				} 


				echo"<a href='' class=' black text-white btn btn-danger'>Dar de baja</a> 
				<a href='' class=' black text-white btn btn-success'>Permitir</a> </td>
				<td >".$v->NROANEXO."</td>


				</tr>
				</tbody>		
				";	
			}

			break;

			case ' ':
			echo 'sin datos :c';
			break;


		}






// $this->load->model('modelMonitor');
// $x = $this->modelMonitor->MonitoresActivos();





// echo '<td> nombre de la primera row </td>';



	}

	public function index()
	{

	}

public function formularioEFS(){//equipos no disp


	$this->load->model('modelTelefono');
	$this->load->model('modelComputador');
	$this->load->model('modelMonitor');
	$this->load->model('modelImpresora');
	$this->load->model('modelUPS');
// disableUPS
// disableImpresora
// disableMonitor
// disablePc
// disableTelefono

// , cantidad existenes, activos y mas info de grafico
	$this->load->view('WEBgestionEquipos/ElementosNoActivos');
}


public function formularioEA(){//eequipos disp
	$this->load->model('modelTelefono');
	$this->load->model('modelComputador');
	$this->load->model('modelMonitor');
	$this->load->model('modelImpresora');
	$this->load->model('modelUPS');

// , cantidad existenes, activos y mas info de grafico
	$this->load->view('WEBgestionEquipos/ElementosActivos');
}



public function viewRow($idselected){ 

//libreria
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
$this->form_validation->set_rules('txtserialpc','serial','required|is_unique[inventario_soporte_hjnc.SERIALCOMPUTADOR]'); // necesario siempre....

// inicio Reglas 
if ($this->input->post("collapTelefonoNum") != null) {$this->form_validation->set_rules('collapTelefonoNum','Numero Telefonico','is_unique[telefono.NROANEXO]|min_length[4]|max_length[4]|numeric');}
$this->form_validation->set_rules('txtRed','RED de la IP','required|min_length[1]|max_length[3]|trim|numeric');
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("selectPersona") == null) {
	if ($this->input->post("collapRutP") != null) {

		$this->form_validation->set_rules('collapRutP','rut/sec','required|min_length[9]|max_length[20]|trim|alpha_numeric');
		$this->form_validation->set_rules('collapNombreP','Nombre','required|min_length[1]|max_length[44]');
		$this->form_validation->set_rules('collapCorreoP','Correo','required|min_length[5]|max_length[44]|trim');
	}
}
if ($this->input->post("collapRutP") != null ) {
	$this->form_validation->set_rules('collapRutP','rut/sec','required|min_length[9]|max_length[20]|trim|alpha_numeric');
}
/// //////////////////////////////////////////////// //////////////////////////////////////////////
$this->form_validation->set_rules('txtNetbios','BIOS del computador','required|min_length[2]|max_length[20]');
$this->form_validation->set_rules('txtDirMac','Direccion Mac','required|min_length[17]|max_length[17]|trim');
$this->form_validation->set_rules('txtnuevaip','Direccion IP','required|min_length[7]|max_length[15]|trim');
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("selectunidades") == null && $this->input->post("collapNunidad") == null) { // no selecciono
	$this->form_validation->set_rules('selectunidades','Unidad','required');
}
if ($this->input->post("selectunidades") == null && $this->input->post("collapNunidad") != null) {
	$this->form_validation->set_rules('collapNunidad','nombre unidad nueva','required|is_unique[unidad.NOMBREUNIDAD]');
	$this->form_validation->set_rules('collapUespecif','especificaion de la unidad'	);
}	
if ($this->input->post("collapNunidad") != null) {
	$this->form_validation->set_rules('collapNunidad','nombre unidad nueva','required|is_unique[unidad.NOMBREUNIDAD]');
}
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("collapModMon") != null  ) {
	$this->form_validation->set_rules('txtserialmonitor','serial','required');
}
if ($this->input->post("selectMonitor") != null) {
	$this->form_validation->set_rules('txtserialmonitor','serial','required');
}
if (strlen($this->input->post("collapModMon"))>0) {
	$this->form_validation->set_rules('collapModMon','modelo','required');
	$this->form_validation->set_rules('collapMonFun','funcionalidades','required');
	$this->form_validation->set_rules('collapResMon','resolucion','required');
	$this->form_validation->set_rules('collapPulMon','pulgadas','required|numeric');
	$this->form_validation->set_rules('collapMarMon','marca','required');
}	
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("selectpc")!=null || $this->input->post("collapModelPC") != null){
	$this->form_validation->set_rules('txtserialpc','serial','required');
}
if ($this->input->post("collapModelPC")!=null) {
	$this->form_validation->set_rules('collapModelPC','modelo','required');
	$this->form_validation->set_rules('collapMarcaPC','marca','required');
	$this->form_validation->set_rules('collapDisc1','disco duro','required');
	$this->form_validation->set_rules('collapProcePc','procesador','required');
	$this->form_validation->set_rules('collapMemoPc','memoria','required');
	$this->form_validation->set_rules('collapSoPc','sistema operativo','required');
}
// //////////////////////////////////////////////// //////////////////////////////////////////////																										impresora

if (strlen($this->input->post("selectImpresora"))>0) {
	$this->form_validation->set_rules('txtserialimpresora','serial','required');
}
if ($this->input->post("selectImpresora") != null) {
	$this->form_validation->set_rules('txtserialimpresora','serial','required');			
}

if ($this->input->post("collapModelImpr")!=null) {
	$this->form_validation->set_rules('txtserialimpresora','serial','required');
	$this->form_validation->set_rules('collapModelImpr','modelo','required');
	$this->form_validation->set_rules('collapFuncImpr','funcionalidades','required');
	$this->form_validation->set_rules('collapMarcaImp','marca','required');
}
//no se repiten los pcs en el inventario

if ($this->input->post("txtserialpc") != "" && $this->input->post("txtserialpc") != null  ) {
	$c=$this->form_validation->set_rules('txtserialpc','SERIAL','required');

	$Fdate = $this->input->post("txtserialpc");
	$resC=$this->db->query("select * from inventario_soporte_hjnc WHERE SERIALCOMPUTADOR LIKE '$Fdate'")->result();


}
if ($this->input->post("selectups") != "" || $this->input->post("collapModUPs") != "") {
	$this->form_validation->set_rules('txtserialups','SERIAL','required');
}
// fin Reglas		



if ($this->form_validation->run() == FALSE) { //el formularioUPDATEinventario no cumple las Reglas de validacion
$d1 = $this->db->query("select * from empleados ")->result();//cargar personas dispon
$d2 = $this->db->query("select * from telefono   ")->result();//cargar telefonos  disponibl
$d3 = $this->db->query("SELECT * FROM `unidad`")->result();//cargar unidad
$d4 = $this->db->query("SELECT * FROM `monitormodelo`  ")->result();//cargar monitores  M
$d5 = $this->db->query("SELECT * FROM `computadormodelo` ")->result();//cargar comptuadores  M
$d6 = $this->db->query("SELECT * FROM `impresoramodelo` ")->result();//cargar impresoras  M
$d7 = $this->db->query("SELECT * FROM `upsmodelo`  ")->result();//cargar ups   M
$contenidos["listpersonas"] = $d1;
$contenidos["listtelefonos"] = $d2;
$contenidos["listunidades"] = $d3;
$contenidos["listmonitores"] = $d4;
$contenidos["listcomputadores"] = $d5;
$contenidos["listimpresoras"] = $d6;
$contenidos["listups"] = $d7;



// nnuevo datos
$this->load->model('modelInventarioHJNC');
$unaFIla = $this->modelInventarioHJNC->ObtenDato($idselected);//obten datos de row


$contenidos['fila'] = $unaFIla;//datos de la fila seleccionada x ID


$pcactual = $unaFIla[0]->SERIALCOMPUTADOR;// x id su pc
$monitoractual = $unaFIla[0]->SERIALMONITOR;//x id su mon
$imprActual = $unaFIla[0]->SERIALIMPRESORA;//x id su imp
$UPSdActual = $unaFIla[0]->SERIALUPS; 		//x id su ups

// datos del pc 
$this->load->model('modelComputador');
$contenidos['DATOSPC'] = $this->modelComputador->DatosPerfil($pcactual);
//datos del monitor
$this->load->model('modelMonitor');
$contenidos['DATOSMINITOR'] = $this->modelMonitor->DatosPerfil($monitoractual);
//datos impr 
$this->load->model('modelImpresora');
$contenidos['DATOSIMP']= $this->modelImpresora->DatosPerfil($imprActual);
//datos ups
$this->load->model('modelUPS');
$contenidos['laUPS']= $this->modelUPS->DatosPerfil($UPSdActual);//obtn sus datos


$this->load->view('WEBpageRegistroInventario/updateRegistroInventario/formularioUPDATEinventario',$contenidos);


// xx
} 
else { 

$this->updatedatos();//llama al metodo de insert data

} 
}



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.......................


public function updatedatos(){

	$idsecreto=  $this->input->post("idHidden");

	$this->db->trans_start();
// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////

	$selectedP = $this->input->post("selectPersona");
if ($selectedP == null) {                                   //no se selecciono 
if ($this->input->post("collapRutP") == "") { 				//no se esta creando uno nuevo
$KZ = NULL;												//persona = NULL
}else {      

	$pr= $this->input->post("collapRutP");
	$buscPer = $this->db->query("SELECT * FROM `empleados` WHERE RUT LIKE '$pr'")->result();
	$this->load->model('modelEmpleados');
	$newPersona = new modelEmpleados;
	$newPersona->rut = $this->input->post("collapRutP");
	$newPersona->nombreRol = $this->input->post("collapRolP");
	$newPersona->nombres = $this->input->post("collapNombreP");
	$newPersona->correo = $this->input->post("collapCorreoP");
	$newPersona->disponibilidad ="1";

	if (count($buscPer) > 0) {
$this->modelEmpleados->actualizaEmpleado($newPersona); //debe ser
$KZ  = $this->input->post("collapRutP");

} else {
//no Seleccionado pero se Crea y  se va a inventariar

$this->modelEmpleados->formRegPersona($newPersona); //debe ser unici

$KZ  = $this->input->post("collapRutP");
}

}
}else {	

//seleccionado y  SE INVENTARIO
	$KZ = $selectedP;


}
// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////

// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////
$selectedT = $this->input->post("selectTelefono");
if ($selectedT == null) {//no seleccionado
	if ($this->input->post("collapTelefonoNum") == "") {
		$PQ = NULL;
	}else {


$this->load->model('modelTelefono');//carga modelo
$newTelefono = new modelTelefono;			
$newTelefono->numero= $this->input->post("collapTelefonoNum");
$newTelefono->disponibilidad="1";
$this->modelTelefono->formRegTelefono($newTelefono);//debe ser unici
$PQ = $newTelefono->numero;

}
}else {
	$PQ = $selectedT;
}
// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////
//UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  //////

$selectedUn = $this->input->post("selectunidades");
if ($selectedUn == null) {//no selecciono
	if ($this->input->post("collapNunidad")=="") {
		$GG = NULL;
	}else {
$this->load->model('modelUnidad');//carga modelo
$newUnidad = new modelUnidad;	
$newUnidad->nombre= $this->input->post("collapNunidad");
$newUnidad->especificacion= $this->input->post("collapUespecif");
$this->modelUnidad->formRegUnidad($newUnidad);
$GG=$newUnidad->nombre;
}
}else{
	$GG = $selectedUn;

}


//UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  //////
//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//

// x
$selectedMon=$this->input->post("selectMonitor");
if ($selectedMon == null) {
	if ($this->input->post("collapModMon")=="") {
$GT = NULL;  // ni crea monitor no pone un serial  +  ASignacion al inventario

}else { //creacion de modelo y monitor +  ASignacion al inventario

// secA
	$mud = $this->input->post("collapModMon");
	$mudexiste = $this->db->query("SELECT * FROM `monitormodelo` WHERE MODELOMON LIKE '$mud'")->result();

	if (count($mudexiste) > 0) {

		$this->load->model("modelMonitorM");
		$newModeloMonitor= new modelMonitorM;
		$newModeloMonitor->modelo = $this->input->post("collapModMon");
		$newModeloMonitor->funcionalidad = $this->input->post("collapMonFun");
		$newModeloMonitor->resolucion = $this->input->post("collapResMon");
		$newModeloMonitor->pulgadas = $this->input->post("collapPulMon");
		$newModeloMonitor->marca = $this->input->post("collapMarMon");
		$this->modelMonitorM->formParaUpdateModeloMOnitor($newModeloMonitor);

	} else {

		$this->load->model("modelMonitorM");
		$newModeloMonitor= new modelMonitorM;
		$newModeloMonitor->modelo = $this->input->post("collapModMon");
		$newModeloMonitor->funcionalidad = $this->input->post("collapMonFun");
		$newModeloMonitor->resolucion = $this->input->post("collapResMon");
		$newModeloMonitor->pulgadas = $this->input->post("collapPulMon");
		$newModeloMonitor->marca = $this->input->post("collapMarMon");
$this->modelMonitorM->formRegModeloMonitor($newModeloMonitor); //DEBERIA SER REG
$this->db->error();
var_dump($this->db->error());
echo $this->db->error();	

}
// secA


$this->load->model('modelMonitor');
$newMonitor = new modelMonitor;
$newMonitor->modelMonitor=$newModeloMonitor->modelo;//tomando el mismo modelo de arrrrrrrrrrrriba
$newMonitor->serial=$this->input->post("txtserialmonitor");
$newMonitor->finArriendo=$this->input->post("finarriendoMonitor");
$newMonitor->disponibilidad="1";
// $this->modelMonitor->formRegMonitor($newMonitor);//metodo reg

$preconsulta = $this->db->query("select * from monitor WHERE `SERIALMONITOR` like '$newMonitor->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
$this->modelMonitor->formUpdateMONItor($newMonitor); // lo registra 

}else { //si no existe 
$this->modelMonitor->formRegMonitor($newMonitor); // lo registra 
}

$GT = $this->input->post("txtserialmonitor");
}

}else{            // selecciono +  ASignacion al inventario
// xxx
$this->load->model('modelMonitor'); // llama al modelo
$newMonitor = new modelMonitor;      //crea objeto
$newMonitor->serial=$this->input->post("txtserialmonitor");
$newMonitor->modelMonitor=$selectedMon;//share
$newMonitor->finArriendo=$this->input->post("finarriendoMonitor");
$newMonitor->disponibilidad="1";

$preconsulta = $this->db->query("select * from monitor WHERE `SERIALMONITOR` like '$newMonitor->serial'")->result();
if (count($preconsulta) > 0 ) {
$this->modelMonitor->formUpdateMONItor($newMonitor); // lo registra 
}else {
	$this->modelMonitor->formRegMonitor($newMonitor);
}

$GT = $this->input->post("txtserialmonitor");  
// xx  
}



//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//
///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC
$selectedPC =$this->input->post("selectpc");
if ($selectedPC == null) {										//no seleccionado
if ($this->input->post("collapModelPC")=="") { 				//no crea nuevo
$TT=NULL;												//modelo pc = NULL
}else {	//a crear	
//se creara un nuevo modelo de computador
	$mod=$this->input->post("collapModelPC");
	$modExiste = $this->db->query("SELECT * FROM `computadormodelo` WHERE MODELOCOMP LIKE '$mod'")->result();
	if (count($modExiste) > 0 ) {
//existe modelo  ACTUALIZA
		$this->load->model('modelComputadorM');
		$newModelComputador = new modelComputadorM;
		$newModelComputador->modelo=$this->input->post("collapModelPC");
		$newModelComputador->disco1=$this->input->post("collapDisc1");
		$newModelComputador->disco2=$this->input->post("collapDisco2");
		$newModelComputador->procesador=$this->input->post("collapProcePc");
		$newModelComputador->ram=$this->input->post("collapMemoPc");
		$newModelComputador->so=$this->input->post("collapSoPc");
		$newModelComputador->marca=$this->input->post("collapMarcaPC");
		$this->modelComputadorM->formUpdateMdeoloComputador($newModelComputador);

	} else {
//no eixste modelo               CREALO
		$this->load->model('modelComputadorM');
		$newModelComputador = new modelComputadorM;
		$newModelComputador->modelo=$this->input->post("collapModelPC");
		$newModelComputador->disco1=$this->input->post("collapDisc1");
		$newModelComputador->disco2=$this->input->post("collapDisco2");
		$newModelComputador->procesador=$this->input->post("collapProcePc");
		$newModelComputador->ram=$this->input->post("collapMemoPc");
		$newModelComputador->so=$this->input->post("collapSoPc");
		$newModelComputador->marca=$this->input->post("collapMarcaPC");
		$this->modelComputadorM->formRegModeloComputador($newModelComputador);
	}

///creacion del Computador como tal  						//creacion de un nuevo COMPUTADOR
	$this->load->model('modelComputador');
	$newComputador = new modelComputador;
	$newComputador->serialPc	=$this->input->post("txtserialpc");
	$newComputador->modelo		 =$this->input->post("collapModelPC");
$newComputador->netbios		 =$this->input->post("txtNetbios"); //
$newComputador->dirMac		  =$this->input->post("txtDirMac");
$newComputador->finArriendo	=$this->input->post("finarriendoPC");
$newComputador->disponibilidad	="1";
$preconsulta = $this->db->query("select * from computador WHERE `SERIALCOMPUTADOR` like '$newComputador->serialPc'")->result();
if (count($preconsulta) > 0 ) {// existe este pc?
// update PC           
	$this->modelComputador->formUpdatePC($newComputador);
// update PC
}else { //si no existe 

	$this->modelComputador->formRegComputador($newComputador);
}
// fix
$TT=$this->input->post("txtserialpc");
}

}else {//en collap

	$this->load->model('modelComputador');
	$newComputador = new modelComputador;
	$newComputador->serialPc	=$this->input->post("txtserialpc");
	$newComputador->modelo		 =   $selectedPC;
	$newComputador->netbios		 =$this->input->post("txtNetbios"); 
	$newComputador->dirMac		  =$this->input->post("txtDirMac");
	$newComputador->finArriendo	=$this->input->post("finarriendoPC");
	$newComputador->disponibilidad	="1";

	$preconsulta = $this->db->query("select * from computador WHERE `SERIALCOMPUTADOR` like '$newComputador->serialPc'")->result();
if (count($preconsulta) > 0 ) {// SERIAL existe de este monitor
	$this->modelComputador->formUpdatePC($newComputador);
}else { //si no existe 
	$this->modelComputador->formRegComputador($newComputador);
}

$TT=$this->input->post("txtserialpc");


}//fin collap


///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC//////PC
////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA
$selectImp = $this->input->post("selectImpresora");
if ($selectImp == null) {
if ($this->input->post("collapModelImpr") =="") {                           //NO SE CREA
	$JJ =NULL;
}else {
$this->load->model('modelImpresoraM');                                  // se crea
$newModelImpresora = new modelImpresoraM;
$newModelImpresora->modelo = $this->input->post("collapModelImpr");
$newModelImpresora->funcionalidades = $this->input->post("collapFuncImpr");
$newModelImpresora->marca = $this->input->post("collapMarcaImp");
// NOUSADO $newModelImpresora->durabilidad = $this->input->post("");
// NOUSADO $newModelImpresora->imagen = $this->input->post("");
// {}
$modd = $this->input->post("collapModelImpr");
$impresraEncontrada = $this->db->query("SELECT * FROM `impresoramodelo` WHERE MODELOIMP LIKE '$modd'")->result();
if (count($impresraEncontrada) > 0) {
	$this->modelImpresoraM->formParaUpdateModeloIMpr($newModelImpresora);
} else {
	$this->modelImpresoraM->formRegModelImpresora($newModelImpresora);
}
// {}

///creacion del Impresora como tal
$this->load->model('modelImpresora');
$newImpresora = new modelImpresora;
$newImpresora->serial = $this->input->post("txtserialimpresora");
$newImpresora->modelo = $this->input->post("collapModelImpr");
$newImpresora->fecha = $this->input->post("finarriendoImpresora");
$newImpresora->disponibilidad ="1";
// fix
$preconsulta = $this->db->query("select * from impresora WHERE `SERIALIMPRESORA` like '$newImpresora->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
	$this->modelImpresora->formUPDImpresora($newImpresora);
}else { //si no existe 
	$this->modelImpresora->formRegImpresora($newImpresora);
}
// fix
$JJ =$this->input->post("txtserialimpresora");

}
}else {                                                                      //se asigna
	$this->load->model('modelImpresora');
	$newImpresora = new modelImpresora;
	$newImpresora->serial = $this->input->post("txtserialimpresora");
	$newImpresora->modelo = $selectImp;
	$newImpresora->fecha = $this->input->post("finarriendoImpresora");
	$newImpresora->disponibilidad ="1";
// fix
	$preconsulta = $this->db->query("select * from impresora WHERE `SERIALIMPRESORA` like '$newImpresora->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
	$this->modelImpresora->formUPDImpresora($newImpresora);
}else { //si no existe 
	$this->modelImpresora->formRegImpresora($newImpresora);
}
// fix
$JJ =$this->input->post("txtserialimpresora");
}
////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA
////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS

$selectUps = $this->input->post("selectups");//check nuevo o no
if ($selectUps == null) {//entonces crear
	if ($this->input->post("collapModUPs")=="") {
		$VL = NULL;
	}else {
// {}
		$modUps= $this->input->post("collapModUPs");
		$BuscMups=$this->db->query("SELECT * FROM `upsmodelo` WHERE MODELOUPS LIKE '$modUps'")->result();

		if (count($BuscMups) > 0) {
// m
			$this->load->model('modelUPSM');
$newModelUps= new modelUPSM; //instancia
$newModelUps->modelo = $this->input->post("collapModUPs");
$newModelUps->capacidad =$this->input->post("collapCapacUps");
$newModelUps->funcionalidad=$this->input->post("collapFuncUps");
$newModelUps->marca=$this->input->post("collapMarcaUps");
$this->modelUPSM->formUPDModelUps($newModelUps);//crea modelo


} else {
	$this->load->model('modelUPSM');
$newModelUps= new modelUPSM; //instancia
$newModelUps->modelo = $this->input->post("collapModUPs");
$newModelUps->capacidad =$this->input->post("collapCapacUps");
$newModelUps->funcionalidad=$this->input->post("collapFuncUps");
$newModelUps->marca=$this->input->post("collapMarcaUps");
$this->modelUPSM->formRegModelUps($newModelUps);//crea modelo
}
// {}

///creacion del UPS como tal
$this->load->model('modelUPS');
$newUps = new modelUPS;//instancia de objeto UPS
$newUps->serial=$this->input->post("txtserialups"); // nueva serial
// $newUps->modelo=$this->input->post("selectups"); //el seleccionado
$newUps->modelo=$this->input->post("collapModUPs");//el recien creandose
$newUps->disponibilidad = "1";
// fix
$preconsulta = $this->db->query("select * from ups WHERE `SERIALUPS` like '$newUps->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
	$this->modelUPS->formUpdUps($newUps);
}else { //si no existe 
	$this->modelUPS->formRegUps($newUps);
}
// fix
$VL = $this->input->post("txtserialups");

}
}else {
	$this->load->model('modelUPS');
	$newUps = new modelUPS;
$newUps->serial=$this->input->post("txtserialups"); // nueva serial
$newUps->modelo=$selectUps;
$newUps->disponibilidad = "1";
// fix
$preconsulta = $this->db->query("select * from ups WHERE `SERIALUPS` like '$newUps->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
	$this->modelUPS->formUpdUps($newUps);
}else { //si no existe 
	$this->modelUPS->formRegUps($newUps);
}
// fix
$VL = $this->input->post("txtserialups");
}

////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$error = $this->db->error();//luego de ver varios inserts


//EXISTE ERRO
if (($error["message"]) != "") {//sin errores
	var_dump($this->db->error());
$this->db->trans_rollback();//fix
} else {
	$this->load->model('modelInventarioHJNC');
	$QT = new modelInventarioHJNC;

	$QT->ipv6 = "nulo";
$QT->ipv4 =$this->input->post("txtnuevaip");//
$QT->red =$this->input->post("txtRed");//
$QT->PERSONA = $KZ; // importante debugear
$QT->TELEFONO = $PQ;// importante debugear
$QT->UNIDAD = $GG;
$QT->MONITOR = $GT;
$QT->PC = $TT;
$QT->IMPRESORA = $JJ;
$QT->UPS = $VL;



$QT->idInventario = $idsecreto;

$insercionDeDatos = $this->modelInventarioHJNC->metodoUPDATEInventario($QT);
var_dump($this->db->error());

if ($insercionDeDatos) {
$this->db->trans_complete();//logrado
var_dump($this->db->error());
}






}


if ($insercionDeDatos == true) {
	redirect('controllerEmpleados/pageHome');
}







} //fin update

public function Formulario(){ 
//libreria
	$this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('txtserialpc','serial','required|is_unique[inventario_soporte_hjnc.SERIALCOMPUTADOR]');


// inicio Reglas 
	if ($this->input->post("collapTelefonoNum") != null) {$this->form_validation->set_rules('collapTelefonoNum','Numero Telefonico','is_unique[telefono.NROANEXO]|min_length[4]|max_length[4]|numeric');}
	$this->form_validation->set_rules('txtRed','RED de la IP','required|min_length[1]|max_length[3]|trim|numeric');
// //////////////////////////////////////////////// //////////////////////////////////////////////
	if ($this->input->post("selectPersona") == null) {
		if ($this->input->post("collapRutP") != null) {
			$this->form_validation->set_rules('collapRutP','rut/sec','required|min_length[9]|max_length[20]|trim|alpha_numeric|is_unique[empleados.RUT]');
			$this->form_validation->set_rules('collapNombreP','Nombre','required|min_length[1]|max_length[44]');
			$this->form_validation->set_rules('collapCorreoP','Correo','required|min_length[5]|max_length[44]|trim');
		}
	}
	if ($this->input->post("collapRutP") != null ) {
		$this->form_validation->set_rules('collapRutP','rut/sec','required|min_length[9]|max_length[20]|trim|alpha_numeric|is_unique[empleados.RUT]');
	}
/// //////////////////////////////////////////////// //////////////////////////////////////////////
	$this->form_validation->set_rules('txtNetbios','BIOS del computador','required|min_length[2]|max_length[20]');
	$this->form_validation->set_rules('txtDirMac','Direccion Mac','required|min_length[17]|max_length[17]|trim');
	$this->form_validation->set_rules('txtnuevaip','Direccion IP','required|min_length[7]|max_length[15]|trim');
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("selectunidades") == null && $this->input->post("collapNunidad") == null) { // no selecciono
	$this->form_validation->set_rules('selectunidades','Unidad','required');
}
if ($this->input->post("selectunidades") == null && $this->input->post("collapNunidad") != null) {
	$this->form_validation->set_rules('collapNunidad','nombre unidad nueva','required|is_unique[unidad.NOMBREUNIDAD]');
	$this->form_validation->set_rules('collapUespecif','especificaion de la unidad');
}	
if ($this->input->post("collapNunidad") != null) {
	$this->form_validation->set_rules('collapNunidad','nombre unidad nueva','required|is_unique[unidad.NOMBREUNIDAD]');
}
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("collapModMon") != null  ) {
	$this->form_validation->set_rules('txtserialmonitor','serial','required');
}
if ($this->input->post("selectMonitor") != null) {
	$this->form_validation->set_rules('txtserialmonitor','serial','required');
}
if (strlen($this->input->post("collapModMon"))>0) {
	$this->form_validation->set_rules('collapModMon','modelo','required|is_unique[monitormodelo.MODELOMON]');
	$this->form_validation->set_rules('collapMonFun','funcionalidades','required');
	$this->form_validation->set_rules('collapResMon','resolucion','required');
	$this->form_validation->set_rules('collapPulMon','pulgadas','required|numeric');
	$this->form_validation->set_rules('collapMarMon','marca','required');
}	
// //////////////////////////////////////////////// //////////////////////////////////////////////
if ($this->input->post("selectpc")!=null || $this->input->post("collapModelPC") != null){
	$this->form_validation->set_rules('txtserialpc','serial','required');
}
if ($this->input->post("collapModelPC")!=null) {
	$this->form_validation->set_rules('collapModelPC','modelo','required|is_unique[computadormodelo.MODELOCOMP]');
	$this->form_validation->set_rules('collapMarcaPC','marca','required');
	$this->form_validation->set_rules('collapDisc1','disco duro','required');
	$this->form_validation->set_rules('collapProcePc','procesador','required');
	$this->form_validation->set_rules('collapMemoPc','memoria','required');
	$this->form_validation->set_rules('collapSoPc','sistema operativo','required');
}
// //////////////////////////////////////////////// //////////////////////////////////////////////																										impresora

if (strlen($this->input->post("selectImpresora"))>0) {
	$this->form_validation->set_rules('txtserialimpresora','serial','required');
}
if ($this->input->post("selectImpresora") != null) {
	$this->form_validation->set_rules('txtserialimpresora','serial','required');			
}

if ($this->input->post("collapModelImpr")!=null) {
	$this->form_validation->set_rules('txtserialimpresora','serial','required');
	$this->form_validation->set_rules('collapModelImpr','modelo','required|is_unique[impresoramodelo.MODELOIMP]');
	$this->form_validation->set_rules('collapFuncImpr','funcionalidades','required');
	$this->form_validation->set_rules('collapMarcaImp','marca','required');
}
//no se repiten los pcs en el inventario

if ($this->input->post("txtserialpc") != "" && $this->input->post("txtserialpc") != null  ) {
	$c=$this->form_validation->set_rules('txtserialpc','SERIAL','required');

	$Fdate = $this->input->post("txtserialpc");
	$resC=$this->db->query("select * from inventario_soporte_hjnc WHERE SERIALCOMPUTADOR LIKE '$Fdate'")->result();
	if (count($resC)>0) {
		$this->form_validation->set_rules('txtserialpc','Existe ya en el inventario y ','is_unique[inventario_soporte_hjnc.SERIALCOMPUTADOR]');
		echo " <script>alert('Este computador ya esta registrado en el inventario , revise la tabla y modifique los datos en la fila correspodiente')</script>";
	}

}
if ($this->input->post("selectups") != "" || $this->input->post("collapModUPs") != "") {
	$this->form_validation->set_rules('txtserialups','SERIAL','required');
}
// fin Reglas		


if ($this->form_validation->run() == FALSE) { //el formulario no cumple las Reglas de validacion
$d1 = $this->db->query("select * from empleados WHERE DISPONIBILIDAD LIKE '1'")->result();//cargar personas dispon
$d2 = $this->db->query("select * from telefono WHERE DISPONIBILIDAD LIKE '1'  ")->result();//cargar telefonos  disponibl
$d3 = $this->db->query("SELECT * FROM `unidad`")->result();//cargar unidad
$d4 = $this->db->query("SELECT * FROM `monitormodelo`  ")->result();//cargar monitores  M
$d5 = $this->db->query("SELECT * FROM `computadormodelo` ")->result();//cargar comptuadores  M
$d6 = $this->db->query("SELECT * FROM `impresoramodelo` ")->result();//cargar impresoras  M
$d7 = $this->db->query("SELECT * FROM `upsmodelo`  ")->result();//cargar ups   M
$contenidos["listpersonas"] = $d1;
$contenidos["listtelefonos"] = $d2;
$contenidos["listunidades"] = $d3;
$contenidos["listmonitores"] = $d4;
$contenidos["listcomputadores"] = $d5;
$contenidos["listimpresoras"] = $d6;
$contenidos["listups"] = $d7;
$this->load->view('pageRegistroInventario', $contenidos);
} 
else { 
$this->insertdatos();//llama al metodo de insert data
} 
}

public function insertdatos(){
	$this->db->trans_start();
// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////
	$selectedP = $this->input->post("selectPersona");
if ($selectedP == null) {                                   //no se selecciono 
if ($this->input->post("collapRutP") == "") { 				//no se esta creando uno nuevo
$KZ = NULL;												//persona = NULL
}else {                                                     //no Seleccionado pero se Crea y  se va a inventariar
	$this->load->model('modelEmpleados');
	$newPersona = new modelEmpleados;
	$newPersona->rut = $this->input->post("collapRutP");
	$newPersona->nombreRol = $this->input->post("collapRolP");
	$newPersona->nombres = $this->input->post("collapNombreP");
	$newPersona->correo = $this->input->post("collapCorreoP");
	$newPersona->disponibilidad ="1";
$this->modelEmpleados->formRegPersona($newPersona); //debe ser unici
$KZ  = $this->input->post("collapRutP");
}
}else {																//seleccionado y  SE INVENTARIO
	$KZ = $selectedP;
}
// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////// PERSONAS//////////////

// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////
$selectedT = $this->input->post("selectTelefono");
if ($selectedT == null) {//no seleccionado
	if ($this->input->post("collapTelefonoNum") == "") {
		$PQ = NULL;
	}else {
$this->load->model('modelTelefono');//carga modelo
$newTelefono = new modelTelefono;			
$newTelefono->numero= $this->input->post("collapTelefonoNum");
$newTelefono->disponibilidad="1";
$this->modelTelefono->formRegTelefono($newTelefono);//debe ser unici
$PQ = $newTelefono->numero;
}
}else {
	$PQ = $selectedT;
}
// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////// TELEFONOS////////////////
//UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  //////

$selectedUn = $this->input->post("selectunidades");
if ($selectedUn == null) {//no selecciono
	if ($this->input->post("collapNunidad")=="") {
		$GG = NULL;
	}else {
$this->load->model('modelUnidad');//carga modelo
$newUnidad = new modelUnidad;	
$newUnidad->nombre= $this->input->post("collapNunidad");
$newUnidad->especificacion= $this->input->post("collapUespecif");
$this->modelUnidad->formRegUnidad($newUnidad);
$GG=$newUnidad->nombre;
}
}else{
	$GG = $selectedUn;

}


//UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  ////////UNIDADES  //////
//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//


$selectedMon=$this->input->post("selectMonitor");
if ($selectedMon == null) {
	if ($this->input->post("collapModMon")=="") {
$GT = NULL;  // ni crea monitor no pone un serial  +  ASignacion al inventario

}else { //creacion de modelo y monitor +  ASignacion al inventario
	echo '<script>alert("c");</script>';
	$this->load->model("modelMonitorM");
	$newModeloMonitor= new modelMonitorM;
	$newModeloMonitor->modelo = $this->input->post("collapModMon");
	$newModeloMonitor->funcionalidad = $this->input->post("collapMonFun");
	$newModeloMonitor->resolucion = $this->input->post("collapResMon");
	$newModeloMonitor->pulgadas = $this->input->post("collapPulMon");
	$newModeloMonitor->marca = $this->input->post("collapMarMon");
	$this->modelMonitorM->formRegModeloMonitor($newModeloMonitor);


	$this->load->model('modelMonitor');
	$newMonitor = new modelMonitor;
$newMonitor->modelMonitor=$newModeloMonitor->modelo;//tomando el mismo modelo de arrrrrrrrrrrriba
$newMonitor->serial=$this->input->post("txtserialmonitor");
$newMonitor->finArriendo=$this->input->post("finarriendoMonitor");
$newMonitor->disponibilidad="1";
// $this->modelMonitor->formRegMonitor($newMonitor);// este metodo da error al no valdiarse por mi

$preconsulta = $this->db->query("select * from monitor WHERE `SERIALMONITOR` like '$newMonitor->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
}else { //si no existe 
$this->modelMonitor->formRegMonitor($newMonitor); // lo registra 
}

$GT = $this->input->post("txtserialmonitor");
}

}else{            // selecciono +  ASignacion al inventario
// xxx
$this->load->model('modelMonitor'); // llama al modelo
$newMonitor = new modelMonitor;      //crea objeto
$newMonitor->serial=$this->input->post("txtserialmonitor");
$newMonitor->modelMonitor=$selectedMon;//share
$newMonitor->finArriendo=$this->input->post("finarriendoMonitor");
$newMonitor->disponibilidad="1";

$preconsulta = $this->db->query("select * from monitor WHERE `SERIALMONITOR` like '$newMonitor->serial'")->result();
if (count($preconsulta) > 0 ) {

}else {
	$this->modelMonitor->formRegMonitor($newMonitor);
}

$GT = $this->input->post("txtserialmonitor");  
// xx  
}



//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//MONITORES//
///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC
$selectedPC =$this->input->post("selectpc");
if ($selectedPC == null) {										//no seleccionado
if ($this->input->post("collapModelPC")=="") { 				//no crea nuevo
$TT=NULL;												//modelo pc = NULL
}else {														//se creara un nuevo modelo de computador
	$this->load->model('modelComputadorM');
	$newModelComputador = new modelComputadorM;
	$newModelComputador->modelo=$this->input->post("collapModelPC");
	$newModelComputador->disco1=$this->input->post("collapDisc1");
	$newModelComputador->disco2=$this->input->post("collapDisco2");
	$newModelComputador->procesador=$this->input->post("collapProcePc");
	$newModelComputador->ram=$this->input->post("collapMemoPc");
	$newModelComputador->so=$this->input->post("collapSoPc");
	$newModelComputador->marca=$this->input->post("collapMarcaPC");
	$this->modelComputadorM->formRegModeloComputador($newModelComputador);

///creacion del Computador como tal  						//creacion de un nuevo COMPUTADOR
	$this->load->model('modelComputador');
	$newComputador = new modelComputador;
	$newComputador->serialPc	=$this->input->post("txtserialpc");
	$newComputador->modelo		 =$this->input->post("collapModelPC");
$newComputador->netbios		 =$this->input->post("txtNetbios"); //
$newComputador->dirMac		  =$this->input->post("txtDirMac");
$newComputador->finArriendo	=$this->input->post("finarriendoPC");
$newComputador->disponibilidad	="1";
// fix
$preconsulta = $this->db->query("select * from computador WHERE `SERIALCOMPUTADOR` like '$newComputador->serialPc'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
}else { //si no existe 
	$this->modelComputador->formRegComputador($newComputador);
}
// fix
$TT=$this->input->post("txtserialpc");
}

}else {
	$this->load->model('modelComputador');
	$newComputador = new modelComputador;
	$newComputador->serialPc	=$this->input->post("txtserialpc");
	$newComputador->modelo		 =   $selectedPC;
	$newComputador->netbios		 =$this->input->post("txtNetbios"); 
	$newComputador->dirMac		  =$this->input->post("txtDirMac");
	$newComputador->finArriendo	=$this->input->post("finarriendoPC");
	$newComputador->disponibilidad	="1";
// fix
	$preconsulta = $this->db->query("select * from computador WHERE `SERIALCOMPUTADOR` like '$newComputador->serialPc'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
}else { //si no existe 
	$this->modelComputador->formRegComputador($newComputador);
}
// fix
$TT=$this->input->post("txtserialpc");


}

///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC///PC//////PC
////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA
$selectImp = $this->input->post("selectImpresora");
if ($selectImp == null) {
if ($this->input->post("collapModelImpr")=="") {                           //NO SE CREA
	$JJ =NULL;
}else {
	echo "<scriot>alert('se trata de crear impresora');</script>";
	$this->load->model('modelImpresoraM');                                  // se crea
	$newModelImpresora = new modelImpresoraM;
	$newModelImpresora->modelo = $this->input->post("collapModelImpr");
	$newModelImpresora->funcionalidades = $this->input->post("collapFuncImpr");
	$newModelImpresora->marca = $this->input->post("collapMarcaImp");
	// NOUSADO $newModelImpresora->durabilidad = $this->input->post("");
	// NOUSADO $newModelImpresora->imagen = $this->input->post("");
	$this->modelImpresoraM->formRegModelImpresora($newModelImpresora);

	///creacion del Impresora como tal
	$this->load->model('modelImpresora');
	$newImpresora = new modelImpresora;
	$newImpresora->serial = $this->input->post("txtserialimpresora");
	$newImpresora->modelo = $this->input->post("collapModelImpr");
	$newImpresora->fecha = $this->input->post("finarriendoImpresora");
	$newImpresora->disponibilidad ="1";
	// fix
	$preconsulta = $this->db->query("select * from impresora WHERE `SERIALIMPRESORA` like '$newImpresora->serial'")->result();
	if (count($preconsulta) > 0 ) {// existe este monitor
	//no hace nada porque ya existe
}else { //si no existe 
	$this->modelImpresora->formRegImpresora($newImpresora);
}
// fix
$JJ =$this->input->post("txtserialimpresora");

}
}else {                                                                      //se asigna
	$this->load->model('modelImpresora');
	$newImpresora = new modelImpresora;
	$newImpresora->serial = $this->input->post("txtserialimpresora");
	$newImpresora->modelo = $selectImp;
	$newImpresora->fecha = $this->input->post("finarriendoImpresora");
	$newImpresora->disponibilidad ="1";
// fix
	$preconsulta = $this->db->query("select * from impresora WHERE `SERIALIMPRESORA` like '$newImpresora->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
}else { //si no existe 
	$this->modelImpresora->formRegImpresora($newImpresora);
}
// fix
$JJ =$this->input->post("txtserialimpresora");
}
////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA////IMPRESORA
////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS

$selectUps = $this->input->post("selectups");//check nuevo o no
if ($selectUps == null) {//entonces crear
	if ($this->input->post("collapModUPs")=="") {
		$VL = NULL;
	}else {
		$this->load->model('modelUPSM');
$newModelUps= new modelUPSM; //instancia
$newModelUps->modelo = $this->input->post("collapModUPs");
$newModelUps->capacidad =$this->input->post("collapCapacUps");
$newModelUps->funcionalidad=$this->input->post("collapFuncUps");
$newModelUps->marca=$this->input->post("collapMarcaUps");
$this->modelUPSM->formRegModelUps($newModelUps);//crea modelo

///creacion del UPS como tal
$this->load->model('modelUPS');
$newUps = new modelUPS;//instancia de objeto UPS
$newUps->serial=$this->input->post("txtserialups"); // nueva serial
// $newUps->modelo=$this->input->post("selectups"); //el seleccionado
$newUps->modelo=$this->input->post("collapModUPs");//el recien creandose
$newUps->disponibilidad = "1";
// fix
$preconsulta = $this->db->query("select * from ups WHERE `SERIALUPS` like '$newUps->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
}else { //si no existe 
	$this->modelUPS->formRegUps($newUps);
}
// fix
$VL = $this->input->post("txtserialups");

}
}else {
	$this->load->model('modelUPS');
	$newUps = new modelUPS;
$newUps->serial=$this->input->post("txtserialups"); // nueva serial
$newUps->modelo=$selectUps;
$newUps->disponibilidad = "1";
// fix
$preconsulta = $this->db->query("select * from ups WHERE `SERIALUPS` like '$newUps->serial'")->result();
if (count($preconsulta) > 0 ) {// existe este monitor
//no hace nada porque ya existe
}else { //si no existe 
	$this->modelUPS->formRegUps($newUps);
}
// fix
$VL = $this->input->post("txtserialups");
}

////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS////UPS
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$error = $this->db->error();//luego de ver varios inserts


//EXISTE ERRO
if (($error["message"]) != "") {//sin errores
	var_dump($this->db->error());
$this->db->trans_rollback();//fix
} else {
	$this->load->model('modelInventarioHJNC');
	$QT = new modelInventarioHJNC;
$QT->idInventario = "esta forzado como null en la consulta";//
$QT->ipv6 = "nulo";
$QT->ipv4 =$this->input->post("txtnuevaip");//
$QT->red =$this->input->post("txtRed");//
$QT->PERSONA = $KZ; // importante debugear
$QT->TELEFONO = $PQ;// importante debugear
$QT->UNIDAD = $GG;
$QT->MONITOR = $GT;
$QT->PC = $TT;
$QT->IMPRESORA = $JJ;
$QT->UPS = $VL;

$insercionDeDatos = $this->modelInventarioHJNC->metodoADDinventario($QT);
var_dump($this->db->error());

if ($insercionDeDatos) {
$this->db->trans_complete();//logrado
var_dump($this->db->error());
}






}


if ($insercionDeDatos == true) {
	redirect('controllerEmpleados/pageHome');
}





}//fin metodo



}

/* End of file controllerInventarioHJNC.php */
/* Location: ./application/controllers/controllerInventarioHJNC.php */