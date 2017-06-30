<?php
    require 'vendor/autoload.php';
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar usuarios de LDAP</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./css/estilos.css">
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
                    <li><a href="index.php"><i class="fa fa-user" aria-hidden="true"></i>Crear Usuario</a></li>
                    <li><a href="showUsers.php"><i class="fa fa-list" aria-hidden="true"></i>Mostrar Usuarios</a></li>                    
                </ul>
            </nav>
        </header>
        
<?php
        $options = array(
            'host' => $host,
            'password' => $password,
            'bindRequiresDn' => true,
            'baseDn' => $baseDN,
            'username' => $username
        );
        $ldap = new Zend\Ldap\Ldap($options);
        $ldap->bind();
        $result = $ldap->search(
            '(objectclass=AsteriskSIPUser)',
            'ou=empleados,ou=usuarios,dc=picnic,dc=com',
            Zend\Ldap\Ldap::SEARCH_SCOPE_SUB
        );

        print json_encode($result->toArray());

        /*$count = 0;
        foreach ($result as $item) {
            $count++;
            if($count>1)
                echo $item["dn"] . ': ' . $item['cn'][0] . '<br />';
        }*/
    } else
    {
        header("Location:index.php");
    }
?>
    </div>
    <script src="./node_modules/jquery/dist/jquery.js"></script>
</body>
</html>
