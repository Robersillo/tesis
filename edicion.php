                    <?php
			  
include('conex.php'); 

$result = mysqli_query($link,"select * from eventos where id = 1");

?>


                    <?php
while ($row=mysqli_fetch_array($result))
{
echo $row["cantidad"];
}
mysqli_free_result($result);


?>