<?php
    include 'config.php';
    $EventName = $_POST['eventName'];
    $EventDate = $_POST['eventDate'];
    $EventLinkCharacter = $_POST['eventLinkCharacter'];
    $EventLinkKingdom = $_POST['eventLinkKingdom'];
    $EventDescription = $_POST['eventDescription'];

    if(!empty($EventName) && !empty($EventDate) && !empty($EventLinkCharacter) && !empty($EventLinkKingdom) && !empty($EventDescription)){

        $EventName = filter_var($EventName, FILTER_SANITIZE_STRING);
        $EventDate = filter_var($EventDate, FILTER_SANITIZE_STRING);
        $EventLinkCharacter = filter_var($EventLinkCharacter, FILTER_SANITIZE_STRING);
        $EventLinkKingdom = filter_var($EventLinkKingdom, FILTER_SANITIZE_STRING);
        $EventDescription = filter_var($EventDescription, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO events (eventName,eventDate,eventLinkCharacter,eventLinkKingdom,eventDescription) VALUES ('$EventName', '$EventDate', '$EventLinkCharacter', '$EventLinkKingdom', '$EventDescription')";

        if(!mysqli_query($con,$sql))
        {
            echo 'Error, Data not inserted';
        }
        else
        {
            echo 'Data inserted';
        }

        else
        {
            echo 'You have missed a required field';
            header("refresh:1; url=character.html");
        }


