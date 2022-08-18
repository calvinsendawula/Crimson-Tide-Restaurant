<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include '../SharedFiles/metatags.php';
    ?>
  <link rel="stylesheet" href="../hqStyles/hqMain.css">
  <title>Employee Index Page</title>
</head>

<body>
  <?php
  include "../SharedFiles/navBar.php";
  ?>
  <main>
  	<?php 
  		include '../hq/fetchOrders.php';
  	 ?>
  </main>

  <?php 
    include '../SharedFiles/footerSection.php';
   ?>
</body>

</html>
