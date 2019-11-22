<?php


 if (isset($_POST["reset-request-submit"])){
   $selector=bin2hex(random_bytes(8));
   $token=random_bytes(32);

   $url="https://lanterngrape.herokuapp.com/create-new-password.php?selector=".$selector ."&validator=".bin2hex($token);

   $expires =date("U")+900;

   require '../config.php';
   require_once('PHPMailer/PHPMailerAutoload.php');

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




    $mail=new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Host='smtp.gmail.com';
    $mail->Port='465';
    $mail->isHTML();
    $mail->Username='lanternwritingapp@gmail.com'
    $mail->Password='Evangeline201';
    $mail->SetFrom('no-reply: lanternwritingapp@gmail.com');
    $mail->Subject='Forgotten password';
    $mail->Body=$url;
    $mail->AddAddress($to);

    $mail->Send();


    header("Location: ../../../index.php?reset=success");

 }else{
   header("Location: ../../../index.php");
 }
