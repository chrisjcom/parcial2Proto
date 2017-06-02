<?php
    require 'vendor/autoload.php';

    $baseDn = 'dc=picnic,dc=com';
    $options = array(
        'host' => '192.168.122.53',
        'password' => 'proto',
        'bindRequiresDn' => true,
        'baseDn' => 'uid=jorge.gonzalez,ou=empleados,ou=usuarios,dc=picnic,dc=com',
        'username' => "cn=admin,$baseDn"
    );
    $ldap = new Zend\Ldap\Ldap($options);
    $ldap->bind();

    
?>