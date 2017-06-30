<?php
    require 'vendor/autoload.php';
    session_start();
    if(isset($_SESSION['username']))
    {
        $domain = split(',dc=',$_SESSION["baseDn"]);
        $options = array(
            'host' => $_SESSION['host'],
            'password' => $_SESSION['password'],
            'bindRequiresDn' => true,
            'baseDn' => $_SESSION['baseDn'],
            'username' => $_SESSION['username']
        );
        $ldap = new Zend\Ldap\Ldap($options);
        $ldap->bind();

        if(!empty($_POST)) {                
            $mailbox = $_POST['commonName'].'.'.$_POST['surname'].'@'.$domain[1].'.'.$domain[2];
            $entry = [];
            Zend\Ldap\Attribute::setAttribute($entry, 'cn', $_POST['commonName']);
            Zend\Ldap\Attribute::setAttribute($entry, 'sn', $_POST['surname']);
            Zend\Ldap\Attribute::setAttribute($entry, 'uid', $_POST['commonName']);
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountContext', 'internal');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountCallerID', $_POST['commonName'].' '.$_POST['surname']);
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountSecret', $_POST['secret']);
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountQualify', 'yes');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountNAT', 'no');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountType', 'friend');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountHost', 'dynamic');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountInsecure', 'invite');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountMailbox', $mailbox);
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountCanReInvite', 'yes');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountAllowedCodec', 'alaw,gsm,ulaw,h264,h263,h263p');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountLastQualifyMilliseconds', 500);
            Zend\Ldap\Attribute::setAttribute($entry, 'objectClass', ["inetOrgPerson","top","AsteriskSIPUser"]);

            /*Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountDisallowedCodec', 'all');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountMusicOnHold', 'default');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstAccountVideoSupport', 'yes');
            Zend\Ldap\Attribute::setAttribute($entry, 'AstExtension', $_POST['extension']);*/

            $ldap->add('uid='.$_POST['commonName'].',ou=sipUsers,dc='.$domain[1].',dc='.$domain[2],$entry);

            /*for ($i = 1; $i < 5 ; $i++) { 
                $entry = [];
                Zend\Ldap\Attribute::setAttribute($entry, 'cn', $_POST['commonName'].'-'.$i);
                Zend\Ldap\Attribute::setAttribute($entry, 'sn', $_POST['commonName'].'-'.$i);
                Zend\Ldap\Attribute::setAttribute($entry, 'AstContext', 'internal');
                Zend\Ldap\Attribute::setAttribute($entry, 'AstExtension', $_POST['commonName']);
                Zend\Ldap\Attribute::setAttribute($entry, 'AstPriority', $i);
                if($i == 1)
                {
                    Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Answer');    
                } else if($i == 2)
                {
                    Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Dial');    
                    Zend\Ldap\Attribute::setAttribute($entry, 'AstApplicationData', 'SIP/'.$_POST['commonName']);    
                } else if($i == 3)
                {
                    Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Voicemail');    
                    Zend\Ldap\Attribute::setAttribute($entry, 'AstApplicationData', $mailbox);    
                } else
                {
                    Zend\Ldap\Attribute::setAttribute($entry, 'AstApplication', 'Hangup');    
                }
                Zend\Ldap\Attribute::setAttribute($entry, 'objectClass', ["inetOrgPerson","top","AsteriskExtension"]);

                $ldap->add('cn='.$_POST['commonName'].'-'.$i.',ou=extensiones,dc=picnic,dc=com',$entry);
            }*/
        } else {
            echo "Vacio";
        }
    }
    header('Location:index.php');
?>