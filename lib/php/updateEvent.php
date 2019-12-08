<?php

    include 'config.php';
    $query ="SELECT LocationName FROM story_event WHERE EventName ='Test'";
    $query ="UPDATE story_event SET EventName = 'TeaParty', EventDate = '22/10/1860', EventDescription ='Tea for the english' WHERE EventName = 'Test'";
    $result = $conn->query($query);

?>