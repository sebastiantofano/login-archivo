<?php
session_start();

if(!isset($_SESSION["usuario"])){
    session_destroy();
    header("location: index.php");
    exit();
}

session_destroy();
header("location: index.php");
exit();



