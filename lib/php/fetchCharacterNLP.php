<?php
  session_start();
  if (isset($_POST['keyPressed']))
  {
    include 'config.php';
    //$NamesArray = $conn->real_escape_string($_POST["nameArrayData"]);
    $NamesArray = json_decode(stripslashes($_POST['nameArrayData']));
    //print_r($NamesArray);
    //var_dump($NamesArray);
    //echo $NamesArray;
    $counter = 0;
    if(!empty($NamesArray)){
      foreach ($NamesArray as $name) {
        //$name = filter_var($name, FILTER_SANITIZE_STRING);
        $counter++;
        $query = "SELECT CharacterName FROM story_character WHERE CharacterName = '$name'";
        $result = $conn->query($query);
        $data = [$result->fetch_assoc()];
        //print_r($data);

        //echo $result;
        if ($result->num_rows > 0)
        {
          $storyArray['exit'] = 'success';
          $storyArray[$counter] = $data;

          //echo "success";
          //exit('success');
  	    }
      }
      if ($result->num_rows > 0)
      {
        echo json_encode($storyArray);
      }
    }
    exit();
  }
?>
