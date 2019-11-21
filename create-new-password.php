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
        $selector=$_GET["selector"];
        $validator=$_GET["validator"];

        if(empty($selector)||empty($validator)){
          echo "Could not validate your request";
        }else{
          if(ctype_xdigit($selector)!==false&&ctype_xdigit($validator)!==false){
            ?>
            <form action = "lib/php/includes/reset-password.inc.php" method ="post">
              <div class="container">
                <input type="hidden" name="selector" value="<?php echo $selector;?>">
                <input type="hidden" name="validator" value="<?php echo $validator;?>">
                <input type="password" name="pwd" placeholder="Enter a new password">
                <input type="password" name="pwd-repeat" placeholder="Enter a new password again">
                <button type="submit" name="reset-password-submit">Reset Password</button>
              </div>

            </form>
            <?php
          }
        }
         ?>


  </body>

  <footer id="footer">
    &copy; Lantern 2019
  </footer>
