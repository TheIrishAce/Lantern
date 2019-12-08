<?php

   include 'config.php';
   $query = "SELECT LocationName FROM story_location WHERE LocationName = 'Cathal'";
   $query = "UPDATE story_location SET locationName = 'London', LocationType = 'Mega City', LocationDescription = 'The New Captial of United Kingdom' WHERE LocationName = 'London'";
   $result = $conn->query($query);

?>