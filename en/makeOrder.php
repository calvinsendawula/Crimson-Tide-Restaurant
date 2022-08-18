<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
  <link rel="stylesheet" href="../styles/makeOrder.css">
  <title>Crimson Tide Restaurant Official Website</title>
</head>

<body>
  <?php
  include "../SharedFiles/navBar.php";
  ?>
  <main>
    <form action="processCart.php" method="post" enctype="multipart/form-data">
    <div class="container">
      <p class="font-weight-bold px-1 py-1">
        <h3 class="text-center" id="blue-text">My Cart Orders</h3>
        </br>
      </p>
      <div class="card-deck">
<?php
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$rows = 0;
$counter = 0;
$qtyBoxArray = array();
$amountDue = 0;

$myCounter = 0;
$cookieRetrieved = "";
if (count($_COOKIE) >= 3) {
  for ($i=0; $i <= $_COOKIE['SYSTEM_COUNTER']; $i++) { 
    $cookieName = "itemCookie".$i;
    if (isset($_COOKIE[$cookieName])) {
      $myCounter++;
      $cookieRetrieved = $_COOKIE[$cookieName];
      $result = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Item WHERE CrimsonMenuItemID=".$cookieRetrieved);
      $res = mysqli_fetch_array($result);

      $originalPrice = $res['CrimsonMenuItemPrice'];
      $itemDiscount = 1-($res['CrimsonMenuItemDiscount']/100);
      $imagePath = $res['CrimsonMenuItemImagePath'];
      $foodName = $res['CrimsonMenuItemName'];
      $itemDescription = $res['CrimsonMenuItemDescription'];
      $itemCategory = $res['CrimsonMenuItemCategory'];
      $discountedPrice = $originalPrice*$itemDiscount;
      $itemID = $res['CrimsonMenuItemID'];
      $rows++;
      $amountDue += $discountedPrice;

      //Quantity setters.
      $minusBoxName = "minusBox".$rows;
      $qtyBoxName = "qtyBox".$rows;
      $qtyBoxID = "qtyBoxID".$rows;
      $qtyBoxValue = 1;
      $plusBoxName = "plusBox".$rows;
      $deleteItemName = "deleteItem".$i;
      $qtyBoxArray[$counter] = array($qtyBoxName=>$itemID);
      $counter++;
      ?>
      <div class="card" style="max-width: 30%;">
    <img src="../hq/asset/<?php echo $imagePath ?>" class="card-img-top img-fluid" alt="Discounted Item">
    <div class="card-body">
      <h5 class="card-title float-left" id="blue-text"><?php echo $foodName ?>
      <br><small><?php echo $itemDescription; 
        echo '<br><br>Category : '.$itemCategory ?></small><br><br>
        <!-- This is the big green tick -->
        <i class="fas fa-check-circle float-right fa-3x" id="card-glow"></i>
        <big id="redCardText"><?php echo $res['CrimsonMenuItemDiscount'] ?>% Discount</big><br>
        <small><strike>Kshs <?php echo $originalPrice ?></strike>&emsp;<big id="bright-red-text">Ksh <?php echo $discountedPrice ?></big></small>
      </h5>
      <br>
      <!-- This is the big check box -->
      <div class="form-check d-inline">
        <button type="button" class="btn btn-outline-danger" name="<?php echo $minusBoxName ?>"
          onclick="decreaseNo(<?php echo $qtyBoxID ?>)">
          <i class="fas fa-minus" style="color: #ff0000;"></i>
        </button>
          <input id="<?php echo $qtyBoxID ?>" type="number" style="max-width: 70px;" class="btn btn-outline-dark" name="<?php echo $qtyBoxName ?>" value="<?php echo $qtyBoxValue ?>"></input>
        <button type="button" class="btn btn-outline-success" name="<?php echo $plusBoxName ?>"
          onclick="increaseNo(<?php echo $qtyBoxID ?>)">
          <i class="fas fa-plus" style="color: #00ff20;"></i>
        </button><br><br>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-danger" name="<?php echo $deleteItemName ?>">
            Remove Item&emsp;<i class="far fa-trash-alt" style="color: #ff0000 ;"></i>
          </button>
        </div>
      </div>
        </div>
      </div>
      <?php
      if ($rows % 3 === 0) {
      ?>
        </div><br>
        <div class="card-deck">
      <?php
      }
    }
  }
  ?>
    </div><br>
      <h5 class="card-title float-left" id="blue-text">Payment Options*</h5><br><br>
      <p>*Payments should only be made after delivery</p>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="PayCash" id="inlineRadio1">
        <label class="form-check-label" for="inlineRadio1"><big>I'll pay in cash</big></label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="PayMPesa" id="inlineRadio2">
        <label class="form-check-label" for="inlineRadio2"><big>I'll pay with MPesa</big></label>
      </div><br><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="PayCard" id="inlineRadio3">
        <label class="form-check-label" for="inlineRadio3"><big>I'll pay with Credit/Debit Card</big></label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="PayPayPal" id="inlineRadio4">
        <label class="form-check-label" for="inlineRadio4"><big>I'll pay with PayPal</big></label>
      </div>

      <br><br>
        <input class="btn btn-outline text-center" type="submit" name="submitCheckBoxes" role="button" id="place-order-btn" value="CONFIRM ORDER"></input><br>
    </div>
  <?php
} else {
  ?>
  <div class="container text-center">
    <div id="jumbotron-call">
      <h1 class="display-5" id="red-text">Your cart is empty!</h1>
      <span id="navItems">
        <li><img src="../images/icons/cart1.png" alt="Crimson Logo"></li>
      </span>
      <h3 id="blue-text">Your cart seems to be empty. <br>Click the button below to start filling up your cart.</h3>
      </br>
      <a class="btn btn-outline text-center" href="restaurantMenu.php" role="button" id="place-order-btn">
        <big>PLACE ORDER</big>
      </a>
    </div><br>
  </div>
  <?php
}

?>

  </br></br>
</form>
  </main>

  <?php 
    include '../SharedFiles/footerSection.php';
   ?>

  <script src="../Javascript/functionScript.js"></script>
</body>
</html>
