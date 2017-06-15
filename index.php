<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar usuarios a LDAP</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container">
<?php
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $host = $_SESSION['host'];
        $baseDN = $_SESSION['baseDn'];         
?>
        <header>
            <nav>
                <ul id="menu">
                    <li><a href="createUser.php">Crear Usuario</a></li>
                    <li><a href="showUsers.php">Mostrar Usuarios</a></li>                    
                </ul>
            </nav>
        </header>
        <h1>Crear usuario</h1>
        <form action="crearUsuario.php" method="post">
            <div class="form-group">
                <label for="commonName">Common Name: </label>
                <input type="text" class="form-control" id="commonName" name="commonName" placeholder="e.g. David, Alejandro, Lidia, Gabriela, Erick" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname: </label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="e.g. Contreras, Salazar, Fuentes, Acevedo, Olmedo, etc." required>
            </div>
            <!--<div class="form-group">
                <label for="callerID">Caller ID: </label>
                <input type="text" class="form-control" id="callerID" name="callerID" placeholder="e.g. Jorge Gonzalez, Guillermo Rivera, Roberto Casadei" required>
            </div>
            <div class="form-group">
                <label for="mailbox">Mailbox: </label>
                <input type="email" class="form-control" id="mailbox" name="mailbox" placeholder="e.g. jorge.gonzalez@chiquipan.com, guillermo.rivera@manisalado.com" required>
            </div>
            <div class="form-group">
                <label for="uid">Username: </label>
                <input type="text" class="form-control" id="uid" name="uid" placeholder="e.g. David, Alejandro, Lidia, Gabriela, Erick" required>
            </div>-->
            <div class="form-group">
                <label for="secret">Secret: </label>
                <input type="password" class="form-control" id="secret" name="secret" placeholder="e.g. magico" required>
            </div>
            <!--<div class="form-group">
                <label for="extension">Extension: </label>
                <input type="number" class="form-control" id="extension" name="extension" placeholder="e.g. 1101, 1054, 1498, 1376, 1239, etc.">
            </div>-->
            <button type="submit" class="btn btn-default">Submit</button>
            <button class="btn btn-default" type="reset">Cancelar</button>
        </form>
<?php
    } else
    {
?>
        <p>
            <label for="nameCon">Nombre de conexion: </label>
            <input type="text" id="nameCon" name="nameCon">
            <button id="guardarCon" class='btn' >Guardar</button>
        </p>
        <form action="conectar.php" method="post">
            <div class="form-group">
                <label for="host: ">Host: </label>
                <input type="text" class="form-control" id="host" name="host" placeholder="e.g. 192.168.122.53" required>
            </div>
            <div class="form-group">
                <label for="baseDN">Base DN: </label>
                <input type="text" class="form-control" id="baseDN" name="baseDN" placeholder="e.g. ou=usuarios,cn=admin,dc=picnic,dc=com" required>
            </div>
            <div class="form-group">
                <label for="username: ">User: </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="e.g. cn=admin,dc=picnic,dc=com" required>
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="e.g. magico" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <button class="btn btn-default" type="reset">Cancelar</button>
        </form>
<?php
    }
?>
    </div>
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./js/localStorage.js"></script>
</body>
</html>
