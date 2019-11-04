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

  elseif (isset($_POST['load']))
  {
    include 'config.php';
    $AuthorId = 'Bobbie_Rossie';
    $TextArea = $conn->real_escape_string($_POST["storyType"]);
    if(!empty($TextArea)){
      $TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);


      $query = "SELECT UserStory FROM user_story WHERE UserStoryAuthor='$AuthorId'";
      $result = $conn->query($query);
      $data = $result->fetch_assoc();


      //echo $result;
      if ($result->num_rows > 0)
      {
        $storyArray['exit'] = 'success';
        $storyArray['UserStory'] = $data;
        echo json_encode($storyArray);
        //exit('success');
	    }

      else
      {
        exit('failed');
      }
      exit();
    }
  }

  /*
  elseif (isset($_POST['delete']))
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
  */
?>
