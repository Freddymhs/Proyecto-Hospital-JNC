<?php
include_once "../clases/class.Usuario.php";
include_once "../clases/Utiles.inc";

$cli = new Usuario();

//$ut = new Utiles();
//$ut->addlog("msj_login.log","res : $u, $p /n");

$u = 'agonzalez';
$p = 'alejo01';

$res = $cli->get_usuariosLogin($u,$p);

$username = $res[0]->username;
$userpass = $res[0]->userpass;

echo "resul : $username, $userpass";