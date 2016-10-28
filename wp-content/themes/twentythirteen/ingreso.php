<?php
require_once('authenticate.php');
session_start();
if ($_POST['accion'] == 1){
	$usuario     = $_POST["logusername"];
	$contrasena  = $_POST["logpassword"];
	$data = array();
	$ingreso= authenticate("Domain Users",$usuario,$contrasena);
			if ($ingreso == true){
			$data['success'] = true;
			$_SESSION['usuario']=$usuario;
		} else {
			$data['success'] = false;
		}	
		
} else {
	session_unset(); 
	session_destroy(); 
	$data['success'] =true;	
}

echo json_encode($data);
?>