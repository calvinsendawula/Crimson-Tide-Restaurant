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
		return true;
	} else {
		echo("Error".mysqli_error($link));
		return false;
	}
}

function getData($sql){
	$link=connect();
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$rows[]=$row;
	}
	return $rows;
}

 ?>
