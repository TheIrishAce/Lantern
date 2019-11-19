<?php
  session_start();
?>
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

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom/navbar.css">

  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">

  <div class="header-login">
    <?php
    if (isset($_SESSION['userUid'])) {
      echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#"><img id="lanternLogo" src="images/Lantern.png"><b>Lantern</b></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
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
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form action="lib/php/includes/logout.inc.php" method="post">
            <button id="logout-button" type="submit" name="logout-submit">Logout</button>
          </form>
        </li>
      </ul>
      </div>
      </nav>';
    }
    else {
      echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <div id="login-section">
          <form action="lib/php/includes/login.inc.php" method="post">
            <input type="text" id="username-input" name="AccountUsernameEmail" placeholder="Username/Email">
            <input type="password" id="password-input" name="AccountPassword" placeholder="Password">
            <button id="login-button" type="submit" name="login-submit">Login</button>
          </form>
        </div>
      </li>
    </ul>
    </div>
    </nav>';
    }
    ?>
  </div>

</head>
<body>

</body>
</html>
