<!DOCTYPE html>
<html>
<head>
	<?php 
		include '../SharedFiles/metatags.php';
	 ?>
 	<link rel="stylesheet" href="../styles/main.css">
	<title>My Data</title>
</head>
<body>
	<?php 
		include '../SharedFiles/navBar.php';
	 ?>
	<div class="container">
		<table class="table table-bordered table-dark table-hover">
	<caption>User data for <?php echo $_SESSION['User']; ?></caption>
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Client Username</th>
		  <th scope="col">Client First Name</th>
		  <th scope="col">Client Last Name</th>
		  <th scope="col">Client Phone Number</th>
		  <th scope="col">Client Email</th>
		  <th scope="col">Client Password</th>
		  <th scope="col">Client Location</th>
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
$result = mysqli_query($cser, "SELECT * FROM Crimson_Client WHERE `clientUsername` = '".$_SESSION['User']."'");
while($res = mysqli_fetch_array($result)) {
	$counter++;
?>
    <tr>
    	<th scope="row"><?php echo $counter ?></th>
        <td><?php echo $res['clientUsername']?></td>
        <td><?php echo $res['clientFName']?></td>
        <td><?php echo $res['clientLName']?></td>
        <td><?php echo $res['clientPhone']?></td>
        <td><?php echo $res['clientEmail']?></td>
        <td><?php echo $res['clientPassword']?></td>
        <td><?php echo $res['clientLocation']?></td>
    </tr>
<?php

}
?>
	  </tbody>
	</table>
	</div>
	<?php 
    include '../SharedFiles/footerSection.php';
   ?>
	</body>
</html>