 <?php
			  
include('conex.php'); 

//$mes = $_POST['mes'];
//$mes = $_POST['mes2'];

$result = mysqli_query($link,"select year(e.fecha_1) as Ano, MONTH(e.fecha_1) as Mes,count(a.id) as Cantidad
from res_asistentes a left join res_reservaciones r on r.id = a.id_reservaciones 
left join eventos e on e.id = r.id_eventos 
where year(e.fecha_1)>=2013 and e.visible=1 and e.pais='ve' and e.modalidad='presencial' and r.del_id is null and a.asistencia=1 and r.status>=2 
and e.id not in (528, 949)
group by year(e.fecha_1), MONTH(e.fecha_1)
");

while ($row=mysqli_fetch_array($result))
{
$asistente2013[$row["fecha"]] = $row["asistencia_2013"] ;
$asistente2014[$row["fecha"]] = $row["asistencia_2014"] ;
}
mysqli_free_result($result);

echo json_encode( array('asistente2013' => $asistente2013, 'asistente2014' => $asistente2014) );
?>