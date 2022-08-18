<!DOCTYPE html>
<html>
<head>
	<?php 
		include '../SharedFiles/metatags.php';
	 ?>
	<link rel="stylesheet" href="../styles/main.css">
	<title>View All Staff</title>
</head>
<body>
	<?php 
		include '../SharedFiles/navBar.php';
	 ?>
	<table class="table table-bordered table-dark table-hover">
	<caption>List of all Crimson Tide Staff</caption>
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Staff ID</th>
	      <th scope="col">Staff Username</th>
		  <th scope="col">Staff First Name</th>
		  <th scope="col">Staff Last Name</th>
		  <th scope="col">Staff Phone Number</th>
		  <th scope="col">Staff Email</th>
		  <th scope="col">Staff Password</th>
		  <th scope="col">Staff Physical Address</th>
		  <th scope="col">Staff Postal Address</th>
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
$result = mysqli_query($cser, "SELECT * FROM Crimson_Employee");
while($res = mysqli_fetch_array($result)) {
	$counter++;
?>
    <tr>
    	<th scope="row"><?php echo $counter ?></th>
        <td><?php echo $res['CrimsonEmployeeID']?></td>
        <td><?php echo $res['CrimsonEmployeeUsername']?></td>
        <td><?php echo $res['CrimsonEmployeeFName']?></td>
        <td><?php echo $res['CrimsonEmployeeLName']?></td>
        <td><?php echo $res['CrimsonEmployeePhoneNo']?></td>
        <td><?php echo $res['CrimsonEmployeeEmail']?></td>
        <td><?php echo $res['CrimsonEmployeePassword']?></td>
        <td><?php echo $res['CrimsonEmployeePhysicalAddress']?></td>
        <td><?php echo $res['CrimsonEmployeePostalAddress']?></td>
    </tr>
<?php

}
?>
	  </tbody>
	</table>
	</body>
</html>