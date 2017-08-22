<?php

    session_start();

    if($_SESSION['usuario']!= "rober")
		{
          header('location: index.php');
          }
?>

<!DOCTYPE html>

<!-- BEGIN HEAD -->
<head>
    <meta charset="ISO-8859-1" />
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
		<a class="navbar-brand" href="index.html">
			<img src="assets/img/logo.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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

                <!--
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

                -->

                <li class="start active">
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
                                Asistencia anual y mensual
                            </a>
                        </li>

                        <li>
                            <a href="informacion_eventos.php">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                Lista: Eventos Realizados
                            </a>
                        </li>
						                        <li class="start active">
                            <a href="eventos_proximos.php">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                Lista: Pr&oacute;ximos Eventos
                            </a>
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
					Programacion de Eventos <small>panel de Pr&oacute;ximos Eventos</small>
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
								Prog Eventos
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="informacion_eventos.php">
								Informacion
							</a>
                            <i class="fa fa-angle-right"></i>
						</li>
                        <li>
                            <a href="informacion_eventos.php">
                                Pr&oacute;ximos Eventos
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
						<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span>
								</span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<!-- END EXAMPLE TABLE PORTLET-->
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="col-md-12">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Pr&oacute;ximos Eventos
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
						
							<?php
			  
include('conex2.php');

$result = mysqli_query($link,"
select e.nombre as 'Evento', e.tipo as tipo_evento, e.id as id_evento, year (e.fecha_1) as 'Ano', MONTH (e.fecha_1) as Mes, DAY (e.fecha_1) as Dia, e.fecha_1 as fecha_completa, e.pais as 'Pais', count(r.id) as 'reservaciones', p.nombre as 'Facilitador', l.zona, e.modalidad, e.visible as 'visible'
from eventos e
left join res_reservaciones r on r.id_eventos = e.id
left join res_asistentes a on a.id_reservaciones = r.id
left join ponentes p on e.facilitador_id = p.id
left join lugares l on l.id = e.lugar_id
where e.fecha_1>=CURRENT_TIMESTAMP
group by e.id

");

?>

                            <table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Evento
								</th>
								<th>
									 Fecha
								</th>

                                <th>
                                    Visible
                                </th>
                                <th>
                                    Facilitador
                                </th>
								<th>
									 Pais
								</th>
                                <th>
                                    Lugar
                                </th>
                                <th>
                                    Modalidad
                                </th>
                                <th>
                                    Reservaciones
                                </th>
							</tr>
							</thead>
							<tbody>
							
							<?php
while ($row=mysqli_fetch_array($result))
{
echo '<tr><td>'.$row["tipo_evento"].': <a href="http://gerenciales.com/eventos/ver/'.$row["id_evento"].'" target="_blank"> '.$row["Evento"].' </td>';

   if($row["Mes"] == 1   ){
    echo '<td>'.$row["Ano"].' Enero '.$row["Dia"].'</td>';
    }
   else if($row["Mes"] == 2   ){
        echo '<td>'.$row["Ano"].' Febrero '.$row["Dia"].'</td>';
    }
   else if($row["Mes"] == 3   ){
       echo '<td>'.$row["Ano"].' Marzo '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 4   ){
       echo '<td>'.$row["Ano"].' Abril '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 5   ){
       echo '<td>'.$row["Ano"].' Mayo '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 6   ){
       echo '<td>'.$row["Ano"].' Junio '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 7   ){
       echo '<td>'.$row["Ano"].' Julio '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 8   ){
       echo '<td>'.$row["Ano"].' Agosto '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 9   ){
       echo '<td>'.$row["Ano"].' Septiembre '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 10   ){
       echo '<td>'.$row["Ano"].' Octubre '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 11   ){
       echo '<td>'.$row["Ano"].' Noviembre '.$row["Dia"].'</td>';
   }
   else if($row["Mes"] == 12  ){
       echo '<td>'.$row["Ano"].' Diciembre '.$row["Dia"].'</td>';
   }

    if($row["visible"] >= 1   ){
        echo '<td><span class="label label-sm label-success">VISIBLE</span> </td>';
    }
    else if ($row["visible"] < 1   ){
        echo '<td><span class="label label-sm label-danger">OCULTO</span> </td>';
    }

    echo '<td>'.$row["Facilitador"].'</td>';

    if($row["Pais"] == 've'   ){
        echo '<td>Venezuela <img src="http://gerenciales.com/img/icons/flags32/ve.png"></td>';
    }
    else if ($row["Pais"] == 'pa'  ){
        echo '<td>Panama <img src="http://gerenciales.com/img/icons/flags32/pa.png"></td>';
    }
    else if ($row["Pais"] == 'rd'   ){
        echo '<td>Rep. Dominicana <img src="http://gerenciales.com/img/icons/flags32/rd.png"></td>';
    }
    else if ($row["Pais"] == 'la'   ){
        echo '<td>Latino-America <img src="http://gerenciales.com/img/icons/flags32/la.png"></td>';
    }

echo '<td>'.$row["zona"].'</td>';
echo '<td>'.$row["modalidad"].'</td>';
echo '<td>'.$row["reservaciones"].'</td>';

}
mysqli_free_result($result);


?>
							
							</tbody>
							</table>
						</div>
					</div>
				</div>
					<!-- END EXAMPLE TABLE PORTLET-->
					
					
					
			</div>
			</div>
			<!-- END PAGE CONTENT-->
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
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
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