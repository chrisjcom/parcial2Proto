<?php
    require 'vendor/autoload.php';
    if(!empty($_POST))
    {
        $baseDn = 'dc=picnic,dc=com';
        $options = array(
            'host' => $_POST['host'],
            'password' => $_POST['password'],
            'bindRequiresDn' => true,
            'baseDn' => $_POST['baseDn'],
            'username' => $_POST['username']
        );
        $ldap = new Zend\Ldap\Ldap($options);
        $ldap->bind();

        $result = $ldap->search(
            '(objectclass=*)',
            "$baseDn",
            Zend\Ldap\Ldap::SEARCH_SCOPE_SUB
        );

        print json_encode($result->toArray());
    }
?>