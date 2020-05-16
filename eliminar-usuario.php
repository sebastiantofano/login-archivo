<?php
session_start();

if(!isset($_SESSION["usuario"]) /*or $_SESSION["usuario"] != 'admin'*/){
    header("Location: index.php");
    exit();
}
if($_SESSION["usuario"] == $_GET["usuario"]){
    header("location: listar-usuarios.php?auto=true");
    exit();
}


//Usuario enviado a eliminar
$usuario = $_GET["usuario"];
$dirUsuarios = "./Usuarios/";
unlink($dirUsuarios.$usuario.".json");

header("location: listar-usuarios.php");
exit();