<!DOCTYPE html>
<html>
<head>
  <?php 
  	include('../SharedFiles/metatags.php');
   ?>
  <link rel="stylesheet" href="../hqStyles/hqLogin.css">
	<title>Upload Image</title>
</head>
<body>
	<div class="centerpiece">
    <div class="container">
      <form action="hqProcessUpload.php" method="post" enctype="multipart/form-data">
		<label for="foodName">Food Name</label><br>
		<input type="text" name="foodName" required="true" placeholder="Food Item Name"><br><br>

		<label for="food-stock">Stock Available</label><br>
		<input type="number" name="foodStock" id="food-stock" required="true"><br><br>

		<label for="food-desc">Description</label><br>
		<textarea type="text" name="foodDesc" id="food-desc" required="true"></textarea><br><br>

		<label for="food-cat">Category</label><br>
		<input type="text" name="foodCat" id="food-cat" required="true"><br><br>

		<label for="food-discount">Discount (Leave blank if no discount is available)</label><br>
		<input type="number" name="foodDiscount" id="food-discount"><br><br>

		<label for="food-image">Image</label><br>
		<input type="file" name="foodImage" id="food-image" required="true"><br><br>

		<label for="food-price">Price (Kshs)</label><br>
		<input type="number" name="foodPrice" id="food-price" required="true"><br><br>
		<input type="submit" name="submitImage" value="SAVE">
		<a href="../hq/dashboard2.php" type="button" class="btn text-center btn-outline-dark">Cancel</a>
	</form>
    </div>
  </div>
</body>
</html>