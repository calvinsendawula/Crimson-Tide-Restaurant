<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
    include '../SharedFiles/metatags.php';
   ?>
  <link rel="stylesheet" href="../hqStyles/register.css">
  <title>Register</title>
</head>

<body>
  <div class="centerpiece">
    <div class="container">
      <form action="staffRegistrationInfo.php" method="post">
        <button type="exit" id="btnExit"><a href="../SharedFiles/Login.php">X</a></button>
        <h1>Sign Up - Staff</h1>
        <label for="firstName">First Name:</label>
        <input type="text" name="fName" id="firstName"><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lName" id="lastName"><br><br>

        <label for="staffUsername">Username:</label>
        <input type="text" name="username" id="staffUsername"><br><br>

        <label for="staffPhone">Phone:</label>
        <input type="number" name="phoneNo" id="staffPhone"><br><br>

        <label for="emailAdd">Email Address:</label>
        <input type="email" name="emailAddress" id="emailAdd"><br><br>

        <label for="staffPass">Password:</label>
        <input type="password" name="staffPassword" id="staffPass"><br><br>

        <label for="physicalAdd">Physical Address:</label>
        <input type="text" name="physicalAddress" id="physicalAdd"><br><br>

        <label for="postalAdd">Postal Address:</label>
        <input type="text" name="postalAddress" id="postalAdd"><br><br>

        <div class="btn">
          <button type="reset" id="btnClearFields">Clear Fields</button><br>
        </div>
        <div class="login">
          <p>Already have an account? <a href="Login.html">Login</a></p><br>
        </div>
        <div class="btn">
          <button id="btnContinue" type="submit" value="Register">Continue</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
