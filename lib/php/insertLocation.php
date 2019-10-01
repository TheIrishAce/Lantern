<?php
	include 'config.php';
	//php variables that match the input field name in the html file.
	//These are sent via POST
	$LocationName = $_POST['locationName'];
	$LocationType = $_POST['locationType'];
	$LocationDescription = $_POST['locationDescription'];

	if(!empty($LocationName)  && !empty($LocationType) && !empty($LocationDescription) ){

		//Sanitized variables from above, each variable uses different filters depending on variable type eg: String or Int.
		$LocationName = filter_var($LocationName, FILTER_SANITIZE_STRING);
		$LocationType = filter_var($LocationType, FILTER_SANITIZE_STRING);
		$LocationDescription = filter_var($LocationDescription, FILTER_SANITIZE_STRING);


		//php variable called sql that stores the SQL insert query.
		//INSERTS INTO the locations table (Column1, Column2) the values (our previous defined variables from above)
		$sql = "INSERT INTO locations (LocationName,LocationType,LocationDescription) VALUES ('$LocationName','$LocationType','$LocationDescription')";

		//using config.php check if the connection wasn't made and/or the the query wasn't run properly
		if (!mysqli_query($con,$sql))
		{
			echo 'ERROR, Data not Inserted';
		}

		else
		{
			echo 'Data Inserted';
		}

		//refresh the index page after 2 seconds.
		header("refresh:2; url=location.html");

		}

	else{
		echo 'You missed a required field';
		header("refresh:1; url=character.html");
	}


?>
