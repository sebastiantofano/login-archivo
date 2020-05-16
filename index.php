

<html>
<head></head>
<body>

<form action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
    <label>Usuario</label> <input type="text" name="usuario" required><br />
    <label>Clave</label> <input type="password" name="clave" required><br />
    <?php
        echo (isset($_GET["fallo"])) ? "<p style='color:red'>Usuario o clave incorrecta </p>" : "" ;
    ?>
    <input type="submit" value="enviar">
</form>

<a href="registro.php">Ir a Pagina de Registro</a>

</body>
</html>

