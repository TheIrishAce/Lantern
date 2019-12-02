<?php
  session_start();

  if (isset($_POST['save']))
  {
    require 'config.php';

    $AuthorId = $_SESSION['userUid'];

    $TextArea = $conn->real_escape_string($_POST["storyType"]);
    if(!empty($TextArea)){
      $TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);

      //data1 used to insert story.
      //data 2 used to set temp var with user of story just inserted.
      //data 3 used to update the inserted story with the correct owner.
      $tempCheckStoryExist = $conn->query("SELECT UserStoryId from user_story WHERE UserStoryAuthor='$AuthorId'");
      //var_dump();
      if ($tempCheckStoryExist->num_rows == 0)
      {
        $insertNewStory = $conn->query("INSERT INTO user_story (UserStoryAuthor, UserStory) VALUES ('$AuthorId','$TextArea')");
        //echo "false";
      }
      else if ($tempCheckStoryExist->num_rows > 0)
      {
        //$checkStoryExist = $conn->query($tempCheckStoryExist);
        $tempCheckStoryExist = $conn->query("SET @tempVar =(SELECT UserStoryId from user_story WHERE UserStoryAuthor='$AuthorId')");
        $updateExistingStory = $conn->query("UPDATE user_story SET user_story.UserStory = '$TextArea' WHERE user_story.UserStoryId=@tempVar");
        //echo "true";
      }
      else
      {
        echo "Error";
      }

      if ($insertNewStory || $updateExistingStory)
      {
          exit('success');
	    }

      //fail if any other case is true.
      else
      {
          exit('failed');
      }
    }
  }

  elseif (isset($_POST['load']))
  {
    include 'config.php';
    //AuthorId = current logged in account username

    $AuthorId = $_SESSION['userUid'];
    //var_dump($AuthorId);

    if ($AuthorId == "") {
      exit('failed');
    }

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
