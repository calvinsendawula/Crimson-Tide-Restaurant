<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
  <link rel="stylesheet" href="../styles/restaurantMenu.css">
  <title>Crimson Tide Restaurant Menu</title>
</head>

<body>
  <?php 
    include '../SharedFiles/navBar.php';
   ?>
  <main>
    <form action="processCheckBox.php" method="post" enctype="multipart/form-data">
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
$multipleOf3 = 0;
$notMultiple = 0;
$rows = 0;
$counter = 0;
$checkBoxArray = array();

while($res = mysqli_fetch_array($result)) {
    $originalPrice = $res['CrimsonMenuItemPrice'];
    $itemDiscount = 1-($res['CrimsonMenuItemDiscount']/100);
    $imagePath = $res['CrimsonMenuItemImagePath'];
    $foodName = $res['CrimsonMenuItemName'];
    $itemDescription = $res['CrimsonMenuItemDescription'];
    $itemCategory = $res['CrimsonMenuItemCategory'];
    $discountedPrice = $originalPrice*$itemDiscount;
    $rows++;

    //Checkboxes
    $checkBoxName = "flexCheckDefault".$rows;
    $itemID = $res['CrimsonMenuItemID'];
    $checkBoxArray[$counter] = array($checkBoxName=>$itemID);
    $counter++;
    ?>
      <div class="card" style="max-width: 30%;">
  <img src="../hq/asset/<?php echo $imagePath ?>" class="card-img-top img-fluid" alt="Discounted Item">
  <div class="card-body">
    <h5 class="card-title float-left" id="blue-text"><?php echo $foodName ?>
      <br><small><?php echo $itemDescription; 
        echo '<br><br>Category : '.$itemCategory ?></small><br><br>
        <big id="bright-red-text"><?php echo $res['CrimsonMenuItemDiscount'] ?>% Discount</big><br>
        <small><strike>Kshs <?php echo $originalPrice ?></strike>&emsp;<big id="bright-red-text">Ksh <?php echo $discountedPrice ?></big></small></h5>
    <!-- This is the big check box -->
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" name="<?php echo $checkBoxName ?>">
      <label class="form-check-label" for="<?php echo $checkBoxName ?>">
        Add to cart 
      </label><br>
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
?>

      </div>
    </div>
    <br><br>
    <div class="container">
      <h5 class="card-title float-left" id="blue-text">Proceed to checkout.</h5>
      <br><br>
        <input class="btn btn-outline text-center" type="submit" name="submitCheckBoxes" role="button" id="place-order-btn" value="CHECK OUT"></input><br>
        <label for="row-count" hidden>Row Count:</label>
        <input type="number" hidden name="rowCount" id="row-count" value="<?php echo $rows ?>"><br><br>
    </div>
  </br></br>
</form>
  </main>
  <?php 
    include '../SharedFiles/footerSection.php';
   ?>
</body>

</html>
