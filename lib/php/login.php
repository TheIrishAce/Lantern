<?php
session_start();
include "config.php";

if(isset($_POST['but_submit'])){

    $AccountUsername = $_POST['AccountUsername'];
    $AccountPassword = $_POST['AccountPassword']; 
    if(!empty($AccountUsername) && !empty($AccountPassword) ){

      $AccountUsername = filter_var($AccountUsername, FILTER_SANITIZE_STRING);
      $AccountPassword = filter_var($AccountPassword, FILTER_SANITIZE_STRING);
      
      //refresh the index page after 2 seconds.
      header("refresh:2; url=../../index.php");

    }

    $query="select * from site_account WHERE AccountUsername='$AccountUsername' AND AccountPassword='$AccountPassword'";
    $query_run =mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run)>0){
        
        $_SESSION['AccountUsername']=$AccountUsername;
        $Mes =  "Logged in as ";
        echo "<script type='text/javascript'>alert('$Mes');</script>";
        $Success =  $_SESSION['AccountUsername'];
            echo "<script type='text/javascript'>alert('$Success');</script>";

         
        header("refresh:2; url=../../index.php");

    }
    else{
        $Invalid = "Incorrect Email or Password";
            echo "<script type='text/javascript'>alert('$Invalid');</script>";
            echo("<meta http-equiv='refresh' content='1'>");
    }

}
?>