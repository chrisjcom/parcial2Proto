<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar usuarios a LDAP</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h1>Crear usuario</h1>
        <form action="crearUsuario.php" method="post">
            <div class="form-group">
                <label for="commonName">Common Name: </label>
                <input type="text" class="form-control" id="commonName" name="commonName" placeholder="e.g. David, Alejandro, Lidia, Gabriela, Erick">
            </div>
            <div class="form-group">
                <label for="surname">Surname: </label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="e.g. Contreras, Salazar, Fuentes, Acevedo, Olmedo, etc.">
            </div>
            <div class="form-group">
                <label for="callerID">Caller ID: </label>
                <input type="text" class="form-control" id="callerID" name="callerID" placeholder="e.g. Jorge Gonzalez, Guillermo Rivera, Roberto Casadei">
            </div>
            <div class="form-group">
                <label for="mailbox">Mailbox: </label>
                <input type="email" class="form-control" id="mailbox" name="mailbox" placeholder="e.g. jorge.gonzalez@chiquipan.com, guillermo.rivera@manisalado.com">
            </div>
            <div class="form-group">
                <label for="uid">Username: </label>
                <input type="text" class="form-control" id="uid" name="uid" placeholder="e.g. David, Alejandro, Lidia, Gabriela, Erick">
            </div>
            <div class="form-group">
                <label for="secret">Secret: </label>
                <input type="password" class="form-control" id="secret" name="secret" placeholder="e.g. magico">
            </div>
            <!--<div class="form-group">
                <label for="extension">Extension: </label>
                <input type="number" class="form-control" id="extension" name="extension" placeholder="e.g. 1101, 1054, 1498, 1376, 1239, etc.">
            </div>-->
            <button type="submit" class="btn btn-default">Submit</button>
            <button class="btn btn-default" type="reset">Cancelar</button>
        </form>
    </div>
    
    <!--
    /* Campos a pedir para Asterisk */
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
    -->
</body>
</html>