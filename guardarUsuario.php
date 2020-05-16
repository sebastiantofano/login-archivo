<?php
//Se fija si no llegaron valores por POST
if(!isset($_POST["usuario"]) || !isset($_POST["clave"])) {
    header("Location: index.php");
    exit();
}

//Setea a variables la supervariable $_POST
$usuario = $_POST["usuario"];
//Calcula el hash del string
$clave = md5($_POST["clave"]);
$archivo = $usuario . ".json";
$dir = __DIR__ . '/usuarios/';

if(!file_exists($dir.$archivo)) {
    $usuarioMatriz = array("usuario"=>$usuario,"clave"=>$clave);
//    Guardo un archivo
    file_put_contents($dir.$archivo, json_encode($usuarioMatriz));
//    echo $dir.$archivo;
        header("Location: registro.php?creado=true");
        exit();
} else {
    header("Location: index.php");
    exit();
}

