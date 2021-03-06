<?php

   //namespace App\Ldap;
  class LdapAut
  {

    static $ldapserver = "172.20.20.163";
    static $ldaptree   = "OU=usuarios,DC=asic,DC=loc";
    // static  $ldaptree  = "OU=Gurpos de seguridad,OU=Cuentas de Servicio,OU=Administracion,DC=asic,DC=loc";
    //static  $ldaptree ="OU=Grupos de seguridad,DC=asic,DC=loc";
    // arbol tree asic OU=Cuentas de Servicio,OU=Administracion,DC=asic,DC=loc
    // server 172.20.20.163
    // puerto 389  segundo parametro en ldap_connect

    public static function autentificar($codigo,$password)
    {
      if(empty($codigo) or empty($password))
      {
        Log::error('Error binding to LDAP: codigo or password empty');
      }
      $ldapRdn = static::getLdapRdn($codigo);
      $ldapcon = ldap_connect(self::$ldapserver,389);
      ldap_set_option($ldapcon, LDAP_OPT_PROTOCOL_VERSION, 3);
      $result  = false;

      if($ldapcon)
      {
        $ldapbind = @ldap_bind($ldapcon,$ldapRdn,$password);
        if($ldapbind)
        {
          $result = true;
        } else {
          $result = false;
        }

        return $result;
      } else {
            Log::error('Error connecting to LDAP.');
      }
    }

    public static function tipoDempleado($username,$password)
    {
      if(empty($username) or empty($password))
      {
        Log::error('Error haciendo bind a LDAP: username o password vacios');
      }
      $ldapRdn  = static::getLdapRdn($username);
      $ldapcon  = ldap_connect(self::$ldapserver);
      ldap_set_option($ldapcon, LDAP_OPT_PROTOCOL_VERSION, 3);
      $result  = false;
      if($ldapcon)
      {
        $ldapbind = @ldap_bind($ldapcon,$ldapRdn,$password);
        if($ldapbind)
        {
          //$result  = true;
          $query   = "(&(objectClass=inetOrgPerson)(cn=".$username."))";
          $results = ldap_search($ldapcon,self::$ldaptree,$query);
          $entries = ldap_get_entries($ldapcon, $results);
          if (isset($entries[0]['employeetype'])) {
            $result  = $entries[0]['employeetype'];

          }else{
            $result = 0;
          }
          // $result  = $entries[0]['employeetype'];
          // if ($result == '') {
          //   $result = 'general';
          // }
        } else {
          $result = false;
        }
        ldap_unbind($ldapcon);
      } else {
            Log::error('Error conectando a LDAP.');
      }
      return $result;
    }

    public static function getLdapRdn($codigo)
    {
      return str_replace('[codigo]',$codigo,'CN=[codigo],'.self::$ldaptree);
    }
  }

?>
