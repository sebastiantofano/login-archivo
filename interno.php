<?php

session_start();
//si no se seteo un usuario a la session 
if(!isset($_SESSION["usuario"])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
echo "Hola:" . $_SESSION["usuario"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Interno</title>
</head>
<body>
    <h1>Pagina Interno</h1>
    <a href="cerrar-sesion.php">Cerrar sesión</a>
     <br />
    <form action="cambiar-contraseña.php" method="POST">
        <label for="clave-nueva">Introducí una nueva contraseña</label>
        <input type="text" name="clave-nueva" id="clave-nueva">
        <input type="submit" value="Cambiar">
    </form>
    <?php
        if(isset($_GET["cambio"])){
            echo "<p style='color:green'>Contraseña cambiada correctamente. </p>";
        }
    ?>
    <a href="listar-usuarios.php">Listar a todos los usuarios</a>

</body>
</html>
