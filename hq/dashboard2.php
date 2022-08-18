<?php
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location:../SharedFiles/Login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Dashboard </title>
    <link rel="stylesheet" href="../styles/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
<?php 
  include('../SharedFiles/navBar.php');
 ?>
  <div class="text-center">
    <h2 style="color: #000080;">Select an action below to proceed.</h2><br>
    <a href="../hq/hqIndex.php" type="button" class="btn btn-outline-success"><big>Click here to tend to orders</big></a>
  </div><br>
  <div class="text-center">
    <a href="../hq/allFood.php" type="button" class="btn btn-outline-primary"><big>Click here to view all food in the database</big></a>
  </div><br>
  <div class="text-center">
    <a href="../hq/showStaff.php" type="button" class="btn btn-outline-dark"><big>Click here to view all staff in the database</big></a>
  </div><br>
  <div class="text-center">
    <a href="../hq/showClients.php" type="button" class="btn btn-outline-warning"><big>Click here to view all clients in the database</big></a>
  </div><br>
  <div class="text-center">
    <a href="../hq/hqUploadImage.php" type="button" class="btn btn-outline-info"><big>Click here to add food to the database</big></a>
  </div><br>
<?php 
  include('../SharedFiles/footerSection.php');
 ?>

</body>
</html>
