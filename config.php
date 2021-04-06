<?php

$con=new mysqli("localhost","root","root","transactions","3306");
if($con->connect_error)
{
	echo "Database Connection Failed";
}

?>
