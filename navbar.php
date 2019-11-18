<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">

  <div class="header-login">
    <form action="lib/php/includes/login.inc.php" method="post">
      <input type="text" name="AccountUsername" placeholder="Username/Email">
      <input type="password" name="AccountPassword" placeholder="Password">
      <button type="submit" name="login-submit">Login</button>
    </form>
    <a href="signup.php" class="header-signup">Signup</a>
    <form action="lib/php/includes/logout.inc.php" method="post">
      <button type="submit" name="logout-submit">Logout</button>
    </form>
  </div>

</head>
<body>
  <script>
  document.cookie = "lantern=navs;SameSite=Strict;path=/";
  </script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img id="lanternLogo" src="images/Lantern.png"><b>Lantern</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="author.php">Author</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="creation.php">Creation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="management.php">Management</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">ContactUs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <!--
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="creation.html">Creation Page</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="contact.html">Contact Us</a>
    </div>
  </li>
-->
<!--
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li>
-->
</ul>
</div>
</nav>
</body>
</html>