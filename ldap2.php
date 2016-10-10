<?php
 require_once('LdapAut.php');
 $prueba = new LdapAut;

 //$username = 'user2';
 //$pass = '1234';
 if(empty($_POST["nombre"])  || empty($_POST["codigo"])){
 	echo "faltan campos por llenar";
 	die();
 }
else{
	$var=$prueba::autentificar($_POST["nombre"],$_POST["codigo"]);

	if($var == true)
	{
		echo "el usuario  es valido en el LDAP ";
	}else{
		echo "el usuario no esta registrado en el ldap";
	}
}
?>
