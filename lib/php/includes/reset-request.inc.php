<?php
require '../config.php';

 if (isset($_POST["resetEmail"])){

   $pageUserEmail = $_POST['userEmail'];


   $sql = "SELECT * FROM site_account WHERE AccountEmail=?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
     echo'Not a validate email';

   }

   else
    {
  //   $url="https://lanterngrape.herokuapp.com/create-new-password.php?selector=".$selector ."&validator=".bin2hex($token);

     $expires =date("U")+900;


     require_once '../../../PHPMailer/PHPMailerAutoload.php';
     $code=uniqid(true);
     $query= mysqli_query($conn, "INSERT INTO resetPasswords(code, email) VALUES('$code','$pageUserEmail')");
     $url="http://" . $_SERVER["HTTP_HOST"] . "/create-new-password.php?code=$code";
//$url="http://127.0.0.1/Lantern/create-new-password.php?code=".$code;



      $mail=new PHPMailer(true);
      try{
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='ssl';
        $mail->Host='smtp.gmail.com';
        $mail->Port='465';
        $mail->isHTML(true);
        $mail->Username='lanternwritingapp@gmail.com';
        $mail->Password='Evangeline201';
        $mail->SetFrom('lanternwritingapp@gmail.com');
        $mail->Subject='Forgotten password';
        $mail->Body=$url;
        $mail->AddAddress($pageUserEmail);

        $mail->Send();


        header("Location: ../../../index.php?reset=success");
      }catch(Exception $e){
        header("Location: ../../../reset-password.php");
        echo'Not a validate email';
      }
}




 }else{
   header("Location: ../../../index.php");
 }
