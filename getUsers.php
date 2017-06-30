<?php
    require 'vendor/autoload.php';
    session_start();

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $host = $_SESSION['host'];
        $baseDN = $_SESSION['baseDn'];

        $options = array(
            'host' => $host,
            'password' => $password,
            'bindRequiresDn' => true,
            'baseDn' => $baseDN,
            'username' => $username
        );
        $ldap = new Zend\Ldap\Ldap($options);
        $ldap->bind();
        $result = $ldap->search(
            '(objectclass=AsteriskSIPUser)',
            $baseDN,
            Zend\Ldap\Ldap::SEARCH_SCOPE_SUB
        );

        print json_encode($result->toArray());
    }
?>