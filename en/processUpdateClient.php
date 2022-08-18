<?php 

require_once("../SharedFiles/connect.php");

$sql_updateClient = 
	"UPDATE Crimson_Client set
		`clientUsername` = '" . $_POST['username']"',
		`clientFName` = '" . $_POST['fName']"',
		`clientLName` = '" . $_POST['lName']"',
		`clientPhone` = '" . $_POST['phoneNo']"',
		`clientEmail` = '" . $_POST['emailAddress']"',
		`clientPassword` = '" . $_POST['clientPassword']"',
		`clientLocation` = '" . $_POST['clientLocation']"'
		WHERE
		`clientUsername` = '" . $_POST['username']"'";

if($conn->query($sql_updateClient) === TRUE){
	echo("<br> Client data record updated Successfully");
} else {
	echo("<br> Error updating Client data: ".$conn->error);
}

 ?>