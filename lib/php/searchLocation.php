<?php

    session_start();
    if(isset($_POST['SearchLocationButton']))
    {
        include 'config.php';
        $SearchedLocation = $conn->real_escape_string($_POST["searchLocation"]);
        if(!empty($SearchedLocation))
        {

            $SearchedLocation = filter_var($SearchedLocation, FILTER_SANITIZE_STRING);
            $query = "SELECT * FROM story_location WHERE LocationName = '$SearchedLocation'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();

            $LocationName = $data['LocationName'];
            $LocationType = $data['LocationType'];
            $LocationDescription = $data['LocationDescription'];

            if($result->num_rows > 0){

                $storyArray['exit'] = 'success';
                $storyArray['returnedLocationName'] = $LocationName;
                $storyArray['returnedLocationType'] = $LocationType;
                $storyArray['returnedLocation'] = $LocationDescription;
                echo json_encode($storyArray);

            }
            else{

                exit('failed');
            }

            exit();
        }

    }

?>