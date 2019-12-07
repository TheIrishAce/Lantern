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

                <form  method ="post" >
                  <div class="container">


                    <input type="password" name="pwd" placeholder="Enter a new password">
                    <input type="password" name="pwd-repeat" placeholder="Enter a new password again">
                    <button type="submit" name="reset-password-submit">Reset Password</button>
                  </div>

                </form>
