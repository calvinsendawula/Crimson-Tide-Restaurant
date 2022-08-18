<form action="processFetchOrders.php" method="post" enctype="multipart/form-data">
    <div class="container">
      <p class="font-weight-bold px-1 py-1">
        <h3 class="text-center" id="blue-text">Customer Orders</h3>
      <a class="btn btn-dark" href="hqIndex.php" role="button">Refresh Page</a>
        </br>
      </p>
      <div class="card-deck">
<?php
$databaseHost = 'localhost';
$databaseName = 'crimson_tide_restaurant';
$databaseUsername = 'root';
$databasePassword = '';
$cser = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($cser, "SELECT * FROM client_order");
$multipleOf3 = 0;
$notMultiple = 0;
$rows = 0;

while($res = mysqli_fetch_array($result)) {
	$orderNo = $res['ClientOrderNo'];
	$clientUsername = $res['ClientUsername'];
	$PaymentMethod = $res['PaymentMethod'];
    $rows++;
    $staticOrderNumber = "staticOrderNo".$rows;
    $staticOrderName = "staticOrder".$rows;
    $staticUsername = "staticUsername".$rows;
    $staticUsernameLabel = "staticUsernameLabel".$rows;
    $staticPaymentMethod = "staticPaymentMethod".$rows;
    $staticPaymentMethodLabel = "staticPaymentMethodLabel".$rows;
    $confirmOrderBtn = "ConfirmOrderBtn".$rows;
    $status = $res['Status'];
    ?>
  <div class="card" style="max-width: 30%;">
	  <div class="card-body">
	    <h3 class="card-title text-center" id="blue-text">Order <?php echo $rows; ?></h3>
	  	<div class="text-center">
        <text>Order Status&emsp;</text>
      <input readonly type="text" style="max-width: 100px;" class="btn btn-outline-dark" value="<?php echo $status; ?>"></input><br><br>
      </div>
      <div class="form-check d-inline">
		    <text>Order Number&emsp;</text>
		    <input id="<?php echo $staticOrderNumber;?>" readonly type="text" style="max-width: 100px;" class="btn btn-outline-dark" name="<?php echo $staticOrderName;?>" value="<?php echo $orderNo; ?>"></input>
			</div>
		<br><br>
		<div class="form-check d-inline">
		    <text>Client Username&emsp;</text>
		    <input id="<?php echo $staticUsername;?>" readonly type="text" style="max-width: 130px;" class="btn btn-outline-dark" name="<?php echo $staticUsernameLabel;?>" value="<?php echo $clientUsername; ?>"></input>
			</div>
		<br><br>
		<div class="form-check d-inline">
		    <text>Payment Method</text>
		    <input id="<?php echo $staticPaymentMethod;?>" readonly type="text" style="max-width: 150px;" class="btn btn-outline-dark" name="<?php echo $staticPaymentMethodLabel;?>" value="<?php echo $PaymentMethod; ?>"></input>
			</div>
		<br><br>
    <div class="form-check text-center">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked>
        <label class="form-check-label" for="flexCheckChecked1">
          Order Courier
        </label>
      </div><br>
	      <div class="text-center">
          <input class="btn btn-outline-success text-center" type="submit" name="<?php echo $confirmOrderBtn; ?>" role="button" value="Confirm Order"></input>
	      </div>
	    </div>
	  </div>
	</div><br>
    <?php
    if ($rows % 3 === 0) {
      ?>
        </div><br>
        <div class="card-deck">
      <?php
      }
    }
?>
    </div><br>
      <br><br>
    </div>
  <?php
 if ($rows === 0) {
  ?>
  <div class="container text-center">
    <div id="jumbotron-call">
      <h1 class="display-5" id="red-text">No orders made yet!</h1>
      <span id="navItems">
        <li><img src="../images/icons/emptyBox.png" alt="Crimson Logo"></li>
      </span>
      <h3 id="blue-text">There are currently no customer orders. <br>Click the button below to refresh the page.</h3>
      </br>
      <a class="btn btn-outline text-center" href="hqIndex.php" role="button" id="place-order-btn">
        <big>REFRESH</big>
      </a>
    </div><br>
  </div>
  <?php
}

?>
</form>