<?php
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$validado="s";
include('conex.php');
include('funciones.php');

    session_unset();

	session_destroy();
redirect("index.php");
?>
