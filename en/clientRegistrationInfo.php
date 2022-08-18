<?php 
require_once("../SharedFiles/connect.php");

if(!empty($_POST['username']) && !empty($_POST['clientPassword'])){
	$username = $_POST["username"];
	$first_name = $_POST["fName"];
	$last_name = $_POST["lName"];
	$phoneNo = $_POST["phoneNo"];
	$emailAddress = $_POST["emailAddress"];
	$clientPassword = $_POST["clientPassword"];
	$clientLocation = $_POST["clientLocation"];

	//Inserting data
	$sql_insert = "INSERT INTO Crimson_Client(clientUsername,clientFName,clientLName,clientPhone,clientEmail,clientPassword,clientLocation) 
		VALUES('$username','$first_name','$last_name','$phoneNo','$emailAddress','$clientPassword',
		'$clientLocation')";
		//use sha1 or md5 to hash passwords
	if ($conn->query($sql_insert)===TRUE) {
		echo("<br>User Data Added To Database.");
		header("location:../SharedFiles/Login.php");
	} else {
		echo("Error in inserting user data.".$conn->error);
	}
} else{
	echo("<br>There are unfilled fields. Check that all fields have been filled in.");
}

 ?>