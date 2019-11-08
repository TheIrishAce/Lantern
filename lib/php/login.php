<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $AccountUsername = mysqli_real_escape_string($db,$_POST['uname']);
      $AccountPassword = mysqli_real_escape_string($db,$_POST['psw']); 
      
      $sql = "SELECT AccountId FROM site_account WHERE uname = '$AccountUsername' and psw = '$AccountPassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("AccountUsername");
         $_SESSION['login_user'] = $AccountUsername;
         
         header("location: author.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>