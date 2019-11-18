<?php
//session_start();
require "navbar.php";
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
  <link rel="stylesheet" type="text/css" href="css/custom/index.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <title>Lantern</title>
  <link rel="icon" href="images/Lantern.png">
</head>

<body>
  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }
          else {
            echo '<p class="login-status">You are logged in!</p>';
          }
        ?>


      </section>
    </div>

  </main>
  <div class="container-fluid">
    <div id="navIncludedContent"></div>
    <div id="index-banner" class="position-relative overflow-hidden p-3 p-md-5 text-center bg-light">
      <div class="banner-images">
        <img class="book-img-01 shadow-sm d-none d-md-block shadow p-3 mb-5 bg-lightgrey rounded" src="images/sample_script.jpg">
        <img class="book-img-02 shadow-sm d-none d-md-block shadow p-3 mb-5 bg-lightgrey rounded" src="images/books.jpg">
      </div>
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1>Lantern</h1>
        <h5>The advanced story creator.<h5>
        </div>
      </div>
      <div id="topRow" class="row">
        <div class="col-lg-4 position-relative overflow-hidden p-3 p-md-5 text-center bg-light">
          <img class="rounded-circle" src="images/register.png" height="140px" width="140px">
          <rect width="100%" height="100%" fill="#777"></rect>
          <h2>Register Now</h2>
          <p>Want to try Lantern? <br> Make sure to make a free account and give it a try.</p>
          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
        </div>

        <div class="col-lg-4 position-relative overflow-hidden p-3 p-md-5 text-center bg-light">
          <img class="rounded-circle" src="images/author.jpg" height="140px" width="140px">
          <rect width="100%" height="100%" fill="#777"></rect>
          <h2>What is Lantern?</h2>
          <p>Lantern is an advanced story creator with authors in mind. <br> Lantern allows our users to create characters, locations and events and link those as you type. This by design helps mitigate plot holes and other problems authors potentially face and best of all stops the nightmare that is scraps of paper and note taking.</p>
          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
        </div>

        <div class="col-lg-4 position-relative overflow-hidden p-3 p-md-5 text-center bg-light">
          <img class="rounded-circle" src="images/books.jpg" height="140px" width="140px">
          <rect width="100%" height="100%" fill="#777"></rect>
          <h2>Have any questions?</h2>
          <p>Feel free to email us and we'll get back to you as soon as possible.</p>
          <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
        </div>
      </div>
    </div>
  </body>

  <footer id="footer">
    &copy; Lantern 2019
  </footer>
  </html>
