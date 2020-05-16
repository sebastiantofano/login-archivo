<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        echo "<p>Usted no tiene acceso al listado de usuarios. Primero inicie sesión.</p>";
        echo "<a href='index.php'>Volver a la página principal</a>";
        exit();
    }

    echo "Sos el usuario: " . $_SESSION["usuario"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Usuarios</title>
</head>
<body>

    <h1>Lista de usuarios:</h1>
    <?php
    $dirUsuarios = "./usuarios/";
    $archivos = scandir($dirUsuarios);
    //print_r($archivos);
    echo "<br />";

    foreach ($archivos as $archivo){
        if(strcmp($archivo,".") && strcmp($archivo,"..") ){
            $usuarioMatrizJSON = file_get_contents($dirUsuarios.$archivo);
            $usuarioMatriz = json_decode($usuarioMatrizJSON,TRUE);
            $usuario = $usuarioMatriz["usuario"];
            echo "<li>Usuario: $usuario <a href='eliminar-usuario.php?usuario=$usuario'> Dar de baja</a> </li>";
        }
    }
    echo isset($_GET["auto"]) ? "<p style='color:red'>No te puedes eliminar</p>" : "";
    ?>

    <a href="interno.php">Volver a la página interna</a>
<div>

</div>
</body>
</html>