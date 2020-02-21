<?php
if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * Clase Base de Datos del Sistema
 **/

class Basedatos
{
    // --- ATTRIBUTES ---

    /**
     * Short description of attribute servidor
     *
     * @access public
     * @var string
     */
    public $servidor = '';

    /**
     * Short description of attribute puerto
     *
     * @access public
     * @var string
     */
    public $puerto = '';

    /**
     * Short description of attribute usuario
     *
     * @access public
     * @var string
     */
    public $usuario = '';

    /**
     * Short description of attribute password
     *
     * @access public
     * @var string
     */
    public $password = '';

    /**
     * Short description of attribute basedato
     *
     * @access public
     * @var string
     */
    public $basedato = '';
    

    // --- OPERATIONS ---

    
	function conectar_archivo() {
		$cnn = mysql_connect("localhost","root","alejoo",3306) or die('No se pudo conectar con el servidor de datos: '.mysql_error());
		$db = mysql_select_db("rayos",$cnn) or die('No se pudo establecer conexión con la Base de Datos: '.mysql_error());

		return $cnn;
	}
	
	/**
	 * Ejecuta la consulta a MySql $sql
	 *
	 * @param string $sql
	 * @return Recordset
	 */      
	function ejecutar_sql_archivo($sql) {
		$cnn = $this->conectar_archivo();
		$res = mysql_query($sql,$cnn);
		return $res;
	}
}