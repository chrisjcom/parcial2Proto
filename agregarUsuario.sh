touch scrip.ldif
ldif=scrip.ldif


echo "Ingrese el nombre de usuario :"
read user


echo "Ingrese Password para el usuario  $user :"
stty -echo
read pass

stty echo
echo ""

echo "dn:uid=$user,ou=sipUsers,dc=crujito,dc=com">>$ldif
echo "objectClass: top">>$ldif
echo "objectClass: inetOrgPerson">>$ldif
echo "objectClass: AsteriskSIPUser">>$ldif
echo "cn: $user">>$ldif
echo "sn: $user">>$ldif
echo "uid: $user">>$ldif
echo "AstAccountContext: internal">>$ldif
echo "AstAccountCallerID: $user">>$ldif
echo "AstAccountSecret: $pass">>$ldif
echo "AstAccountQualify: yes">>$ldif
echo "AstAccountNAT: yes">>$ldif
echo "AstAccountType: friend">>$ldif
echo "AstAccountHost: dynamic">>$ldif
echo "AstAccountMailbox: $user@crujito">>$ldif
echo "AstAccountCanReinvite: yes">>$ldif
echo "AstAccountAllowedCodec: alaw,gsm">>$ldif
echo "AstAccountLastQualifyMilliseconds: 500">>$ldif
echo "">>$ldif


echo "dn:cn=$user-1,ou=extensiones,dc=crujito,dc=com">>$ldif
echo "objectClass: top">>$ldif
echo "objectClass: inetOrgPerson">>$ldif
echo "objectClass: AsteriskExtension">>$ldif
echo "cn: $user-1">>$ldif
echo "sn: $user-1">>$ldif
echo "AstContext: internal">>$ldif
echo "AstExtension: $user">>$ldif
echo "AstPriority: 1">>$ldif
echo "AstApplication: Answer">>$ldif
echo "">>$ldif

echo "dn:cn=$user-2,ou=extensiones,dc=crujito,dc=com">>$ldif
echo "objectClass: top">>$ldif
echo "objectClass: inetOrgPerson">>$ldif
echo "objectClass: AsteriskExtension">>$ldif
echo "cn: $user-2">>$ldif
echo "sn: $user-2">>$ldif
echo "AstContext: internal">>$ldif
echo "AstExtension: $user">>$ldif
echo "AstPriority: 2">>$ldif
echo "AstApplication: Dial">>$ldif
echo "AstApplicationData: SIP/$user">>$ldif
echo "">>$ldif

echo "dn:cn=$user-3,ou=extensiones,dc=crujito,dc=com">>$ldif
echo "objectClass: top">>$ldif
echo "objectClass: inetOrgPerson">>$ldif
echo "objectClass: AsteriskExtension">>$ldif
echo "cn: $user-3">>$ldif
echo "sn: $user-3">>$ldif
echo "AstContext: internal">>$ldif
echo "AstExtension: $user">>$ldif
echo "AstPriority: 3">>$ldif
echo "AstApplication: Voicemail">>$ldif
echo "AstApplicationData: $user@crujito">>$ldif
echo "">>$ldif

echo "dn:cn=$user-4,ou=extensiones,dc=crujito,dc=com">>$ldif
echo "objectClass: top">>$ldif
echo "objectClass: inetOrgPerson">>$ldif
echo "objectClass: AsteriskExtension">>$ldif
echo "cn: $user-4">>$ldif
echo "sn: $user-4">>$ldif
echo "AstContext: internal">>$ldif
echo "AstExtension: $user">>$ldif
echo "AstPriority: 4">>$ldif
echo "AstApplication: Hangup">>$ldif


echo "------- crujito.com -------- "
ldapadd -x -D "cn=admin,dc=crujito,dc=com" -W -f $ldif

rm $ldif

voicemail=/etc/asterisk/voicemail.conf
echo "$user => $user">>$voicemail

exit
