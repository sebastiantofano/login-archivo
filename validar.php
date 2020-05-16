<?php
//Se fija si no llegaron valores por POST
if(!isset($_POST["usuario"]) || !isset($_POST["clave"])) {
    header("Location: index.php");
    exit();
}

//Setea a variables la supervariable $_POST
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$archivo = __DIR__. "/usuarios/".$usuario . ".json";
//Si el archivo que contiene al usuario existe
if(file_exists($archivo)) {
//    Convierte el archivo en un string (pero tiene formato JSON)
    $usuarioMatriz = file_get_contents($archivo);
//    echo $usuarioMatriz . "<br />";
    //Convierte un string codificado en JSON a una variable de PHP
    //Lo convierte en un array asociativo con TRUE
    $usuarioMatriz = json_decode($usuarioMatriz, TRUE);
//    print para ver el array asociativo
//    print_r($usuarioMatriz) ;
    if($usuarioMatriz["usuario"] == $usuario && $usuarioMatriz["clave"] == md5($clave)) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: interno.php");
        exit();
    }else{
        header("Location: index.php?fallo=true");
        exit();
    }
} else {
    header("Location: index.php?fallo=true");
    exit();
}
?>