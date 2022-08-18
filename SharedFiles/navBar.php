<?php
  
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location:../SharedFiles/Login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
</head>

<body>
	<header>
    <ul id="menu">
      <span id="navItems">
        <li><img src="../images/CrimsonLogo.png" alt="Crimson Logo"></li>
      </span>
      <div id="restaurantName">
        <h1>Crimson Tide Restaurant</h1>
      </div>
      <span id="navItems">
        <li><a href="../SharedFiles/Index.php"><button type="button" class="buttonReserve">Home</button></a></li>
        <li><a href="../en/restaurantMenu.php"><button type="button" class="buttonReserve">Menu</button></a></li>
        <li><a href="../en/Register.php"><button type="button" class="buttonReserve">Sign Up</button></a></li>
        <li><a href="../SharedFiles/Login.php"><button type="button" class="buttonReserve">Login</button></a></li>
        <li><a href="../en/makeOrder.php"><button type="button" class="buttonReserve">My Cart</button></a></li>
      </span>
      </ul>
      </header>
      <div class="container">
        <div>
  	<?php if (isset($_SESSION['success'])) : ?>
  		<div>
              <h3>
                  <?php
                  	echo $_SESSION['success']; 
                      unset($_SESSION['success']);
                  ?>
              </h3>
          </div>
      <?php endif ?>
     
          
      <?php  if (isset($_SESSION['User'])) : ?>
                
  		<h4>Logged In As: <big id="blue-text">&emsp;<?php echo $_SESSION['User']; ?> </big></h4>
    <button type="button" class="btn btn-outline-dark"><big><a href="navBar.php?logout='1'" style="text-decoration: none;">Click to Logout</a></big></button>
    <button type="button" class="btn btn-outline-dark" onclick="window.location.href='../en/ProfileDetails.php'"><big>My Data</big></button>
       
      <?php endif ?>
  </div>
</div><br>
</body>
</html>
   
