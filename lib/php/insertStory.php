<?php
  include 'config.php';

  $TextArea = $_POST['storyType'];

  if(!empty($TextArea)){
    $TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO user_story (UserStory) VALUES ('$TextArea')";

    if (!mysqli_query($conn,$sql))
		{
			echo 'ERROR, Data not Inserted';
		}

		else
		{
			echo 'Data Inserted, Story Saved';
		}

    //refresh the index page after 2 seconds.
		header("refresh:2; url=../../index.php");

  }

  else
  {
		echo 'You missed a required field';
		header("refresh:1; url=../../author.html");
	}
?>
