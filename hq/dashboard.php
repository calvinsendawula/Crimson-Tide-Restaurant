<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
  <link rel="stylesheet" href="../styles/main.css">
  <title>Successful Login</title>
</head>
<body>
    <div class="container">
      <br>
      <h1>This is the welcome page for Admins.</h1><br><h1 id="blue-text"><big>
    <?php echo("Welcome ".$_SESSION['User']); ?></big></h1><br>
    <div class="text-center">
      <a class="btn btn-outline-dark text-center" href="../hq/dashboard2.php" role="button" id="place-order-btn">
      <big>Continue</big>
    </a>
    </div>
    </div>
</body>
</html>