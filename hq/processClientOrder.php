<?php 
session_start();
require_once("dbConnect2.php");
require_once("../SharedFiles/connect.php");

if (isset($_POST["submitClientOrder"])) {
	if (empty($_POST["employeeID"]) || empty($_POST["employeePassword"])) {
		header("location:hqOrderpage.php");
		exit();
	} else {
		$empID=$_POST['employeeID'];
		$Pass=$_POST['employeePassword'];
		$sql="SELECT * FROM Crimson_Employee WHERE CrimsonEmployeeID = '".$empID."' and CrimsonEmployeePassword = '".$Pass."'";
		$result= $conn->query($sql);
		if ($result->fetch_assoc()) {
			$sql="UPDATE client_order SET CrimsonEmployeeID = '".$empID."', Status = 'Cleared' WHERE ClientOrderNo = '".$_POST['createBill']."'";
			setData($sql);
			$sql="INSERT INTO client_order_bill (ClientOrderNo, ClientOrderBillAmountDue) 
			VALUES('".$_POST['createBill']."','".$_POST['billAmount']."')";
			setData($sql);
			header("location:../hq/hqIndex.php");
		} else {
			header("location:hqOrderpage.php");
		}
	}
}
 ?>
