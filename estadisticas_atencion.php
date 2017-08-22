<?php

    session_start();
	
    if($_SESSION['usuario']!= "rober")
		{
          header('location: index.php');
        }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- BEGIN HEAD -->
<head>

<style>
.cuadro1{
height: 15px;
width: 15px;
position: relative;
margin-left: 79px;
margin-top: 7px;
 background-color: rgb(138, 238, 238);
}

.cuadro2{
height: 15px;
width: 15px;
position: relative;
margin-left: 79px;
margin-top: 7px;
 background-color: rgb(223, 221, 230);
}

.titulo1{
position: relative;
margin-left: -61px;
}
</style>

<meta charset="utf-8"/>
<title> AE | Administrador de Estadisticas</title>
<script src="Chart.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/print.css" rel="stylesheet" type="text/css" media="print"/>
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
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->

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
                <li class="start active">
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
                        </li>
                        <li class="start active">
                            <a href="estadisticas_atencion.php">
                                <i class="fa fa-bar-chart-o"></i>
                                Estadisticas
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-money"></i>
								<span class="title">
							    Ventas y Compras
						        </span>
                                <span class="arrow">
								</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-user"></span>
                                Clientes
                                        <span class="arrow">
								</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="juridicos.php">
                                        <i class="fa fa-building-o"></i>
                                        Juridicos
                                    </a>
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
                                        Añadir
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
					Atencion al Cliente <small>Panel de Estadisticas</small>
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
								Atencion al Cliente
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="estadisticas_eventos.php">
								Estadistica de Atencion al Clientes
							</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
<?php
include('conex2.php'); 

$result = mysqli_query($link,"
select count(a.id) as Cantidad
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones 
left join eventos e on e.id = r.id_eventos 
where year(e.fecha_1)=2015 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and r.del_id is null and a.asistencia=1 and r.status>=2 
and e.id not in (528, 949, 2051)");

while ($row=mysqli_fetch_array($result))
{
echo $row["Cantidad"];
}
mysqli_free_result($result);
?>
							</div>
							<div class="desc">
								 Asistentes 2015
							</div>
						</div>
						<a class="more" href="#">
							 META: <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
<?php
include('conex2.php'); 

$result = mysqli_query($link,"
select count(a.id) as Cantidad
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones 
left join eventos e on e.id = r.id_eventos 
where year(e.fecha_1)=2014 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and r.del_id is null and a.asistencia=1 and r.status>=2 
and e.id not in (528, 949, 2051)");

while ($row=mysqli_fetch_array($result))
{
echo $row["Cantidad"];
}
mysqli_free_result($result);
?>
							</div>
							<div class="desc">
								 Asistentes 2014
							</div>
						</div>
						<a class="more" href="#">
							 META: <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
<?php
include('conex2.php'); 

$result = mysqli_query($link,"
select count(r.id) as Cantidad
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones 
left join eventos e on e.id = r.id_eventos 
where e.id=2051");

while ($row=mysqli_fetch_array($result))
{
echo $row["Cantidad"];
}
mysqli_free_result($result);
?>
							</div>
							<div class="desc">
								 Reservas Nivel 1 (CUMBRE DEL EXITO)
							</div>
						</div>
						<a class="more" href="#">
							 META:  2700 <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
<?php
include('conex2.php'); 

$result = mysqli_query($link,"
select count(r.id) as Cantidad
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones 
left join eventos e on e.id = r.id_eventos 
where e.id=2051 and r.status>=2");

while ($row=mysqli_fetch_array($result))
{
echo $row["Cantidad"];
}
mysqli_free_result($result);
?>
							</div>
							<div class="desc">
								 Reservas Nivel 2 y 3 (CUMBRE DEL EXITO)
							</div>
						</div>
						<a class="more" href="#">
							 META:  2700 <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			
	<!-- Comienzo Graficas-->
	<div class="row">
		<!-- Primer Grafico-->
		<div class="col-md-6 col-sm-6">
			<div class="portlet solid bordered light-grey">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>EVENTOS (2013 VS 2014)
								
								<div class="cuadro1"> <div class="titulo1"> 2013 </div> </div>
								<div class="cuadro2"> <div class="titulo1"> 2014 </div> </div>
								
							</div>
							<div class="tools">
								<a href="javascript:" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div style="width: 100%">
								<canvas id="canvas1" height="450" width="600"></canvas>
							</div>
								
						</div>
					</div>
			</div>
		</div>
		<!-- END Primer Grafico-->		
		<!-- Segundo Grafico-->
		<div class="col-md-6 col-sm-6">
					
				<div class="portlet solid bordered light-grey">
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Asistente (2013 VS 2014)
								
								<div class="cuadro1"> <div class="titulo1"> 2013 </div> </div>
								<div class="cuadro2"> <div class="titulo1"> 2014 </div> </div>
								
							</div>
							<div class="tools">
								<a href="javascript:" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div style="width: 100%">
								<canvas id="canvas3" height="450" width="600"></canvas>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- END Segundo Grafico-->
	</div>
	<!-- END Graficas-->
	
	<!-- Comienzo Informacion Extra-->
	<div class="row">
			<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet">
							<div class="portlet yellow box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>Cumbre Del Exito
														</div>
														<div class="tools">
															<a href="javascript:" class="collapse">
															</a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="row static-info">
															<div class="col-md-5 name">
																 Preventa Actual
															</div>
															<div class="col-md-7 value">
																 Preventa II
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Costo de Preventa Actual
															</div>
															<div class="col-md-7 value">
																 19.500 Bs
															</div>
														</div>
														<div class="row static-info">
															<div class="col-md-5 name">
																 Dias para el Evento
															</div>
															<div class="col-md-7 value">
																 155
															</div>
														</div>
													</div>
							</div>
					</div>
			</div>
	</div>
	<!-- END Informacion Extra-->
	
	<!--Comienzo Top Profesores -->
	<div class="row">
			<!--Comienzo Datos Top Profesores -->
											<div class="col-md-12 col-sm-12">
												<div class="portlet green box">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-cogs"></i>TOP Profesores (Ganancias y Asistentes)
														</div>
                                                        <div class="tools">
                                                            <a href="javascript:" class="collapse">
                                                            </a>
                                                        </div>
													</div>
													<div class="portlet-body">
														<div class="table-responsive">
															<table class="table table-hover table-bordered table-striped">
															<thead>
															<tr>
																<th>
																	 Nombre
																</th>
																<th>
																	 Evento
																</th>
																<th>
																	 Salario
																</th>
																<th>
																	 Cantidad de Eventos (N)
																</th>
																<th>
																	 Cantidad de Eventos (I)
																</th>
																<th>
																	 Almuerzo
																</th>
																<th>
																	 Traslado
																</th>
																<th>
																	 Gastos Extra
																</th>
																<th>
																	 Ganancia Total
																</th>
															</tr>
															</thead>
															<tbody>
															<tr>
																<td>
																		 Carlos Gamero
																</td>
																<td>
																		 Estructura de Costos
																	</td>
																	<td>
																		 6.000 Bs
																	</td>
																	<td>
																		 23
																	</td>
																	<td>
																		 8
																	</td>
																	<td>
																		 120 Bs
																	</td>
																	<td>
																		 420 Bs
																	</td>
																	<td>
																		 0
																	</td>
																	<td>
																	<span class="label label-sm label-success">
																		 356.000 Bs
																	</td>
																</tr>
																<tr>
																	<td>
																			 Franklin Rangel
																	</td>
																	<td>
																			 Sueldos y Salarios
																		</td>
																		<td>
																			 5600 Bs
																		</td>
																		<td>
																			26
																		</td>
																		<td>
																			 3
																		</td>
																		<td>
																			 120 Bs
																		</td>
																		<td>
																			 0
																		</td>
																		<td>
																			 0
																		</td>
																		<td>
																		<span class="label label-sm label-success">
																			 302.000 Bs
																		</td>
																	</tr>
																	<tr>
																		<td>
																				 Carlos Acosta
																		</td>
																		<td>
																				 Extra Muro
																			</td>
																			<td>
																				 7260 Bs
																			</td>
																			<td>
																				 8
																			</td>
																			<td>
																				 5
																			</td>
																			<td>
																				260
																			</td>
																			<td>
																				 0
																			</td>
																			<td>
																				 2.600 Bs
																			</td>
																			<td>
																			<span class="label label-sm label-success">
																				 211.000 Bs
																			</td>
																		</tr>
																			</tbody>
																			</table>
														</div>
													</div>
												</div>
			</div>
    </div>

</div>
</div>
</div>
	<!--End Top Profesores -->
<!-- END CONTENT -->

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

<!-- BEGIN JAVASCRIPTS-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js" type="text/javascript"></script>
<script src="assets/scripts/custom/index.js" type="text/javascript"></script>
<script src="assets/scripts/custom/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN DATA GRAFICO SCRIPTS -->
<script src="SCRIP-GRAF.js" type="text/javascript"></script>
<!-- BEGIN DATA GRAFICO SCRIPTS -->

<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initDashboardDaterange();
   Index.initIntro();
   Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>