<?php
    session_start();
    require 'vendor/autoload.php';
    if(!empty($_POST))
    {
        $options = array(
            'host' => $_POST['host'],
            'password' => $_POST['password'],
            'bindRequiresDn' => true,
            'baseDn' => $_POST['baseDN'],
            'username' => $_POST['username']
        );
        $ldap = new Zend\Ldap\Ldap($options);
        if($ldap->bind())
        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['host'] = $_POST['host'];
            $_SESSION['baseDn'] = $_POST['baseDN'];
            header('Location:index.php');
        } else {
            echo "Prueba 2";
        }
        /*$result = $ldap->search(
            '(objectclass=*)',
            "$baseDn",
            Zend\Ldap\Ldap::SEARCH_SCOPE_SUB
        );

        print json_encode($result->toArray());*/
    }
?>