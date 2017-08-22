<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"jhammal_sg");
if (mysqli_connect_errno())
{
    echo "Failed to connect to mysqli: " . mysqli_connect_error();
}