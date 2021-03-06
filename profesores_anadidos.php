<?php

session_start();

if($_SESSION['usuario']!= "rober")
{
    header('location: index.php');
}
?>

<!DOCTYPE html><html lang="en" class="no-js">

<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
    <title> AE | Administrador de Estadisticas</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/pages/lock.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="inicio.php">
            <img src="assets/img/logo.png" alt="logo" class="img-responsive">
		</a>
	</div>
	<div class="page-body">
		<img class="page-lock-img" src="assets/img/profile/profile.png" alt="">
		<div class="page-lock-info">
			<h1>Datos Añadidos Exitosamente</h1>
            <a href="inicio.php">
            <span class="email">
				 INICIO
			</span>
            </a>
            <a href="anadir_profesores.php">
            <span class="email">
				 Añadir Otro Facilitador
			</span>
            </a>
            <?php
            $a=$_POST['nombre'];
            $c=$_POST['cedula'];
            $d=$_POST['numero'];
            $e=$_POST['email'];
            $f=$_POST['honorarios'];
            $g=$_POST['ciudad'];
            $h=$_POST['category1'];
            $i=$_POST['category2'];
            $link=mysqli_connect("localhost:3306","anroc_roberto","20697009");
            mysqli_select_db($link,"anrocom_tesis");
            mysqli_query($link,"insert into facilitadores (nombre,cedula,numero,email,honorarios,ciudad,id_pais,tipo_eventos) values ('$a','$c','$d','$e','$f','$g','$h','$i')");
            ?>
		</div>
	</div>
    <div class="footer-inner">
        2014 &copy; Roberto Fernandez.
    </div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/lock.js"></script>
<script>
jQuery(document).ready(function() {    
   App.init();
   Lock.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>