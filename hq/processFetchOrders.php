<?php 
session_start();
require_once("dbConnect2.php");
require_once("../SharedFiles/connect.php");
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$systemRowCounter = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Item");
$rows = 0;
$counter = 0;
$checkBoxArray = array();
$expireTime = time() + 60*60*24*7;
$pageCounter = 0;
$tracker = 0;
$tracker2 = 0;

while($res = mysqli_fetch_array($systemRowCounter)){
	$tracker2++;
}

for ($i=0; $i <= $tracker2; $i++) { 
	$confirmOrderIndex = "ConfirmOrderBtn".$i;
	$orderCookieName = "orderCookie".$i;
	$orderNoPost = "staticOrder".$i;
	if(isset($_POST[$confirmOrderIndex])){
		setcookie($orderCookieName,$_POST[$orderNoPost],$expireTime);
		$tracker++;
		header("location:../hq/hqOrderpage.php");
	} else {
		setcookie($orderCookieName,"",(time()-1));
	}
}
 ?>
