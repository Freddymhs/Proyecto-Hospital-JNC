<?php


if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/*** Llamada clase Basedato ***/
include("class.Basedato.php");

class Usuario {
	
	// --- ATTRIBUTES ---
	
	/**
     * Short description of attribute id_usuario
     *
     * @access public
     * @var int
     */
    public $id_usuario = 0;
	
	/**
     * Short description of attribute nombres_usuario
     *
     * @access public
     * @var char
     */
    public $nombres_usuario = '';
	
	/**
     * Short description of attribute apellidos_usuario
     *
     * @access public
     * @var char
     */
    public $apellidos_usuario = '';
    
    /**
     * Short description of attribute username
     *
     * @access public
     * @var char
     */
    public $username = '';
    
    /**
     * Short description of attribute userpass
     *
     * @access public
     * @var char
     */
    public $userpass = '';
    
    /**
     * Short description of attribute tipo_usuario
     *
     * @access public
     * @var numeric
     */
    public $tipo_usuario= 0;
    
    
    // --- OPERATIONS ---
    
    
    /**
	 * Buscar usuarios para login
	 *
	 * @param $username,$userpass
	 * @name get_usuariosLogin
	 * @return Usuario[]
	 */
    function get_usuariosLogin($username,$userpass){
    	
    	$sql = "SELECT id_usuario, nombres_usuario, apellidos_usuario, username, userpass, tipo_usuario
				FROM usuario
				WHERE username = '".$username."'
					AND userpass = '".$userpass."' ";
    	
    	$bd = new Basedato();
    	$resultado = $bd->ejecutar_sql_archivo($sql);
    	
    	$arreglodatos = array();
    	$i=0;
    	
    	while ($res = mysql_fetch_array($resultado)){
    		
    		$arreglodatos[$i] = new Usuario();
    		$arreglodatos[$i]->id_usuario = $res['id_usuario'];
    		$arreglodatos[$i]->nombres_usuarios = $res['nombres_usuario'];
    		$arreglodatos[$i]->apellidos_usuarios = $res['apellidos_usuarios'];
    		$arreglodatos[$i]->username = $res['username'];
    		$arreglodatos[$i]->userpass = $res['userpass'];
    		$arreglodatos[$i]->tipo_usuario = $res['tipo_usuario'];
				    	
    	}
    	
    	return $arreglodatos;
    }
}