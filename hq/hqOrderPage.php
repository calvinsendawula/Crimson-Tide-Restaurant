<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
  <link rel="stylesheet" href="../hqStyles/hqOrderPage.css">
  <title>Crimson Tide Restaurant Official Website</title>
</head>

<body>
  <?php
  include "../SharedFiles/navBar.php";
  ?>
  <main>
    <form action="processClientOrder.php" method="post" enctype="multipart/form-data">
    <!-- This is for the first jumbotron -->
     <!-- This is for the row of CARDS -->
    <div class="container">
      <p class="font-weight-bold px-1 py-1">
        <h3 class="text-center" id="blue-text">Customer Order</h3>
      </p>
      <div class="card-deck">
<?php
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$rows = 0;
$priceDue = 0;

$myCounter = 0;
$cookieRetrieved = "";

for ($i=0; $i <= $_COOKIE['SYSTEM_COUNTER']; $i++) { 
    $cookieName = "orderCookie".$i;
    if (isset($_COOKIE[$cookieName])) {
      $myCounter++;
      $cookieRetrieved = $_COOKIE[$cookieName];
      $result = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Items_Ordered WHERE ClientOrderNo=".$cookieRetrieved);

      while($res = mysqli_fetch_array($result)) {
        $menuItemID = $res['CrimsonMenuItemID'];
        $menuItemQty = $res['CrimsonMenuItemQty'];
        $result2 = mysqli_query($cser, "SELECT * FROM Crimson_Menu_Item WHERE CrimsonMenuItemID=".$menuItemID);
        while($res2 = mysqli_fetch_array($result2)){
        $originalPrice = $res2['CrimsonMenuItemPrice'];
          $itemDiscount = 1-($res2['CrimsonMenuItemDiscount']/100);
          $imagePath = $res2['CrimsonMenuItemImagePath'];
          $foodName = $res2['CrimsonMenuItemName'];
          $itemDescription = $res2['CrimsonMenuItemDescription'];
          $itemCategory = $res2['CrimsonMenuItemCategory'];
          $discountedPrice = $originalPrice*$itemDiscount;
          $sale = $discountedPrice*$menuItemQty;
          $rows++;
          $priceDue += $sale;
      $myCounter++;
      ?>
      <div class="card" style="max-width: 30%;">
    <img src="../hq/asset/<?php echo $imagePath ?>" class="card-img-top img-fluid" alt="Discounted Item">
    <div class="card-body">
      <h5 class="card-title float-left" id="blue-text"><?php echo $foodName ?>
      <br><small><?php echo $itemDescription; 
        echo '<br><br>Category : '.$itemCategory ?></small><br><br>
        <!-- This is the big green tick -->
        <i class="fas fa-check-circle float-right fa-3x" id="card-glow"></i>
        <big id="redCardText"><?php echo $res2['CrimsonMenuItemDiscount'] ?>% Discount</big><br>
        <small><strike>Kshs <?php echo $originalPrice ?></strike>&emsp;<big id="bright-red-text">Ksh <?php echo $discountedPrice ?></big></small>
      </h5>
      <br>
      <!-- This is the quantity -->
      <div class="form-check d-inline text-center">
        <text>Qty: </text>
          <input type="text" style="max-width: 40px;" class="btn btn-outline-dark" value="<?php echo $menuItemQty ?>"></input>
      </div>
        </div>
      </div>
      <?php
      }
    }
      if ($rows % 3 === 0) {
      ?>
        </div><br>
        <div class="card-deck">
      <?php
      }
    }
  }
?>

      </div>

      <br>
      <div class="mb-3 row">
        <label for="staticOrderNo" class="col-sm-2 col-form-label">Order Number</label>
        <div class="col-sm-10">
          <input type="text" readonly name="createBill" class="form-control-plaintext" id="staticOrderNo" value="<?php echo $cookieRetrieved; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="staticAmount" class="col-sm-2 col-form-label" id="blue-text">Total Amount Payable</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="staticAmount" value="Ksh <?php echo $priceDue; ?>">
          <input type="number" name="billAmount" readonly hidden value="<?php echo $priceDue; ?>">
        </div>
      </div>

      <h5 class="card-title float-left" id="blue-text">Confirm Employee ID to proceed</h5><br><br>
      <form>
        <div class="form-group">
          <label for="employee_ID">Employee ID</label>
          <input type="number" class="form-control" name="employeeID" id="employee_ID" aria-describedby="emailHelp" placeholder="Confirm Employee ID">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="employeePassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">
            Print Receipt
          </label>
        </div>
        <br>
        <input class="btn btn-outline-success text-center" type="submit" name="submitClientOrder" role="button" id="place-order-btn" value="Confirm Order"><br>
      </form>
    </div>
  </br></br>
</form>
  </main>

  <?php 
    include '../SharedFiles/footerSection.php';
   ?>
</body>

</html>
