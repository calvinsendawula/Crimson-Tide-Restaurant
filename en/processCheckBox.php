<?php 
require_once("dbConnect2.php");
require_once("../SharedFiles/connect.php");
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Item");
$rows = 0;
$counter = 0;
$checkBoxArray = array();
$expireTime = time() + 60*60*24*7;
$itemIdHolder = 0;

while($res = mysqli_fetch_array($result)) {
	$rows++;
    $checkBoxName = "flexCheckDefault".$rows;
    $itemID = $res['CrimsonMenuItemID'];
    $checkBoxArray[$counter] = array($checkBoxName=>$itemID);
    $counter++;
}
$counter = 0;
echo("Total number of rows in the database: ".$_POST['rowCount']."<br>");
for ($i=0; $i <= ($_POST['rowCount']); $i++) { 
	$flexCheckIndex = "flexCheckDefault".$i;
	if(isset($_POST['flexCheckDefault'.$i])){
		echo("<br>Checkbox ".$flexCheckIndex." was checked in the form.<br>Item ");
		print_r($checkBoxArray[$i-1][$flexCheckIndex]);
		echo(' was selected from the database<br>');

		//This is the code for orders.
		$itemCookieName = "itemCookie".$i;
		$itemIdHolder = $checkBoxArray[$i-1][$flexCheckIndex];
		echo("Item Cookie's Name: ".$itemCookieName."<br>");
		echo("This cookie contains the item ID: ".$itemIdHolder."<br>");
		setcookie($itemCookieName,$itemIdHolder,$expireTime);

		$counter++;
	} else{
		$itemCookieName = "itemCookie".$i;
		setcookie($itemCookieName,"",(time()-1));
	}
}
echo ("<br>".$counter." checkboxes selected in total.");

$myCounter = 0;
$cookieRetrieved = "";
for ($i=0; $i <= ($_POST['rowCount']); $i++) { 
	$cookieName = "itemCookie".$i;
	if (isset($_COOKIE[$cookieName])) {
		$myCounter++;
		$cookieRetrieved = $_COOKIE[$cookieName];
		echo ("<br>Checkbox ".$i." selected.<br>Cookie ".$i.": ");
		echo($cookieRetrieved."<br>");
	}
}

echo "<br><br>The SYSTEM_COUNTER value is currently: ".$_COOKIE['SYSTEM_COUNTER'];
		$newSystemCounterValue = $rows;
		setcookie("SYSTEM_COUNTER",$newSystemCounterValue,$expireTime);

print_r($_COOKIE);

echo("<br><br>There are currently ".count($_COOKIE)." cookies");
header("location:../en/makeOrder.php");
 ?>
