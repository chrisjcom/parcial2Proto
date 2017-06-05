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

    if(!empty($_POST)) {                
        $entry = [];
        Zend\Ldap\Attribute::setAttribute($entry, 'cn', $_POST['commonName']);
        Zend\Ldap\Attribute::setAttribute($entry, 'sn', $_POST['surname']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountDisallowedCodec', 'all');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountAllowedCodec', 'ulaw,alaw,gsm');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountCallerID', $_POST['callerID']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountContext', 'todos');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountHost', 'dynamic');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountLastQualifyMilliseconds', 1);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountMailbox', $_POST['mailbox']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountMusicOnHold', 'default');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountQualify', 'yes');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountSecret', $_POST['secret']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountType', 'friend');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountVideoSupport', 'yes');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstExtension', $_POST['extension']);
        Zend\Ldap\Attribute::setAttribute($entry, 'uid', $_POST['extension']);
        Zend\Ldap\Attribute::setAttribute($entry, 'objectClass', ["inetOrgPerson","organizationalPerson","person","top","AsteriskSIPUser"]);

        $ldap->add('uid='.$_POST["extension"].',ou=empleados,ou=usuarios,dc=picnic,dc=com',$entry);
    } else {
        echo "Vacio";
    }
?>