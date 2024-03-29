<?php
//session_start();
require "navbar.php";
if (!isset($_SESSION['userUid'])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom/management.css">

	<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/custom/managementFunctionality.js"></script>
  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">
</head>

<body>
    <div class="container-fluid">
      <div id="navIncludedContent"></div>
        <div class="row">
         <div id="topColumn" class="col-md-1"></div>
         <div id="midColumn" class="col-md-10">
             <div id ="accordion">
                 <div class ="card">
                     <div class="card-header" id="headingOne">
                         <h5 class="mb-0">
                             <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Search Character</button>
                         </h5>
                     </div>
                     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                         <div class ="card-body">
                             <form id="characterInputBoxes"  method="post">

                                 <em>Search Character : </em> <input type="text" id="searchCharacter" name="searchCharacter">
                                 <br/>
                                 <button type="button" name="SearchCharacterButton" class="btn btn-success" onclick="return searchManagementCharacter()">Search Character</button>
                                 <br/>
                                 <em>Character Name :</em> <input id="characterName" type="text" name="characterName">
                                 <br/>
                                 <em>Character Age :</em> <input id="characterAge" type="number" name="characterAge">
                                 <br/>
                                 <em>Character DOB :</em> <input id="characterDob" type="date" name="characterDob">
                                 <br/>
                                 <em>Character Gender :</em> <input id="characterGender" type="text" name="characterGender">
                                 <br/>
                                 <em>Character Race :</em> <input id="characterRace" type="text" name="characterRace">
                                 <br/>
                                 <em>Character Personality :</em> <textarea id="characterPersonality" type="text" name="characterPersonality"></textarea>
                                 <br/>
                                 <em>Character Appearance :</em> <textarea id="characterAppearance" type="text" name="characterAppearance"></textarea>
                                 <br/>
                                 <em>Character Species :</em> <input id="characterSpecies" type="text" name="characterSpecies">
                                 <br/>
                                 <button type="button" name="updateCharacterButton" class="btn btn-info" onclick ="return updateManagementCharacter()"> Edit Character</button>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-header" id="headingTwo">
                         <h5 class="mb-0">
                             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Search Location</button>
                         </h5>
                     </div>
                     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                         <div class="card-body form-group">
                             <form id="locationInputBoxes" action="lib/php/insertLocation.php" method="post">
                                 <div class="form-group">
                                     <em>Search Location: </em><input id="searchLocation" type ="text" name = searchLocation>
                                     <br/>
                                     <button id="SearchLocationButton" type ="button" name="SearchLocationButton" class="btn btn-success" onclick="return searchManagementLocation()">Search Location</button>
                                     <br/>
                                     <em>Location Name :</em> <input id="locationName" type="text" name="locationName">
                                     <br/>
                                     <em>Location Type :</em>
                                     <select id="locationType" name="locationType">
                                         <option value="kingdom">Kingdom</option>
                                         <option value="empire">Empire</option>
                                         <option value="city">City</option>
                                         <option value="building">Building</option>
                                     </select>
                                     <br/>
                                     <em>Location Description :</em> <input id="locationDescription" type="text" name="locationDescription">
                                     <br/>
                                     <button type="button" name="updateLocationButton" class="btn btn-info" onclick ="return updateManagementLocation()"> Edit Location</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="card">
                     <div class="card-header" id="headingThree">
                         <h5 class="mb-0">
                             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Search Event</button>
                         </h5>
                     </div>
                     <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                         <div class="card-body">
                             <form id="eventInputBoxes" action = "lib/php/insertEvent.php" method ="post">
                                 <em>Search Events: </em><input id="searchEvent" type="text" name="searchEvent">
                                 <br/>
                                 <button id ="SearchEventButton" type="button" name="SearchEventButton" class="btn btn-success" onclick="return searchManagementEvent()">Search Event</button>
                                 <br/>
                                 <em>Event Name: </em><input id="eventName" type="text" name="eventName">
                                 <br/>
                                 <em>Event Date: </em><input id="eventDate" type="Date" name="eventDate">
                                 <br/>
                                 <em>Event Characters: </em><input id="eventLinkCharacter" type="text" name="eventLinkCharacter">
                                 <br/>
                                 <em>Event Kingdoms: </em><input id="eventLinkKingdom" type="text" name="eventLinkKingdom">
                                 <br/>
                                 <em>Event Description :</em> <textarea id="eventDescription" type="text" name="eventDescription"></textarea>
                                 <br/>
                                 <button type="button" name="updateEventButton" class="btn btn-info" onclick ="return updateManagementEvent()"> Edit Event</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
            <div id="bottomColumn" class="col-md-1">

            </div>
        </div>

    </div>





</body>

<footer id="footer">
    &copy; Lantern 2019
</footer>
