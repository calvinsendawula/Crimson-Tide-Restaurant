<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
  <link rel="stylesheet" href="../styles/register.css">
  <title>Register</title>
</head>

<body>
  <div class="centerpiece">
    <div class="container">
      <form action="clientRegistrationInfo.php" method="post">
        <button type="exit" id="btnExit"><a href="../SharedFiles/Index.php">X</a></button>
        <h1>Sign Up</h1>
        <label for="firstName">First Name:</label>
        <input type="text" name="fName" id="firstName"><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lName" id="lastName"><br><br>

        <label for="clientUsername">Username:</label>
        <input type="text" name="username" id="clientUsername"><br><br>

        <label for="clientPhone">Phone:</label>
        <input type="number" name="phoneNo" id="clientPhone"><br><br>

        <label for="emailAdd">Email Address:</label>
        <input type="email" name="emailAddress" id="emailAdd"><br><br>

        <label for="clientPass">Password:</label>
        <input type="password" name="clientPassword" id="clientPass"><br><br>

        <label for="client_Location">Location:</label>
        <input type="text" name="clientLocation" id="client_Location"><br><br>

        <div class="btn">
          <button type="reset" id="btnClearFields">Clear Fields</button><br>
        </div>
        <div class="login">
          <p>Already have an account? <a href="../SharedFiles/Login.php">Login</a></p><br>
        </div>
        <div class="btn">
          <button id="btnContinue" type="submit" value="Register">Continue</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
