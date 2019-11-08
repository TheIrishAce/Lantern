<?php
    include 'config.php';
    $AccountUsername = $_POST['uname'];
    $AccountPassword = $_POST['psw'];
   // $EventDescription = $_POST['eventDescription'];

    if(!empty($AccountUsername) && !empty($AccountPassword) ){

      $AccountUsername = filter_var($AccountUsername, FILTER_SANITIZE_STRING);
      $AccountPassword = filter_var($AccountPassword, FILTER_SANITIZE_STRING);
      

      $sql = "INSERT INTO site_account (AccountUsername,AccountPassword) VALUES ('$AccountUsername', '$AccountPassword')";

      if(!mysqli_query($conn,$sql))
      {
        echo 'Error, Data not inserted';
      }
      else
      {
        echo 'Data inserted';
      }

      //refresh the index page after 2 seconds.
  		header("refresh:2; url=../../index.php");

		}

  	else{
  		echo 'You missed a required field';
  		header("refresh:1; url=../../register.html");
  	}
