<?php 
//Create a connection
$conn = new mysqli("localhost","root","","crimson_tide_restaurant");

//Check connection
if($conn->connect_error){
	die("Not connected".$conn->connect_error);
}else{
	echo("Connected Successfully.");
}

 ?>