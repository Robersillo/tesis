<?php
$link=mysqli_connect("localhost","root","") or die ('I cannot connect to the database because: ' . mysqli_error());
mysqli_select_db ("datos");
?>