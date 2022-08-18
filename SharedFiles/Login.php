<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/login.css">
  <title>Login</title>
</head>

<body>
  <div class="centerpiece">
    <div class="container">
      <form action="processLogin.php" method="post">
        <button type="exit" id="btnExit"><a href="Index.php">X</a></button>
        <h1>Login</h1>
        <label for="Username">Username:</label>
        <input type="text" name="username" id="Username" required="true"><br><br>

        <label for="passwordAdd">Password:</label>
        <input type="password" id="passwordAdd" name="password" required="true"><br><br>

        <div class="btn">
          <button id="btnLogin" name="Login" type="submit">Log in</button>
        </div>
        <br>
        <div class="myCenterText">
          <a href="#">Forgot your password?</a><br>
        </div>

        <div class="myCenterText">
          <h4>Don't have an account yet? It's free!</h4>
        </div>
        
        <div class="btn">
          <a id="btnCreate" type="button" href="../en/Register.php" style="text-decoration: none;">Create Account</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
