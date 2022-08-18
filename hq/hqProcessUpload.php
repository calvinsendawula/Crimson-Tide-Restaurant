<?php 
require_once("dbConnect2.php");

if(isset($_POST['submitImage'])){
	$file=$_FILES['foodImage'];
	print_r($file);
	$file_path="asset/";
	$original_file_name=$_FILES['foodImage']['name'];
	$file_tmp_location=$_FILES['foodImage']['tmp_name'];
	if(move_uploaded_file($file_tmp_location, $file_path.$original_file_name)){
		
		$sql="INSERT INTO Crimson_Menu_Item (CrimsonMenuItemName, CrimsonMenuItemStockAvailable, CrimsonMenuItemDiscount, CrimsonMenuItemImagePath, CrimsonMenuItemPrice, CrimsonMenuItemDescription, CrimsonMenuItemCategory) 
		VALUES('".$_POST["foodName"]."','".$_POST['foodStock']."','".$_POST['foodDiscount']."','$original_file_name','".$_POST['foodPrice']."','".$_POST['foodDesc']."','".$_POST['foodCat']."')";
		setData($sql);
		header('location:../hq/hqUploadImage.php');
	}
}

 ?>
 