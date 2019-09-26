<?php
	// variable con, is used to connect to the DB. 3 arguments IP, username, password.
	$con = mysqli_connect('sql2.freemysqlhosting.net','sql2305939','kV9*wE9*');

	//Local host con.
	//$con = mysqli_connect('127.0.0.1','root','');

	// error checking to see if the connection is not accepted by IP.
	if (!$con)
	{
		echo 'Not connected to server, check database connection!';
	}

	// error checking to see if the DB at the IP is selectable (access is available) to database named in 2nd argument .
	if(!mysqli_select_db($con,'sql2305939'))
	{
		echo 'Database not selected or selectable!';
	}

	//php variables that match the input field name in the html file.
	//These are sent via POST
	//$Kingdom = $_POST['kingdom'];
	//$Empire = $_POST['empire'];
	//$City = $_POST['city'];
	//$Building = $_POST['building'];
	$LocationName = $_POST['locationName'];
	$LocationType = $_POST['locationType'];
	$LocationDescription = $_POST['locationDescription'];

	if(!empty($LocationName)  && !empty($LocationType) && !empty($LocationDescription) ){

		//Sanitized variables from above, each variable uses different filters depending on variable type eg: String or Int.
		$LocationName = filter_var($LocationName, FILTER_SANITIZE_STRING);
		$LocationType = filter_var($LocationType, FILTER_SANITIZE_NUMBER_INT);
		$LocationDescription = filter_var($LocationDescription, FILTER_SANITIZE_STRING);
		$CharacterGender = filter_var($CharacterGender, FILTER_SANITIZE_STRING);
		
		
		//php variable called sql that stores the SQL insert query.
		//INSERTS INTO the locations table (Column1, Column2) the values (our previous defined variables from above)
		$sql = "INSERT INTO locations (locationName,locationType,locationDescription) VALUES ('$CharacterName','$locationName','$locationType','$locationDescription)";

		//check if the connection wasn't made and/or the the query wasn't run properly
		if (!mysqli_query($con,$sql)) 
		{
			echo 'ERROR, Data not Inserted';
		}

		else
		{
			echo 'Data Inserted';
		}

		//refresh the index page after 2 seconds.
		header("refresh:2; url=index.html");

		}

	else{
		echo 'You missed a required field';
		header("refresh:1; url=character.html");
	}


?>