<?php
  session_start();
  if (isset($_POST['keyPressed']))
  {
    include 'config.php';
    //$NamesArray = $conn->real_escape_string($_POST["nameArrayData"]);
    $NamesArray = json_decode(stripslashes($_POST['nameArrayData']));
    //var_dump($NamesArray);
    //echo $NamesArray;
    if(!empty($NamesArray)){
      foreach ($NamesArray as $name) {
        //$name = filter_var($name, FILTER_SANITIZE_STRING);

        $query = "SELECT CharacterName FROM story_character WHERE CharacterName = '$name'";
        $result = $conn->query($query);
        $data = $result->fetch_assoc();

        //echo $result;
        if ($result->num_rows > 0)
        {
          $storyArray['exit'] = 'success';
          $storyArray['foundCharacters'] = $data;
          echo json_encode($storyArray);
          //echo "success";
          //exit('success');
  	    }

        else
        {
          exit('failed');
        }
        exit();
      }
    }
  }
?>
