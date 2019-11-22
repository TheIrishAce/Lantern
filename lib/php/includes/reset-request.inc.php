<?php


 if (isset($_POST["reset-request-submit"])){
   $selector=bin2hex(random_bytes(8));
   $token=random_bytes(32);

   $url="https://lanterngrape.herokuapp.com/create-new-password.php?selector=".$selector ."&validator=".bin2hex($token);

   $expires =date("U")+900;

   require 'config.php';

    $userEmail=$_POST["email"];

    $sql="DELETE FROM password_reset WHERE email_reset=?";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
      echo "There was an error!!!";
      exit();
    }else{
      mysqli_stmt_bind_param($stmt,"s",$userEmail);
      mysqli_stmt_execute($stmt);
    }

    $sql="INSERT INTO password_reset(email_reset,selector_reset,token_reset,expires_resert)VALUES(?,?,?,?) ";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
      echo "There was an error!!!";
      exit();
    }else{
      $hashedToken=password_hash($token,PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
      mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to=$userEmail;

    $subject= "Reset your password for Lantern";

    $message ='<p>We recevied a password reset request for your account the click the link to reset your password, if you have not requested this you can ignore this</p>';
    $message.='<p>Here is the link to reset your password: <br>';
    $message.='<a href="'. $url . '">'.$url . '</a><p>';

    $headers="From: Latern<lanternwritingapp@gmail.com>\r\n";
    $headers.= "Reply-To: lanternwritingapp@gmail.com\r\n";
    $headers.= "Content-type: text/html\r\n";

    mail($to,$subject,$message,$headers);

    header("Location: ../index.php?reset=success");

 }else{
   header("Location: ../index.php");
 }
