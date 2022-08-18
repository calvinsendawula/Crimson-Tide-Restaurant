<?php 
session_start();
require_once("connect.php");

if (isset($_POST["Login"])) {
	if (empty($_POST["username"]) || empty($_POST["password"])) {
		header("location:Login.php");
		exit();
	} else {
		$UName=$_POST['username'];
		$Pass=$_POST['password'];
		$sql="SELECT * FROM Crimson_Client where clientUsername = '".$UName."' and clientPassword = '".$Pass."'";
		$result= $conn->query($sql);

		if ($result->fetch_assoc()) {
			$_SESSION['User']=$_POST['username'];
			header("location:../en/dashboard.php");
		} else {
			$sql="SELECT * FROM Crimson_Employee where CrimsonEmployeeUsername = '".$UName."' and CrimsonEmployeePassword = '".$Pass."'";
			$result= $conn->query($sql);
			if ($result->fetch_assoc()) {
				$_SESSION['User']=$_POST['username'];
				header("location:../hq/dashboard.php");
			} else {
				header("location:Login.php");
			}
		}
	}
}

 ?>