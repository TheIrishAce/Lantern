<?php
    include 'config.php';
    if(isset($_POST['AccountPassword'])){
      $AccountUsername = $_POST['AccountUsername'];
      $AccountPassword = $_POST['AccountPassword']; 
      $ConfirmPassword = $_POST['ConfirmPassword'];

      if($AccountPassword==$ConfirmPassword){
          $query = "select * from site_account WHERE AccountUsername='$AccountUsername '";
          $query_run =mysqli_query($conn,$query);
          if(mysqli_num_rows($query_run)>0){
            echo 'User already exists';
          }
          else{
            $sql = "INSERT INTO site_account (AccountUsername,AccountPassword) VALUES ('$AccountUsername', '$AccountPassword')";
            }
            if(!mysqli_query($conn,$sql))
            {
              echo 'Error, Data not inserted';
            }
            else
            {
              echo 'Data inserted';
            }
          }
      }

    
    

    if(!empty($AccountUsername) && !empty($AccountPassword) ){

      $AccountUsername = filter_var($AccountUsername, FILTER_SANITIZE_STRING);
      $AccountPassword = filter_var($AccountPassword, FILTER_SANITIZE_STRING);
      

      

      

      //refresh the index page after 2 seconds.
  		header("refresh:2; url=../../index.php");

		}

  	else{
  		echo 'You missed a required field';
  		header("refresh:1; url=../../register.html");
  	}
