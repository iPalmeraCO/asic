<?php
session_start();
if ($_POST['accion'] == 1){
	$usuario     = $_POST["logusername"];
	$contrasena  = $_POST["logpassword"];
	$data = array();

		if ($usuario == "admin" && $contrasena == "S7dIs031m2ImNbqXFP"){
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