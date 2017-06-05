<?php
    require 'vendor/autoload.php';    
    $baseDn = 'dc=picnic,dc=com';
    $options = array(
        'host' => '192.168.122.53',
        'password' => 'proto',
        'bindRequiresDn' => true,
        'baseDn' => 'ou=sipUsers,dc=picnic,dc=com',
        'username' => "cn=admin,$baseDn"
    );
    $ldap = new Zend\Ldap\Ldap($options);
    $ldap->bind();

    if(!empty($_POST)) {                
        $entry = [];
        Zend\Ldap\Attribute::setAttribute($entry, 'cn', $_POST['commonName']);
        Zend\Ldap\Attribute::setAttribute($entry, 'sn', $_POST['surname']);
        Zend\Ldap\Attribute::setAttribute($entry, 'uid', $_POST['uid']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountContext', 'internal');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountCallerID', $_POST['callerID']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountSecret', $_POST['secret']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountQualify', 'yes');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountNAT', 'yes');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountType', 'friend');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountHost', 'dynamic');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountMailbox', $_POST['mailbox']);
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountCanReInvite', 'yes');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountAllowedCodec', 'alaw,gsm');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountLastQualifyMilliseconds', 500);        
        Zend\Ldap\Attribute::setAttribute($entry, 'objectClass', ["inetOrgPerson","top","AsteriskSIPUser"]);

        /*Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountDisallowedCodec', 'all');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountMusicOnHold', 'default');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountVideoSupport', 'yes');
        Zend\Ldap\Attribute::setAttribute($entry, 'AstExtension', $_POST['extension']);*/

        $ldap->add('uid='.$_POST["uid"].',ou=sipUsers,dc=picnic,dc=com',$entry);

        for ($i = 1; $i < 5 ; $i++) { 
            $entry = [];
            Zend\Ldap\Attribute::setAttribute($entry, 'cn', $_POST['uid'].'-'.$i);
            Zend\Ldap\Attribute::setAttribute($entry, 'sn', $_POST['uid'].'-'.$i);
            Zend\Ldap\Attribute::setAttribute($entry, 'AstContext', 'internal');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstExtension', $_POST['uid']);
            Zend\Ldap\Attribute::setAttribute($entry, 'AstPriority', $i);
            if($i == 1)
            {
                Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Answer');    
            } else if($i == 2)
            {
                Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Dial');    
                Zend\Ldap\Attribute::setAttribute($entry, 'AstApplicationData', 'SIP/'.$_POST['uid']);    
            } else if($i == 3)
            {
                Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Voicemail');    
                Zend\Ldap\Attribute::setAttribute($entry, 'AstApplicationData', $_POST['mailbox']);    
            } else
            {
                Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Hangup');    
            }
            // Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Answer');

            Zend\Ldap\Attribute::setAttribute($entry, 'objectClass', ["inetOrgPerson","top","AsteriskExtension"]);

            $ldap->add('uid='.$_POST["uid"].'-'.$i.',ou=extensiones,dc=picnic,dc=com',$entry);
        }
    } else {
        echo "Vacio";
    }
?>