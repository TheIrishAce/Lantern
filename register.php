<?php
  require "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom/register.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">
</head>

<body>
  <div id="navIncludedContent"></div>
  <div class="container-fluid">
    <div class="row">
      <div id="topColumn" class="col-md-1"></div>
      <div id="midColumn" class="col-md-10">
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            elseif ($_GET['error'] == "invalidemail") {
              echo '<p class="signuperror">Invalid email!</p>';
            }
            elseif ($_GET['error'] == "invalidemailuid") {
              echo '<p class="signuperror">Invalid email and username!</p>';
            }
            elseif ($_GET['error'] == "uid") {
              echo '<p class="signuperror">Username error!</p>';
            }
            elseif ($_GET['error'] == "passwordcheck") {
              echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            elseif ($_GET['error'] == "usertaken") {
              echo '<p class="signuperror">Username already in use!</p>';
            }
          }
          /*
          else if ($_GET['register'] == "success") {
            echo '<p class="signupsuccess">Register successful</p>';
          }
          */
        ?>
        <form action = "lib/php/includes/register.inc.php" method ="post">
          <div class="container">
            <label for="AccountUsername"><b>Username</b></label>
            <input type="text" id="register-username-input" placeholder="Enter Username" name="AccountUsername" required>
            <label for="AccountEmail"><b>Email</b></label>
            <input type="text" id="register-email-input" placeholder="Enter Email" name="AccountEmail" required>
            <label for="AccountPassword"><b>Password</b></label>
            <input type="password" id="register-password-input" placeholder="Enter Password" name="AccountPassword" required>
            <label for="ConfirmPassword"><b>Confirm Password</b></label>
            <input type="password" id="register-password-repeat-input" placeholder="Enter Password" name="ConfirmPassword" required>
            <button id="register-submit-button" name="register-submit" type="submit">Register</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </div>
          
        </form>
  </body>

  <footer id="footer">
    &copy; Lantern 2019
  </footer>
