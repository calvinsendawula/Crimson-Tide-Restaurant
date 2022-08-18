<?php 
function connect(){
	$dbserver = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "crimson_tide_restaurant";
	$link=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname) or die("Could not connect".mysqli_connect_error());
	return ($link);
}

function setData($sql){
	$link=connect();
	if (mysqli_query($link,$sql)) {
		echo("Success");
	} else {
		echo("Error".mysqli_error($link));
	}
}

function getData($sql){
	$link=connect();
	$results=mysqli_query($link,$sql);
	$rows=array();
	if (mysqli_num_rows($results) > 0) {
		while ($row=mysqli_fetch_assoc($results)) {
			$rows[]=$row;
		}
		return $rows;
	}
}

 ?>
