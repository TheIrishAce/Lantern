<?php
  session_start();
  if (isset($_POST['save']))
  {
    include 'config.php';
    $TextArea = $conn->real_escape_string($_POST["storyType"]);
    if(!empty($TextArea)){
      $TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);
      $data = $conn->query("INSERT INTO user_story (UserStory) VALUES ('$TextArea')");
      if ($data)
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
