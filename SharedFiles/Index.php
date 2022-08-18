<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include 'metatags.php';
   ?>
  <link rel="stylesheet" href="../styles/main.css">
  <title>Crimson Tide Restaurant Official Website</title>
</head>

<body>
  <header>
    <?php 
    include '../SharedFiles/navBar.php';
   ?>
  <main>
    <!-- This is for the first jumbotron -->
    <div id="jumbotron-call">
      <div class="container">
        <br>
        <h1 class="display-5" id="red-text">A Permanent quest for perfection.</h1>
        <h3 id="blue-text">To us, a dish is a living thing, just as degustation is not a linear exercise. Each bite must procure a different gustatory emotion, at times powerful, at times delicate, at times smooth, at times bitter… the permanent
          search for perfection pushes us to always improve our creations, to reinterpret some, and to abandon others, in order to rediscover them all over again later. Such is the routine in the panorama of our culinary work. Reserve a seat today
          and get a taste of what true creativity is like.</h3>

        <h1 class="display-5" id="red-text">QUICK-DROP-SERVICE</h1>
        <h3 id="blue-text">We take pride in our online delivery services. <br>Feeling hungry? Order something from our exquisite menu. Be sure to take advantage of discounts!</h3>
        </br>
        <a class="btn btn-outline text-center" href="../en/restaurantMenu.php" role="button" id="place-order-btn">
          <big>PLACE ORDER</big>
        </a>
      </div><br>
    </div>

  <!-- This is for the rows of CARDS -->
    <div class="container">
      <p class="font-weight-bold px-1 py-1">
        <h3 class="text-center" id="blue-text">Our Menu</h3>
        </br>
      </p>
      <div class="card-deck">
<?php
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Item");
$rows = 0;
$multipleOf3 = 0;
$notMultiple = 0;
while($res = mysqli_fetch_array($result)) {
    $originalPrice = $res['CrimsonMenuItemPrice'];
    $itemDiscount = 1-($res['CrimsonMenuItemDiscount']/100);
    $imagePath = $res['CrimsonMenuItemImagePath'];
    $foodName = $res['CrimsonMenuItemName'];
    $itemDescription = $res['CrimsonMenuItemDescription'];
    $itemCategory = $res['CrimsonMenuItemCategory'];
    $discountedPrice = $originalPrice*$itemDiscount;
    $rows++;
    ?>
      <div class="card" style="max-width: 30%;">
  <img src="../hq/asset/<?php echo $imagePath ?>" class="card-img-top img-fluid" alt="Discounted Item">
  <div class="card-body">
    <h5 class="card-title float-left" id="blue-text"><?php echo $foodName ?>
      <br><small><?php echo $itemDescription; 
        echo '<br><br>Category : '.$itemCategory ?></small><br><br>
        <big id="redCardText"><?php echo $res['CrimsonMenuItemDiscount'] ?>% Discount</big><br>
        <small><strike>Kshs <?php echo $originalPrice ?></strike>&emsp;<big id="bright-red-text">Ksh <?php echo $discountedPrice ?></big></small>
      </h5>
      </div>
    </div>
    <?php
    if ($rows % 3 === 0) {
      ?>
        </div><br>
        <div class="card-deck">
      <?php
      break;
      }
    }
?>

      </div>
    <br>
    <a class="btn btn-outline text-center" href="../en/restaurantMenu.php" role="button" id="place-order-btn">
      <big>ORDER NOW</big>
    </a>
    <br><br>
    </div>
  </main>
  <?php 
    include 'footerSection.php';
   ?>
</body>

</html>
