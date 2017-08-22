<?php

    session_start();
	
    if($_SESSION['usuario']!= "rober")
		{      
          header('location: index.php');
          }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title> AE | Administrador de Estadisticas </title>
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
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
    <!-- END PAGE LEVEL SCRIPTS -->
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
                                Estadisticas y Metas
                            </a>
                        </li>
                        <li class="start active">
                            <a>
                                <span class="glyphicon glyphicon-user"></span>
                                Profesores
                                                <span class="arrow">
								                </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="informacion_profesores.php">
                                        <span class="fa fa-list-ol"></span>
                                        Lista
                                    </a>
                                </li>
                                <li class="start active">
                                    <a href="anadir_profesores.php">
                                        <span class="fa fa-plus"></span>
                                        Añadir
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="informacion_eventos.php">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                Eventos
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
                        Programacion de Eventos <small>panel de informacion de profesores</small>
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
                            <a>
                                Profesores
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="informacion_profesores.php">
                                Añadir
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
				<div class="col-md-12">
						<div class="portlet box yellow">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Añadir Profesores
										</div>
										<div class="tools">
											<a href="javascript:" class="collapse">
											</a>
										</div>
									</div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="profesores_anadidos.php" method="post" id="form_sample_1" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="alert alert-success display-hide">
                                            <button class="close" data-close="alert"></button>
                                            Your form validation is successful!
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nombre Completo
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nombre" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Cedula
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="cedula" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Numero de Contacto
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input name="numero" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input name="email" type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Honorarios por Hora
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="honorarios" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Ciudad
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="ciudad" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Pais
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="category1" class="select2me">
                                                    <option value="">Select...</option>
                                                    <option value="1"> Venezuela </option>
                                                    <option value="2"> Panama </option>
                                                    <option value="3"> Rep. Dominicana </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tipo de Eventos
										<span class="required">
											 *
										</span>
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="category2" class="select2me">
                                                    <option value="">Select...</option>
                                                    <option value="Gerencia">Gerencia</option>
                                                    <option value="Finanzas">Finanzas</option>
                                                    <option value="Negocios">Negocios</option>
                                                    <option value="Importacion">Importacion</option>
                                                    <option value="Leyes">Leyes</option>
                                                    <option value="Logistica">Logistica</option>
                                                    <option value="RRHH">RRHH</option>
                                                    <option value="Tecnologia">Tecnologia</option>
                                                    <option value="Calidad y Productividad">Calidad y Productividad</option>
                                                    <option value="Superación y Motivación">Superación y Motivación</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Enviar</button>
                                            <button type="button" class="btn default">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
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
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-markdown/lib/markdown.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/form-validation.js"></script>
<!-- END PAGE LEVEL STYLES -->
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormValidation.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>