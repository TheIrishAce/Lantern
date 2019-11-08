<?php
    include 'config.php';
    $UserName = $_POST['uname'];
    $Password = $_POST['psw'];
   // $EventDescription = $_POST['eventDescription'];

    if(!empty($UserName) && !empty($Password) ){

      $UserName = filter_var($UserName, FILTER_SANITIZE_STRING);
      $Password = filter_var($Password, FILTER_SANITIZE_STRING);
      

      $sql = "INSERT INTO site_account (UserName,Password) VALUES ('$UserName', '$Password')";

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
  		header("refresh:1; url=../../login.html");
  	}
