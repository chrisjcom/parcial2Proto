<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to LDAP</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
    <!-- 
        Host
        Base DN
        Usuario
        Password
     -->
        <form action="conectar.php" method="post">
            <div class="form-group">
                <label for="host: ">Host: </label>
                <input type="text" class="form-control" id="host" name="host" placeholder="e.g. 192.168.122.53">
            </div>
            <div class="form-group">
                <label for="baseDN">Base DN: </label>
                <input type="text" class="form-control" id="baseDN" name="baseDN" placeholder="e.g. ou=usuarios,cn=admin,dc=picnic,dc=com">
            </div>
            <div class="form-group">
                <label for="username: ">User: </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="e.g. cn=admin,dc=picnic,dc=com">
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="e.g. magico">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <button class="btn btn-default" type="reset">Cancelar</button>
        </form>
        <p>
            <label for="nameCon"></label>
            <input type="text" id="nameCon" name="nameCon">
            <button id="guardarCon=">Guardar</button>
        </p>
    </div>
</body>
</html>