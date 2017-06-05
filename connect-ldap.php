<?php
require 'vendor/autoload.php';

$baseDn = 'dc=picnic,dc=com';
$options = array(
    'host' => '192.168.122.53',
    'password' => 'proto',
    'bindRequiresDn' => true,
    'baseDn' => '   ou=empleados,ou=usuarios,dc=picnic,dc=com',
    'username' => "cn=admin,$baseDn"
);
$ldap = new Zend\Ldap\Ldap($options);
$ldap->bind();

$result = $ldap->search(
   '(objectclass=*)',
   "$baseDn",
   Zend\Ldap\Ldap::SEARCH_SCOPE_SUB
);

/*print json_encode($result->toArray());*/
$count = 0;
foreach ($result as $item) {
    $count++;
    if($count>4)
        echo $item["dn"] . ': ' . $item['cn'][0] . '<br />';
}

/*$entry = [];
Zend\Ldap\Attribute::setAttribute($entry, 'cn', 'Christian Jhossymar');
Zend\Ldap\Attribute::setAttribute($entry, 'sn', 'Contreras Murgas');
Zend\Ldap\Attribute::setAttribute($entry, 'homeDirectory', '/home/inmoral/picnic/christian.contreras');
Zend\Ldap\Attribute::setAttribute($entry, 'mail', 'christian.contreras@picnic.com');
Zend\Ldap\Attribute::setAttribute($entry, 'mailbox', 'picnic/christian.contreras/');
Zend\Ldap\Attribute::setAttribute($entry, 'uid', 'christian.contreras');
Zend\Ldap\Attribute::setAttribute($entry, 'userPassword', 'magico');
Zend\Ldap\Attribute::setAttribute($entry, 'objectClass', ["inetOrgPerson","organizationalPerson","CourierMailAccount","person","top"]);

$ldap->add('uid=christian.contreras,ou=empleados,ou=usuarios,dc=picnic,dc=com',$entry);*/

//cn -> Jorge Alberto
//homeDirectory -> /home/inmortal/picnic/jorge.gonzalez
//mail -> jorge.gonzalez@picnic.com
//sn -> Gonzalez Barillas
//mailbox -> picnic/jorge.gonzalez/
//uid -> jorge.gonzalez
//userPassword


/* Campos a pedir para Asterisk */
/*
    cn *
    ObjectClass -> AsteriskAccount,AsteriskSIPUser,AsteriskExtension,inetOrgPerson,person,top,organizationalPerson
    sn *
    AstAccountAllowedCodec -> ulaw,alaw,gsm
    AstAccountCallerID -> 1001 *
    AstAccountContext -> todos
    AstAccountDisallowedCode -> all
    AstAccountHost -> dynamic
    AstAccountLastQualityMiliseconds -> 1
    AstAccountMailbox -> carlosf@chiquipan.com *
    AstAccountMusicOnHold ->  default
    AstAccountQualify -> yes
    AstAccountSecret -> carlos *
    AstAccountType -> friend
    AstAccountVideoSupport -> yes
    AstExtension -> 1001 *
    uid -> 1001 *   
*/
?>