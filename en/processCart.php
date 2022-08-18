<?php 
session_start();
require_once("dbConnect2.php");
require_once("../SharedFiles/connect.php");
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$rows = 0;
$counter = 0;
$checkBoxArray = array();
$expireTime = time() + 60*60*24*7;
$pageCounter = 0;
$tracker = 0;

for ($i=0; $i <= $_COOKIE['SYSTEM_COUNTER']; $i++) { 
	$deleteItemIndex = "deleteItem".$i;
	if(isset($_POST[$deleteItemIndex])){
		$itemCookieName = "itemCookie".$i;
		setcookie($itemCookieName,"",(time()-1));
		$tracker++;
		header("location:../en/makeOrder.php");
	}
}

if ($tracker === 0) {
	$checker = 0;
	for ($i=0; $i <= $_COOKIE['SYSTEM_COUNTER']; $i++) { 
		$userData = $_SESSION['User'];
		$qtyBoxIndex = "qtyBox".$i;
		if(isset($_POST[$qtyBoxIndex])){
			$checker++;
		}
	}

	$PaymentMethodChosen = "";
	echo("<br>");
	if (isset($_POST["PayCash"])) {
		echo("Selected Cash");
		$PaymentMethodChosen = "Cash";
	} else if (isset($_POST["PayMPesa"])){
		echo("Selected MPesa");
		$PaymentMethodChosen = "MPesa";
	} else if (isset($_POST["PayCard"])) {
		echo("Selected PayCard");
		$PaymentMethodChosen = "Credit/Debit Card";
	} else if (isset($_POST["PayPayPal"])){
		echo("Selected Pay with Paypal");
		$PaymentMethodChosen = "PayPal";
	} else {
		echo("No selection made.");
	}

	$userData = $_SESSION['User'];

	if ($checker>=1) { 
		$sql_insert = "INSERT INTO client_order(ClientUsername,PaymentMethod,Status) VALUES('$userData','$PaymentMethodChosen','Pending')";
		if ($conn->query($sql_insert)===TRUE) {
			echo("<br>User Order Added To Database.");
		} else {
			echo("Error in inserting user order.".$conn->error);
		}
	}

	$itemIDArray = array();
	$myCounter = 0;
	$cookieRetrieved = "";
	for ($i=0; $i <= $_COOKIE['SYSTEM_COUNTER']; $i++) { 
		$cookieName = "itemCookie".$i;
		if (isset($_COOKIE[$cookieName])) {
			$cookieRetrieved = $_COOKIE[$cookieName];
			$itemIDArray[$myCounter] = $cookieRetrieved;
			$myCounter++;
		}
	}
	$pageCounter = $myCounter;

	$myCounter = 0;
	$theOrderNo = mysqli_query($cser, "SELECT ClientOrderNo FROM client_order WHERE ClientUsername = 
		'$userData'");

	$orderNo = 0;
	while($res = mysqli_fetch_array($theOrderNo)) {
		$orderNo = $res['ClientOrderNo'];
	}

	for ($i=0; $i <= $pageCounter; $i++) { 
		$userData = $_SESSION['User'];
		$qtyBoxIndex = "qtyBox".($i+1);
		$theItemQty = $_POST[$qtyBoxIndex];
		if(isset($_POST[$qtyBoxIndex])){
			echo("<br>".$qtyBoxIndex." found. Value: ");
			print_r($theItemQty);

			$sql_insert = "INSERT INTO crimson_menu_items_ordered(ClientOrderNo,CrimsonMenuItemID,CrimsonMenuItemQty) VALUES('$orderNo','$itemIDArray[$myCounter]','$theItemQty')";
			if ($conn->query($sql_insert)===TRUE) {
				echo("<br>Menu items ordered inserted successfully.");
			} else {
				echo("Error inserting menu items ordered.".$conn->error);
			}
			
			$myCounter++;
		}
	}

	for ($i=0; $i <= $_COOKIE['SYSTEM_COUNTER']; $i++) { 
		$itemCookieName = "itemCookie".$i;
		setcookie($itemCookieName,"",(time()-1));
	}
}
header("location:../SharedFiles/Index.php");
 ?>
