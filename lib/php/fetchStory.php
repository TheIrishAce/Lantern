<?php
  session_start();
  if (isset($_GET['submit_button_name']))
  {
    include 'config.php';
    $StoryAuthor = 'Bobbie_Rossie';
    //$TextArea = $_POST['storyType'];

    if(!empty($StoryAuthor)){
      //$TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);

      $data = $conn->query("SELECT UserStory FROM user_story WHERE UserStoryAuthor='$StoryAuthor'");

      if ($data->num_rows > 0)
      {
		      exit('success');
	    }

      else
      {
          exit('failed');
      }

    }

  }
?>
