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
	<link rel="images/Lantern.png">
</head>

<body>
  <script>
    $(function(){
      $("#navIncludedContent").load("navbar.html");
    });
  </script>
    <div class="container-fluid">
      <div id="navIncludedContent"></div>
		<div id="topRow" class="row">
			<div class="col-lg-1"></div>
			<div id="topRowParagraph" class="col-lg-5">
				<p>	Lantern is an advanced story manager with book authors in mind.
				<br/>Lantern will allow our users to create characters, locations and events and link those as you type.
				<br/>This helps prevent plot holes and other problems authors potentially face and best of all stops the nightmare that is scraps of paper.

				</p>
			</div>
			<div class="col-lg-5">
				<img id="topRowImage" src="images/books.jpg" class="img-fluid rounded" alt="Responsive image">
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div id="midRow" class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-5">
				<img id="midRowImage" src="images/placeholder-image.png" class="img-fluid rounded" alt="Responsive image">
			</div>
			<div id="midRowParagraph" class="col-lg-5">
				<p>	Placeholder Paragraph.</p>
			</div>
			<div class="col-lg-1"></div>
		</div>
		<div id="bottomRow" class="row">
			<div class="col-lg-1"></div>
			<div id="bottomRowParagraph" class="col-lg-5">
				<p>	Placeholder Paragraph.</p>
			</div>
			<div class="col-lg-5">
				<img id="bottomRowImage" src="images/placeholder-image.png" class="img-fluid rounded" alt="Responsive image">
			</div>
			<div class="col-lg-1"></div>
		</div>
	</div>
</body>

<footer id="footer">
	&copy; Lantern 2019
</footer>
</html>
