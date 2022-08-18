<!DOCTYPE html>
<html>
<head>
	<?php 
		include '../SharedFiles/metatags.php';
	 ?>
	<link rel="stylesheet" href="../styles/main.css">
	<title>View All Menu Items</title>
</head>
<body>
	<?php 
		include '../SharedFiles/navBar.php';
	 ?>
	<table class="table table-bordered table-dark table-hover">
	<caption>List of all Crimson Tide Restaurant Menu Items</caption>
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Food ID</th>
		  <th scope="col">Food Name</th>
		  <th scope="col">Food Stock Available</th>
		  <th scope="col">Food Discount</th>
		  <th scope="col">Food Image Path</th>
		  <th scope="col">Food Price (Kshs)</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$counter = 0;
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Item");
while($res = mysqli_fetch_array($result)) {
	$counter++;
?>
    <tr>
    	<th scope="row"><?php echo $counter ?></th>
        <td><?php echo $res['CrimsonMenuItemID']?></td>
        <td><?php echo $res['CrimsonMenuItemName']?></td>
        <td><?php echo $res['CrimsonMenuItemStockAvailable']?></td>
        <td><?php echo $res['CrimsonMenuItemDiscount']?></td>
        <td><?php echo $res['CrimsonMenuItemImagePath']?></td>
        <td><?php echo $res['CrimsonMenuItemPrice']?></td>
    </tr>
<?php

}
?>
	  </tbody>
	</table>
	</body>
</html>