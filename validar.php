<?php
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
include('conex.php');
include('funciones.php');

$wsql="select * from usuarios where usuario='$usuario' and clave='$clave'";
   		$resultado=mysqli_query($link,$wsql);
   		$row=mysqli_fetch_array($resultado);
		if ($row==0)
		{
			$_SESSION['men']="Usuario no Existe";
			redirect("index.php");
		}
		else
		if ( $row['nivel']=='1' )
		{
			$_SESSION['cod1']="$usuario";
			$_SESSION['nivel']=$row['nivel'];
			$_SESSION['usuario']=$row['usuario'];
			redirect("inicio.php");

		}
		else
		if ( $row['nivel']=='2' )
		{
			$_SESSION['cod1']="$usuario";
			$_SESSION['nivel']=$row['nivel'];
			$_SESSION['usuario']=$row['usuario'];
			redirect("inicio.php");
			
			
		}



?>