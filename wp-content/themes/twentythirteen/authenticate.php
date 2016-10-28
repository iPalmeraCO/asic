<?php

function authenticate($group, $user, $password) {
	
	$msg = "";
	$return = true;
	
	if(empty($user) || empty($password)){
		$msg = $msg."Set the data...<br/>";
	}else{
		$msg = $msg."Set data group : ".$group.", user : ".$user.", password : ".$password."...<br/>";
	}

	// Active Directory Server
	$ldap_host = "ldap://172.20.20.163";
	
	// Active Directory Port
	$ldap_port = 389;

	// Active Directory DN
	
	if($group == "Intranet") $ldap_dn = "CN=Intranet,OU=Cuentas de Servicio,OU=Administracion,DC=asic,DC=loc";
	if($group == "Domain Users") $ldap_dn = "CN=Domain Users,OU=Grupos de seguridad,DC=asic,DC=loc";
	
	// Active directory Connect
	$ldap = ldap_connect($ldap_host, $ldap_port);
	
	if($ldap){
		$return = true;
	}else{
		$return = false;
	}

	// Verify user and password
	$bind = ldap_bind($ldap, $user, $password);
	
	if($bind) {
		
		// Check presence in groups
		$result = ldap_search($ldap, $ldap_dn, "cn=".$group);
		
		// Get data entry
		$entries = ldap_get_entries($ldap, $result);
		
		if($entries["count"] != 0){

			$return = true;	
			
		
			
			
			for ($i=0; $i < $entries["count"]; $i++)
			{	
				for ($j=0; $j < $entries[$i]["count"]; $j++)
				{
					// to show the attribute displayName (note the case!)
					if($entries[$i][$j]=="distinguishedname")
						$msg = $msg."<b>".$entries[$i][$j].":	".$entries[$i][$entries[$i][$j]][0]."</b>, ";
					else
						$msg = $msg.$entries[$i][$j].":	".$entries[$i][$entries[$i][$j]][0].", ";
				}
			}		
		}else{
			$return = false;	
		}
		
	} else {
		$return = false;	
	}
	
	return $msg;
}
?>