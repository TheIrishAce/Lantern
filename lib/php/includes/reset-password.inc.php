<?php
include '../../../create-new-password.php';
require '../config.php';
if(isset($_POST['reset-password-submit'])){
  $geq=$_POST['em']
  $password=$_POST['pwd'];
  $passwordRepeat=$_POST['pwd-repeat'];
  $newPwdHash = password_hash($password,PASSWORD_DEFAULT);
  $row=mysqli_fetch_array($geq);
  $email=$row["email"];
  $query=mysqli_query($conn, "UPDATE site_account SET AccountPassword='$newPwdHash' WHERE AccountEmail='$geq'");
  if($query){
    $query=mysqli_query($conn, "DELETE FROM resetPasswords WHERE email='$geq'");
    exit("password updated");
  }
  if(empty($password)||empty($passwordRepeat)){
    header("Location:../../../create-new-password.php");
    exit();

  }elseif ($password!=$passwordRepeat) {
    header("Location:../../../create-new-password.php");
    exit();
  }







}else {
  header("Location:../../../index.php");
}
