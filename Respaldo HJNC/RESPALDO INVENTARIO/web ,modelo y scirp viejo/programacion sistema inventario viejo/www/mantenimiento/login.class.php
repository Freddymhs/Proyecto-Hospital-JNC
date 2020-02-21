<?php
/******************************
**	PHP Login Ajax JQuery
**	programmer@chazzuka.com
**	http://www.chazzuka.com/
*******************************/
class Login
{
	// property
	private $user;
	private $pass;
	private $user_id;
	private $success_url;
	// init
	public function __construct()
	{	
		/*****PARA EL LGGEO DE 2 USUARIOS*****//*
		$this->user = 'informatica' || 'usuario';
		$this->pass = 'informatica' || 'usuario';
		$this->user_id = 1;
		*/
		$this->user = 'informatica';
		$this->pass = 's0p0rte';
		$this->user_id = 1;
		
	}
	// create form
	private function form($u=false)
	{
	    $html = '<form name="ajaxform" id="ajaxform">'.
					'<table border="0">'.
					  '<tr>'.
						'<td width="300">&nbsp;</td>'.
						'<td width="124">&nbsp;</td>'.
						'<td width="305">&nbsp;</td>'.
						'<td width="73">&nbsp;</td>'.
						'<td width="300">&nbsp;</td>'.
					  '</tr>'.
					  '<tr>'.
					  	'<td>&nbsp;</td>'.
						'<td colspan="3"></td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
					  '<tr>'.
					  	'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
                      '<tr>'.
					  	'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
					  '<tr>'.
						'<td>&nbsp;</td>'.
						'<td>Usuario</td>'.
						'<td><input type="text" name="nameuser" id="nameuser" class="textfield" value="'.$u.'" /></td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
					  '<tr>'.
						'<td>&nbsp;</td>'.
						'<td>Password</td>'.
						'<td><input type="password" name="passuser" id="passuser" class="textfield" /></td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
					  '<tr>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td><input type="submit" name="submit" id="submit" class="buttonfield" value="Login" /></td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
					  '<tr>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
						'<td>&nbsp;</td>'.
					  '</tr>'.
					'</table>'.
				  '</form>';
		
		return $html;

	}
		
	// signin
	public function signin()
	{
		sleep(1);// dont use this in production
		
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			// get username and password
			if(get_magic_quotes_gpc())
			{
				$u = stripslashes($_POST['nameuser']);
				$p = stripslashes($_POST['passuser']);
			}
			else
			{
				$u = $_POST['nameuser'];
				$p = $_POST['passuser'];
			}
		
			// if not blank
			if($u&&$p)
			{
				// try authenticate
				$permit = $this->auth($u,$p);
				// authenticated
				if($permit)
				{
				
					if($u=='informatica' && $p=='s0p0rte'){
					
						// json response 
						 $m = '{'.
						 'succes: true,'.
						 'title: \'<strong>Logeo correcto</strong>\', '.
						 'content: \'<script>window.location = "formulario_menu.php";</script>\''.
						 '}';
					}
					/*
					if($u=='usuario' && $p=='usuario'){
					
						// json response 
						$m = '{'.
						'succes: true,'.
						'title: \'<strong>Logeo correcto</strong>\', '.
						'content: \'<script>window.location = "formulario_solicitud_usuario.php";</script>\''.
						'}';
					
					}
					*/
					echo $m;
					
				}
				// failed authentication
				else
				{
					// json response
					$m = '{'.
						 'succes: false,'.
						 'title: \'<strong>La combinacion de usuario y password no es valida</strong>\''.
						 '}';
					echo $m;				
				}
			}
			else
			{
					// json response // user & pass are blank
					$m = '{'.
						 'succes: false,'.
						 'title: \'</strong> Para identificarte ingresa tu usuario y password\''.
						 '}';
					echo $m;
			}
		}
		else
		{
			// populate form
			echo $this->form();	
		}	
	}
	
	// check session expires
	private function session_expire_check()
		{
			// session not exist
			if(!isset($_SESSION["user_id"]) && !isset($_SESSION["expires"]))
			{
				// create
				$this->session_create();
			}
			else
			{
				//  if not valid current session
				if($_SESSION["user_id"]==0 && time() >= $_SESSION["expires"])
				{
					// destroy
					$this->session_kill();
				}
				else
				{
					// add 45 minutes more expiration
					$_SESSION["expires"] = (time()+(45*60));
				}
			}
		}
	// create session
	private function session_create($user_id=0)
		{
			$_SESSION['user_id'] = $user_id;
			$_SESSION["expires"] = time()+(45*60);
			return true;
		}
	// destroy session
	private function session_kill()
		{
			// if session is active
			if (isset($_SESSION["user_id"]) && $_SESSION["user_id"]!= 0)
			{
				// clean session
				$_SESSION = array();
				// create new
				$this->session_create();
			}
			return true;
		}
	
	// authenticate
	private function auth($u,$p)
		{
			if($u==$this->user&&$this->pass==$p)
			{
				$this->session_create($this->user_id);	
				return true;
			}
			return false;
		}
	// get file extension
	private function GetFileExtension($s)
	{
		return substr($s, strripos($s, '.') + 1);
	}
	// get file name withour extension
	private function GetFileNoExt($s)
	{
		return substr($s,0,(strlen($s)-(strlen($this->GetFileExtension($s))+1)));
	}
	// get file name with extension
	private function GetFileNameWithExt($s)
	{
		$current = strtolower(str_replace('\\','/',$s));
		return  substr($current,strrpos($current,'/')+1);
	}
		
	// check authentication
	public function checkauth()
	{
		// if logout request
		if(!(empty($_GET['a'])) && $_GET['a']=='logout'){$this->session_kill();}
		// check expiration
		$this->session_expire_check();
		// get current page name
		$curFile = $this->GetFileNoExt($this->GetFileNameWithExt($_SERVER["SCRIPT_NAME"]));
		// if not valid session and current page is not login page
		// redirect to login page
		if($_SESSION["user_id"]==0 && $curFile != 'login')
		{
			header('Location: login.php');
		}
	}
}
?>