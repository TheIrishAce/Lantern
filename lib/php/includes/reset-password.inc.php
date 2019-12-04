<?php

if(isset($_POST["reset-password-submit"])){
  $selector=$_POST["selector"];
  $validator=$_POST["validator"];
  $password=$_POST["pwd"];
  $passwordRepeat=$_POST["pwd-repeat"];

  if (empty($password) || empty($passwordRepeat)) {
      header("Refresh:0");
      exit();
    } else if ($password != $passwordRepeat) {
      header("Refresh:0");
      exit();
    }

  $currentDate=date("U");

  require 'config.php';

  $sql="SELECT * FROM password_reset WHERE selector_reset=? AND expires_resert>=$currentDate ";
  $stmt= mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)){
    echo "There was an error!!!";
    exit();
  }else{
    mysqli_stmt_bind_param($stmt,"s",$userEmail);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if(!$row=mysqli_fetch_assoc($result)){
      echo "you need to re-submit you request";
      exit();
    }else {
      $tokenBin=hex2bin($validator);
      $tokenCheck=password_verify($tokenBin,$row["token_reset"]);

      if($tokenCheck===fasle){
        echo "you need to re-submit you request";
        exit();
      }elseif ($tokenCheck===true) {
        $tokenEmail=$row['email_reset'];
        $sql="SELECT * FROM site_account WHERE AccountEmail=?";
        $stmt= mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
          echo "There was an error!!!";
          exit();
        }else {
          mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
          mysqli_stmt_execute($stmt);
          $result=mysqli_stmt_get_result($stmt);
          if(!$row=mysqli_fetch_assoc($result)){
            echo "There was an error";
            exit();
          }else {
            $sql="UPDATE site_account SET AccountPassword=? WHERE AccountEmail=? ";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
              echo "There was an error!!!";
              exit();
            }else {
              $newPwdHash = password_hash($password,PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql="DELETE FROM password_reset WHERE email_reset=? ";
              $stmt= mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "There was an error!!!";
                exit();
              }else{
                mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: ../index.php?reset=success");
              }
            }
          }
        }
      }
    }
  }

}else {
  header("Location:../index.php");
}
