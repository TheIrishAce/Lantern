<?php
    include 'config.php';
    $EventName = $_POST['eventName'];
    $EventDate = $_POST['eventDate'];
    $EventDescription = $_POST['eventDescription'];

    if(!empty($EventName) && !empty($EventDate) && !empty($EventDescription)){

      $EventName = filter_var($EventName, FILTER_SANITIZE_STRING);
      $EventDate = filter_var($EventDate, FILTER_SANITIZE_STRING);
      $EventDescription = filter_var($EventDescription, FILTER_SANITIZE_STRING);

      $sql = "INSERT INTO story_event (EventName,EventDate,EventDescription) VALUES ('$EventName', '$EventDate', '$EventDescription')";

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
  		header("refresh:1; url=../../creation.html");
  	}
