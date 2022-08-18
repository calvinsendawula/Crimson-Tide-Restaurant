<?php 
require_once("../SharedFiles/connect.php");

$username = $_POST["username"];
$first_name = $_POST["fName"];
$last_name = $_POST["lName"];
$phone_No = $_POST["phoneNo"];
$email_Address = $_POST["emailAddress"];
$staff_Password = $_POST["staffPassword"];
$staff_Physical = $_POST["physicalAddress"];
$staff_Postal = $_POST["postalAddress"];

//Inserting data
$sql_insert = "INSERT INTO Crimson_Employee(CrimsonEmployeeUsername,CrimsonEmployeeFName,CrimsonEmployeeLName,CrimsonEmployeePhoneNo,CrimsonEmployeeEmail,CrimsonEmployeePassword,CrimsonEmployeePhysicalAddress,CrimsonEmployeePostalAddress) 
	VALUES('$username','$first_name','$last_name','$phone_No','$email_Address','$staff_Password','$staff_Physical','$staff_Postal')";
	//use sha1 or md5 to hash passwords
if ($conn->query($sql_insert)===TRUE) {
	echo("<br>Employee Data Added To Database.");
	header('location:../SharedFiles/Login.php');
} else {
	echo("Error in inserting employee data.".$conn->error);
}

 ?>