<?php

    session_start();
	
    if($_SESSION['usuario']!= "rober")
		{      
          header('location: index.php');
          }
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

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

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
<link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="inicio.php">
			<img src="assets/img/logo.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
            <!-- COMIENZO DE MENU -->
            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper">
                    <div class="sidebar-toggler hidden-phone">
                    </div>
                </li>
                <li>
                    <a href="inicio.php">
                        <i class="fa fa-home"></i>
						<span class="title">
							ENTRADA
						</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-phone"></i>
								<span class="title">
							    Atencion al Cliente
						        </span>
							<span class="arrow">
                            </span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="formulario_atencion.php">
                                <span class="glyphicon glyphicon-th-list"></span>
                                Formulario
                            </a>
                            <a href="estadisticas_atencion.php">
                                <i class="fa fa-bar-chart-o"></i>
                                Estadisticas
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="start active">
                    <a href="#">
                        <i class="fa fa-money"></i>
								<span class="title">
							    Ventas y Compras
						        </span>
                                <span class="arrow">
								</span>
                    </a>
                    <ul class="sub-menu">
                        <li  class="start active">
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                Clientes
                                        <span class="arrow">
								</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="start active">
                                    <a href="juridicos.php">
                                        <i class="fa fa-building-o"></i>
                                        Juridicos
                                    </a>
                                </li>
                                <li>
                                    <a href="naturales.php">
                                        <i class="fa fa-user"></i>
                                        Naturales
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                Proveedores
                                        <span class="arrow">
								</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="proveedores.php">
                                        <i class="fa fa-list-ol"></i>
                                        Lista
                                    </a>
                                </li>
                                <li>
                                    <a href="anadir_proveedores.php">
                                        <i class="fa fa-plus"></i>
                                        A&ntildeadir
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a>
                        <i class="fa fa-calendar-o"></i>
								<span class="title">
							    Prog Eventos
						        </span>
								<span class="arrow">
								</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="estadisticas_eventos.php">
                                <i class="fa fa-bar-chart-o"></i>
                                Estadisticas y Metas
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-info-circle"></i>
                                Informacion
                                        <span class="arrow">
								        </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="informacion_profesores.php">
                                        <span class="glyphicon glyphicon-user"></span>
                                        Profesores
                                    </a>
                                    <a href="informacion_eventos.php">
                                        <span class="glyphicon glyphicon-list-alt"></span>
                                        Eventos
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="salir.php">
                        <span class="glyphicon glyphicon-lock"></span>
						<span class="title">
							Cerrar Sesion
						</span>
                    </a>
                </li>
            </ul>
            <!-- FINAL DE MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Ventas y Compras <small>Panel de Clientes Juridicos</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="inicio.php">
								Inicio
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a>
                                Ventas y Compras
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
                        <li>
                            <a>
                                Clientes
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="juridicos.php">
                                Juridicos
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-building-o"></i>Clientes Juridicos
							</div>
														<div class="tools">
								<a href="javascript:" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<?php
include('conex2.php');
$result = mysqli_query($link,"
select e.pais as Pais, r1.empresa as empresa, r2.asistentes as asistentes, r1.reservaciones as reservaciones, r1.rif as rif, r1.email as mail, r1.tlf_cel as cel, r1.tlf_fijo as local

from (
    (SELECT count(*) as reservaciones, id_eventos, empresa, rif, email, tlf_cel, tlf_fijo, fecha
     FROM res_reservaciones
     where tipo = 'juridica' and rif is not null and rif != '0' and rif != '--'
     group by rif) r1

    join

    (SELECT count(*) as asistentes, rr.rif
          FROM res_reservaciones rr
     join res_asistentes ra on rr.id = ra.id_reservaciones
     where tipo = 'juridica' and asistencia = 1 and rif is not null and rif != '0' and rif != '--'
     group by rr.rif) r2

    on r1.rif = r2.rif
)
join eventos e
on r1.id_eventos = e.id
where year(r1.fecha)<=YEAR(CURRENT_TIMESTAMP) and e.modalidad = 'presencial'
order by asistentes desc
");
?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Empresa
								</th>
								<th aria-sort="descending">
									 Asistentes
								</th>
                                <th>
                                    Reservaciones
                                </th><th class="hidden-xs">
                                    Pais
                                </th>
								<th class="hidden-xs">
									 Rif
								</th>
								<th class="hidden-xs">
									 Correo
								</th>
								<th class="hidden-xs">
									 Tlf Celular
								</th>
                                <th class="hidden-xs">
                                    Tlf Fijo
                                </th>
							</tr>
							</thead>
							<tbody>
                            <?php
                            while ($row=mysqli_fetch_array($result))
                            {
                                echo '<tr><td>'.$row["empresa"].'</td>';
                                if($row["asistentes"] >= 15   ){
                                    echo '<td><span class="label label-sm label-success">'.str_pad($row["asistentes"],3," ",STR_PAD_LEFT).'</span> </td>';
                                }
                                else if ($row["asistentes"] < 15   ){
                                    echo '<td><span class="label label-sm label-danger">'.str_pad($row["asistentes"],3," ",STR_PAD_LEFT).'</span> </td>';
                                }
                                echo '<td>'.$row["reservaciones"].'</td>';
                                echo '<td>'.$row["Pais"].'</td>';
                                echo '<td>'.$row["rif"].'</td>';
                                echo '<td>'.$row["mail"].'</td>';
                                echo '<td>'.$row["cel"].'</td>';
                                echo '<td>'.$row["local"].'</td>';
                            }
                            mysqli_free_result($result);
                            ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2014 &copy; Roberto Fernandez.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
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
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
   TableAdvanced.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>