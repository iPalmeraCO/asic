<?php

function authenticate($group, $user, $password) {
	
	$msg = "";
	
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
		$msg = $msg."Connect to LDAP...<br/>";
	}else{
		$msg = $msg."Could not connect to LDAP...<br/>";
	}

	// Verify user and password
	$bind = ldap_bind($ldap, $user, $password);
	
	if($bind) {
		
		// Check presence in groups
		$result = ldap_search($ldap, $ldap_dn, "cn=".$group);
		
		// Get data entry
		$entries = ldap_get_entries($ldap, $result);
		
		if($entries["count"] != 0){

			$msg = $msg."<b>Authenticated to LDAP...</b><br/>";
		
			$msg = $msg."<br/>Info from Active Directory...<br/>";
		
			var_dump($entries);		
			
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
			$msg = $msg."<b>NO Authenticated to LDAP...</b><br/>";
		}
		
	} else {
		$msg = $msg."<b>NO Authenticated to LDAP...</b><br/>";
	}
	
	return $msg;
}
?>