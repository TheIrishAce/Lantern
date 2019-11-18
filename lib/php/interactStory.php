<?php
  //session_start();

  if (isset($_POST['save']))
  {
    include 'config.php';
    include "includes/login.inc.php";

    $AuthorId = $_SESSION['userId'];

    $TextArea = $conn->real_escape_string($_POST["storyType"]);
    if(!empty($TextArea)){
      $TextArea = filter_var($TextArea, FILTER_SANITIZE_STRING);

      //Original insertion method. (Didn't link author)
      //$data = $conn->query("INSERT INTO user_story (UserStory) VALUES ('$TextArea')");

      //data1 used to insert story.
      //data 2 used to set temp var with user of story just inserted.
      //data 3 used to update the inserted story with the correct owner.
      $data1 = $conn->query("INSERT INTO user_story (UserStory) VALUES ('$TextArea')");
      $query1 = "SET @tempVar =(SELECT UserStoryId from user_story WHERE UserStory='$TextArea')";
      $data2 = $conn->query($query1);
      $data3 = $conn->query("UPDATE user_story SET user_story.UserStoryAuthor = '$AuthorId' WHERE user_story.UserStoryId=@tempVar");

      //success case if data1 - 3 excutes without errors.
      if ($data1 && $data2 && $data3)
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
    include "includes/login.inc.php";

    //AuthorId = current logged in account username

    $AuthorId = $_SESSION['userId'];
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
