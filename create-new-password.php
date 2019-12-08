<?php
  require "navbar.php";


require "lib\php\config.php";
              if(!isset($_GET["code"])){
                exit("Can't find page");
              }
              $code=$_GET["code"];
              $getEmailQuery=mysqli_query($conn,"SELECT email FROM resetPasswords WHERE code='$code'");

              if(isset($_POST['reset-password-submit'])){
                $password=$_POST['pwd'];
                $passwordRepeat=$_POST['pwd-repeat'];
                $newPwdHash = password_hash($password,PASSWORD_DEFAULT);
                $row=mysqli_fetch_array($getEmailQuery);
                $email=$row["email"];


                $query=mysqli_query($conn, "UPDATE site_account SET AccountPassword='$newPwdHash' WHERE AccountEmail='$email'");
                if($query){
                  $query=mysqli_query($conn, "DELETE FROM resetPasswords WHERE email='$email'");
                  exit("password updated");
                }
              }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
    <form  method ="post" >
      <div class="container">


        <input type="password" name="pwd" placeholder="Enter a new password">
        <input type="password" name="pwd-repeat" placeholder="Enter a new password again">
        <button type="submit" name="reset-password-submit">Reset Password</button>
      </div>

    </form>
  </body>
</html>
