<?php

if(isset($_POST['reset-password-submit'])){
  $selector=$_POST['selector'];
  $validator=$_POST['validator'];
  $password=$_POST['pwd'];
  $passwordRepeat=$_POST['pwd-repeat'];



  $currentDate=date('U');

  require 'config.php';
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

  $sql = "UPDATE site_account SET AccountPassword=$hashedPwd WHERE AccountEmail='vastolordeichigo17@gmail.com'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    header("Location:../../../index.php");
  }

}else {
  header("Location:../../../index.php");
}
