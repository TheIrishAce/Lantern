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
  <link rel="stylesheet" type="text/css" href="css/custom/creation.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">
</head>
<body>
  <div class="container-fluid">
    <div id="navIncludedContent"></div>
    <div class="row">
      <div id="topColumn" class="col-md-1"></div>
      <div id="midColumn" class="col-md-10">
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Character Creation
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <form id="characterInputBoxes" action="lib/php/insertCharacter.php" method="post">
                  <em>Character Name :</em> <input type="text" name="characterName">
                  <br/>
                  <em>Character Age :</em> <input type="number" name="characterAge">
                  <br/>
                  <em>Character DOB :</em> <input type="date" name="characterDob">
                  <br/>
                  <em>Character Gender :</em> <input type="text" name="characterGender">
                  <br/>
                  <em>Character Race :</em> <input type="text" name="characterRace">
                  <br/>
                  <em>Character Personality :</em> <textarea type="text" name="characterPersonality"></textarea>
                  <br/>
                  <em>Character Appearance :</em> <textarea type="text" name="characterAppearance"></textarea>
                  <br/>
                  <em>Character Species :</em> <input type="text" name="characterSpecies">
                  <br/>
                  <input type="submit" value="Create Character">
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Location Creation
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body form-group">
                <form id="locationInputBoxes" action="lib/php/insertLocation.php" method="post">
                  <div class="form-group">
                    <em>Location Name :</em> <input type="text" name="locationName">
                    <br/>
                    <em>Location Type :</em>
                    <select name="locationType">
                      <option value="kingdom">Kingdom</option>
                      <option value="empire">Empire</option>
                      <option value="city">City</option>
                      <option value="building">Building</option>
                    </select>
                    <br/>
                    <em>Location Description :</em> <input type="text" name="locationDescription">
                    <br/>
                    <input type="submit" value="Create Location">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Event Creation
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <form id="eventInputBoxes" action = "lib/php/insertEvent.php" method ="post">
                  <em>Event Name: </em><input type="text" name="eventName">
                  <br/>
                  <em>Event Date: </em><input type="Date" name="eventDate">
                  <br/>
                  <em>Event Description :</em> <textarea type="text" name="eventDescription"></textarea>
                  <br/>
                  <input type="submit" name="Create Event" value ="Create Event">
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
