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

    <style type="text/css">
        ${demo.css}
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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <!-- COMIENZA Data de Promedio -->
    <script type="text/javascript">
        $(function () {

            var a =
                Highcharts.chart('container0', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Promedio Anual por mes'
                },
                xAxis: {
                    categories: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Augusto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Asistentes'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Año 2017',
                    data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019, 3569)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=1 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019, 3569) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=2 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=2 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                    <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=3 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=3 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=4 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=4 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=5 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=5 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=6 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=6 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=7 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=7 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=8 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=8 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=9 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=9 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=10 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=10 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=11 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=11 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=12 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=12 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>]

                },
                    {
                        name: 'Año 2016',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

                      $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=1 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
            <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=2 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=2 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
            <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=3 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=3 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
            <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=4 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=4 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=5 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=5 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=6 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=6 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=7 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=7 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=8 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=8 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=9 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=9 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=10 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=10 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=11 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=11 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=12 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=12 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>]

                    },

                    {
                        name: 'Año 2015',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=1 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=2 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=2 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=3 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=3 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=4 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=4 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=5 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=5 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=6 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=6 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=7 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=7 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=8 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=8 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=9 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=9 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=10 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=10 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=11 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=11 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>,
                        <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=12 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> / <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=12 and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>]

                    }

                ]
            });
        });
    </script>
    <!-- TERMINA Data de Promedio -->

    <!-- COMIENZA Data de Asistentes -->
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container1', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Asistencia Anual por mes'
                },
                xAxis: {
                    categories: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Augusto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Asistentes'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Año 2017',
                    data: [             <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?> , <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=2 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=3 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=4 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=5 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=6 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=7 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=8 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=9 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=10 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=11 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and MONTH(e.fecha_1)=12 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>]

                },
                    {
                        name: 'Año 2016',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=2 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=3 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=4 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=5 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=6 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=7 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=8 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=9 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=10 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=11 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and MONTH(e.fecha_1)=12 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>]

                    },

                    {
                        name: 'Año 2015',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=2 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=3 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=4 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=5 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=6 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=7 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=8 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=9 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=10 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=11 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and MONTH(e.fecha_1)=12 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>]

                    }

                ]
            });
        });
    </script>
    <!-- TERMINA Data de Asistentes -->


    <!-- COMIENZA Data de Eventos realizados -->
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Eventos Anuales Realizados'
                },
                xAxis: {
                    categories: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Augusto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Asistentes'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Año 2017',
                    data: [             <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=1 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?> , <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=2 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=3 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=4 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=5 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=6 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=7 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=8 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=9 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=10 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=11 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=12 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>]

                },
                    {
                        name: 'Año 2016',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=1 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=2 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=3 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=4 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=5 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=6 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=7 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=8 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=9 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=10 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=11 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=12 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>]

                    },

                    {
                        name: 'Año 2015',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=1 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=2 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=3 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=4 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=5 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=6 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=7 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=8 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=9 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=10 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=11 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=12 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            while ($row=mysqli_fetch_array($result))
            {
                echo $row["Cantidad"];
            }
            mysqli_free_result($result);
            ?>]

                    }
                ]
            });
        });
    </script>
    <!-- TERMINA Data de Eventos realizados-->


    <!-- COMIENZA Data de Eventos cancelados -->
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container3', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Eventos Anuales Cancelados'
                },
                xAxis: {
                    categories: [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Augusto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Asistentes'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Año 2017',
                    data: [             <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=1 and e.visible = '0' and e.modalidad='presencial'  and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

             $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?> , <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=2 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=3 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=4 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=5 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=6 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=7 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=8 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=9 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=10 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=11 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and MONTH(e.fecha_1)=12 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>]

                },
                    {
                        name: 'Año 2016',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=1 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=2 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=3 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=4 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=5 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=6 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=7 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");


                           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }

            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=8 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=9 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=10 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=11 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and MONTH(e.fecha_1)=12 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>]

                    },

                    {
                        name: 'Año 2015',
                        data: [ <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=1 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=2 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=3 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=4 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=5 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=6 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=7 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=8 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=9 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=10 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

            $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=11 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>, <?php
                    include('conex2.php');

            $result = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and MONTH(e.fecha_1)=12 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)");

           $row=mysqli_fetch_array($result);
               if (!empty($row["Cantidad"])){


               echo $row["Cantidad"];
               }
               else{
               $row["Cantidad"]=0;
               echo $row["Cantidad"];
               }
            ?>]

                    }
                ]
            });
        });
    </script>
    <!-- TERMINA Data de Eventos cancelados-->

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
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
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
                        <li class="start active">
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
						                        <li>
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
					Programacion de Eventos <small>Panel de estadisticas y metas</small>
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
							<a href="estadisticas_eventos.php">
								Estadisticas y Metas
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
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
<?php
include('conex2.php'); 

$result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones 
left join eventos e on e.id = r.id_eventos 
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

while ($row=mysqli_fetch_array($result))
{
echo $row["Cantidad"];
}
mysqli_free_result($result);
?>
                                +

                                <?php
                                include('conex2.php');

                                $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and e.pais='ve' and e.modalidad='online' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>


                            =

                            <?php
                            include('conex2.php');

                            $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and e.pais='ve' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                            while ($row=mysqli_fetch_array($result))
                            {
                                echo $row["Cantidad"];
                            }
                            mysqli_free_result($result);
                            ?>

                            </div>

							<div class="desc">
								 Asistentes

                                <?php
                                $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP) as fecha");
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo $row['fecha'];
                                }
                                ?>

                            </div>
						</div>
						<a class="more" href="#">
                        <b>Formula:</b> Presencial + Online = Total asistentes <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
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
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>
                                +

                                <?php
                                include('conex2.php');

                                $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and e.pais='ve' and e.modalidad='online' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>


                                =

                                <?php
                                include('conex2.php');

                                $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and e.pais='ve' and r.del_id is null and a.asistencia=1 and r.status>=2
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>
							</div>
							<div class="desc">
								 Asistentes

                                <?php
                                $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-1 as fecha");
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo $row['fecha'];
                                }
                                ?>

							</div>
						</div>
						<a class="more" href="#">
                            <b>Formula:</b> Presencial + Online = Total asistentes <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat yellow">
                        <div class="visual">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php
                                include('conex2.php');

                                $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and r.del_id is null and a.asistencia=1
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>
                                +

                                <?php
                                include('conex2.php');

                                $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and e.pais='ve' and e.modalidad='online' and r.del_id is null and a.asistencia=1
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>


                                =

                                <?php
                                include('conex2.php');

                                $result = mysqli_query($link,"
select count(a.id) as Cantidad, CURRENT_TIMESTAMP as Fecha
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and e.pais='ve' and r.del_id is null and a.asistencia=1
and e.id not in (528, 949, 2051, 2052, 3007, 3019)");

                                while ($row=mysqli_fetch_array($result))
                                {
                                    echo $row["Cantidad"];
                                }
                                mysqli_free_result($result);
                                ?>
                            </div>
                            <div class="desc">
                                Asistentes

                                <?php
                                $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-2 as fecha");
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo $row['fecha'];
                                }
                                ?>

                            </div>
                        </div>
                        <a class="more" href="#">
                            <b>Formula:</b> Presencial + Online = Total asistentes <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>

				</div>
			<!-- END DASHBOARD STATS -->
			
	<!-- Comienzo Graficas-->

        <div class="row">
            <!-- Grafico 0-->

            <div class="portlet solid bordered light-grey">
                <div class="portlet box purple">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-bar-chart-o"></i>PROMEDIO
                        </div>
                        <div class="tools">
                            <a href="javascript:" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>

                        <div id="container0" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>

            <!-- END Grafico 0-->
        </div>

        <div class="row">
            <!-- Primer Grafico-->

                <div class="portlet solid bordered light-grey">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bar-chart-o"></i>EVENTOS
                            </div>
                            <div class="tools">
                                <a href="javascript:" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>

                            <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>

            <!-- END Primer Grafico-->
        </div>

	<div class="row">
		<!-- segundo Grafico-->
		<div class="col-md-6 col-sm-6">
			<div class="portlet solid bordered light-grey">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Eventos Realizados
							</div>
							<div class="tools">
								<a href="javascript:" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>

                            <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
					</div>
			</div>
		</div>
		<!-- END segundo Grafico-->

        <!-- tercero Grafico-->
		<div class="col-md-6 col-sm-6">

				<div class="portlet solid bordered light-grey">
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart-o"></i>Eventos Cancelados
							</div>
							<div class="tools">
								<a href="javascript:" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>

                            <div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
					</div>
				</div>
		</div>
		<!-- END tercero Grafico-->
	</div>
	<!-- END Graficas-->
	
	<!-- Comienzo Informacion Extra-->
	<div class="row">
			<div class="col-md-6 col-sm-6">
					<!-- BEGIN PORTLET-->
					<div class="portlet">
							<div class="portlet blue box">
													<div class="portlet-title">
														<div class="caption">
															<i class="glyphicon glyphicon-list-alt""></i>Asistentes Presenciales VALENCIA
														</div>
														<div class="tools">
															<a href="javascript:" class="expand">
															</a>
														</div>
													</div>
                                <div class="portlet-body" style="display: none;">
                                    <div class="portlet blue box">
                                <?php
                                include('conex2.php');
                                $result1 = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad1
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                                $result2 = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad2
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                                $result3 = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad3
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)
");
                                $ano1=array();
                                $ano2=array();
                                $ano3=array();
                                $meses=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                while ($row=mysqli_fetch_array($result1))
                                {
                                    $ano1[$row["Mes"]-1] = $row["Cantidad1"];
#array_push($ano1, $row["Cantidad1"]);
                                }
                                while ($row=mysqli_fetch_array($result2))
                                {
                                    $ano2[$row["Mes"]-1] = $row["Cantidad2"];
#array_push($ano2, $row["Cantidad2"]);
                                }
                                while ($row=mysqli_fetch_array($result3))
                                {
                                    $ano3[$row["Mes"]-1] = $row["Cantidad3"];
#array_push($ano3, $row["Cantidad3"]);

                                }
                                ?>

                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            Meses
                                        </th>
                                        <th>
                                            Cantidad  <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-2 as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            Cantidad  <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-1 as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            Cantidad  <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP) as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    for ($i = 0; $i < 12; $i++)
                                    {
                                        echo '<tr><td>'.$meses[$i].'</td>';
                                        echo '<td>'.(isset($ano1[$i]) ? $ano1[$i] :'').'</td>';
                                        echo '<td>'.(isset($ano2[$i]) ? $ano2[$i] :'').'</td>';
                                        echo '<td>'.(isset($ano3[$i]) ? $ano3[$i] :'').'</td></tr>';
                                    }
                                    #mysqli_free_result($result);


                                    ?>

                                    </tbody>
                                </table>
                                    </div>
                                </div>
							</div>
					</div>
			</div>


        <div class="col-md-6 col-sm-6">
            <!-- BEGIN PORTLET-->
            <div class="portlet">
                <div class="portlet blue box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="glyphicon glyphicon-list-alt""></i>Asistentes ONLINE
                        </div>
                        <div class="tools">
                            <a href="javascript:" class="expand">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body" style="display: none;">
                        <div class="portlet blue box">

                            <?php

                            include('conex2.php');

                            $result1 = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad1
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible=1 and e.pais='ve' and e.modalidad='online' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                            $result2 = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad2
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible=1 and e.pais='ve' and e.modalidad='online' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                            $result3 = mysqli_query($link,"
select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad3
from res_asistentes a
left join res_reservaciones r on r.id = a.id_reservaciones
left join eventos e on e.id = r.id_eventos
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible=1 and e.pais='ve' and e.modalidad='online' and l.zona='valencia' and r.del_id is null and a.asistencia=1 and r.status>=2 and e.tipo<>'Diplomado'
and e.id not in (528, 949, 2051, 2052, 3007, 3019)
group by year(e.fecha_1), MONTH(e.fecha_1)
");
                            $ano1=array();
                            $ano2=array();
                            $ano3=array();
                            $meses=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                            while ($row=mysqli_fetch_array($result1))
                            {
                                $ano1[$row["Mes"]-1] = $row["Cantidad1"];
#array_push($ano1, $row["Cantidad1"]);
                            }
                            while ($row=mysqli_fetch_array($result2))
                            {
                                $ano2[$row["Mes"]-1] = $row["Cantidad2"];
#array_push($ano2, $row["Cantidad2"]);
                            }
                            while ($row=mysqli_fetch_array($result3))
                            {
                                $ano3[$row["Mes"]-1] = $row["Cantidad3"];
#array_push($ano3, $row["Cantidad3"]);

                            }
                            ?>

                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                <thead>
                                <tr>
                                    <th>
                                        Meses
                                    </th>
                                    <th>
                                        Cantidad <?php
                                        $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-2 as fecha");
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            echo $row['fecha'];
                                        }
                                        ?>
                                    </th>
                                    <th>
                                        Cantidad <?php
                                        $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-1 as fecha");
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            echo $row['fecha'];
                                        }
                                        ?>
                                    </th>
                                    <th>
                                        Cantidad <?php
                                        $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP) as fecha");
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            echo $row['fecha'];
                                        }
                                        ?>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                for ($i = 0; $i < 12; $i++)
                                {
                                    echo '<tr><td>'.$meses[$i].'</td>';
                                    echo '<td>'.(isset($ano1[$i]) ? $ano1[$i] :'').'</td>';
                                    echo '<td>'.(isset($ano2[$i]) ? $ano2[$i] :'').'</td>';
                                    echo '<td>'.(isset($ano3[$i]) ? $ano3[$i] :'').'</td></tr>';
                                }
                                #mysqli_free_result($result);


                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</div>
	<!-- END Informacion Extra-->

        <!-- Comienzo Informacion Extra-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <!-- BEGIN PORTLET-->
                <div class="portlet">
                    <div class="portlet green box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="glyphicon glyphicon-list-alt""></i>Eventos Realizados VALENCIA
                            </div>
                            <div class="tools">
                                <a href="javascript:" class="expand">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" style="display: none;">
                            <div class="portlet green box">
                                <?php
                                include('conex2.php');
                                $result1 = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and l.zona='valencia' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                                $result2 = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible = '1' and e.modalidad='presencial'  and e.pais='ve' and l.zona='valencia' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                                $result3 = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible = '1' and e.modalidad='presencial' and e.pais='ve' and l.zona='valencia' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)
");
                                $ano1=array();
                                $ano2=array();
                                $ano3=array();
                                $meses=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                while ($row=mysqli_fetch_array($result1))
                                {
                                    $ano1[$row["Mes"]-1] = $row["Cantidad"];

                                }
                                while ($row=mysqli_fetch_array($result2))
                                {
                                    $ano2[$row["Mes"]-1] = $row["Cantidad"];

                                }
                                while ($row=mysqli_fetch_array($result3))
                                {
                                    $ano3[$row["Mes"]-1] = $row["Cantidad"];


                                }
                                ?>

                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            Meses
                                        </th>
                                        <th>
                                            Cantidad <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-2 as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            Cantidad <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-1 as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            Cantidad <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP) as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    for ($i = 0; $i < 12; $i++)
                                    {
                                        echo '<tr><td>'.$meses[$i].'</td>';
                                        echo '<td>'.(isset($ano1[$i]) ? $ano1[$i] :'').'</td>';
                                        echo '<td>'.(isset($ano2[$i]) ? $ano2[$i] :'').'</td>';
                                        echo '<td>'.(isset($ano3[$i]) ? $ano3[$i] :'').'</td></tr>';
                                    }
                                    #mysqli_free_result($result);


                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <!-- BEGIN PORTLET-->
                <div class="portlet">
                    <div class="portlet red box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="glyphicon glyphicon-list-alt""></i>Eventos Cancelados VALENCIA
                            </div>
                            <div class="tools">
                                <a href="javascript:" class="expand">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" style="display: none;">
                            <div class="portlet red box">
                                <?php
                                include('conex2.php');
                                $result1 = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-2 and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and l.zona='valencia' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                                $result2 = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP)-1 and e.visible = '0' and e.modalidad='presencial'  and e.pais='ve' and l.zona='valencia' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)
");

                                $result3 = mysqli_query($link,"
SELECT year(e.fecha_1) as ano,MONTH(e.fecha_1) as Mes, count(e.id) as Cantidad
FROM eventos e
left JOIN lugares l on l.id = e.lugar_id
where year(e.fecha_1)=YEAR(CURRENT_TIMESTAMP) and e.visible = '0' and e.modalidad='presencial' and e.pais='ve' and l.zona='valencia' and e.id not in (528, 949, 2051, 2052, 3007, 3019) and e.tipo<>'Diplomado'
group by year(e.fecha_1), MONTH(e.fecha_1)
");
                                $ano1=array();
                                $ano2=array();
                                $ano3=array();
                                $meses=array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                while ($row=mysqli_fetch_array($result1))
                                {
                                    $ano1[$row["Mes"]-1] = $row["Cantidad"];

                                }
                                while ($row=mysqli_fetch_array($result2))
                                {
                                    $ano2[$row["Mes"]-1] = $row["Cantidad"];

                                }
                                while ($row=mysqli_fetch_array($result3))
                                {
                                    $ano3[$row["Mes"]-1] = $row["Cantidad"];


                                }
                                ?>

                                <table class="table table-striped table-bordered table-hover" id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>
                                            Meses
                                        </th>
                                        <th>
                                            Cantidad <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-2 as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            Cantidad <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP)-1 as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                        <th>
                                            Cantidad <?php
                                            $result = mysqli_query($link,"SELECT YEAR(CURRENT_TIMESTAMP) as fecha");
                                            while($row=mysqli_fetch_array($result))
                                            {
                                                echo $row['fecha'];
                                            }
                                            ?>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    for ($i = 0; $i < 12; $i++)
                                    {
                                        echo '<tr><td>'.$meses[$i].'</td>';
                                        echo '<td>'.(isset($ano1[$i]) ? $ano1[$i] :'').'</td>';
                                        echo '<td>'.(isset($ano2[$i]) ? $ano2[$i] :'').'</td>';
                                        echo '<td>'.(isset($ano3[$i]) ? $ano3[$i] :'').'</td></tr>';
                                    }
                                    #mysqli_free_result($result);


                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END Informacion Extra-->

    </div>
</div>
</div>
	<!--End Lista Eventos Presenciales -->
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
<!-- END DATA GRAFICO SCRIPTS -->

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