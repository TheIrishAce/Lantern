<?php
//session_start();
require 'lib/php/config.php';
require 'navbar.php';

?>
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
  <link rel="stylesheet" type="text/css" href="css/custom/author.css">

	<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Compromise NLP interation -->
  <script src="https://unpkg.com/compromise@latest/builds/compromise.min.js"></script>
  <script type="text/javascript" src="js/custom/authorFunctionality.js"></script>
  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">
</head>

<body>
   <div class="container-fluid">
     <div id="navIncludedContent"></div>
       <div id="text-linking-container" class="row">
         <div class="col-lg-1 text-center">
           <div id="authorButtons">
             <button type="button" name="save" class="btn btn-success btn-block" onclick="return insertStory()">Save</button>
             <button type="button" id="loadStory" name="load" class="btn btn-primary btn-block" onclick="return fetchStory()">Load</button>
             <script type="text/javascript" src="js/custom/authorNLP.js"></script>
             <script type="text/javascript">
             $( document ).ready(function() {
               $("#writingArea").val('');
             });
             $("#loadStory").click(function(){
               existingStoryCharacterNLP();
             });
             </script>

           </div>
         </div>
  		     <div id="wordPad" class="col-md-6">Typing Field
             <form method="post" action="lib/php/interactStory.php"> <!-- !!(insertStory() &  -->
               <textarea type="text" id="writingArea" name="storyType" rows="20" cols="50" placeholder="Begin your story here...">
               </textarea>
               <br>
             </form>
  		     </div>
           <div id="refrences" class="col-md-4">Linking Area</div>
         </div>
         <div class="col-lg-1"></div>
     </div>
</body>

  <footer id="footer">
    &copy; Lantern 2019
  </footer>
</html>
