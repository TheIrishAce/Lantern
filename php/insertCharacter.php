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
	$CharacterName = $_POST['characterName'];
	$CharacterAge = $_POST['characterAge'];
	$CharacterDob = $_POST['characterDob'];
	$CharacterGender = $_POST['characterGender'];
	$CharacterRace = $_POST['characterRace'];
	$CharacterPersonality = $_POST['characterPersonality'];
	$CharacterAppearance = $_POST['characterAppearance'];
	$CharacterSpecies = $_POST['characterSpecies'];

	if(!empty($CharacterName)  && !empty($CharacterAge) && !empty($CharacterDob) && !empty($CharacterGender) && !empty($CharacterRace) && !empty($CharacterPersonality) && !empty($CharacterAppearance) && !empty($CharacterSpecies)){

		//Sanitized variables from above, each variable uses different filters depending on variable type eg: String or Int.
		$CharacterName = filter_var($CharacterName, FILTER_SANITIZE_STRING);
		$CharacterAge = filter_var($CharacterAge, FILTER_SANITIZE_NUMBER_INT);
		$CharacterDob = filter_var($CharacterDob, FILTER_SANITIZE_STRING);
		$CharacterGender = filter_var($CharacterGender, FILTER_SANITIZE_STRING);
		$CharacterRace = filter_var($CharacterRace, FILTER_SANITIZE_STRING);
		$CharacterPersonality = filter_var($CharacterPersonality, FILTER_SANITIZE_STRING);
		$CharacterAppearance = filter_var($CharacterAppearance, FILTER_SANITIZE_STRING);
		$CharacterSpecies = filter_var($CharacterSpecies, FILTER_SANITIZE_STRING);
		
		//php variable called sql that stores the SQL insert query.
		//INSERTS INTO the locations table (Column1, Column2) the values (our previous defined variables from above)
		$sql = "INSERT INTO characters (CharacterName,CharacterAge,CharacterDob,CharacterGender,CharacterRace,CharacterPersonality,CharacterAppearance,CharacterSpecies) VALUES ('$CharacterName','$CharacterAge','$CharacterDob','$CharacterGender','$CharacterRace','$CharacterPersonality','$CharacterAppearance','$CharacterSpecies')";

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
	
	/*
	$CharacterName = mysqli_real_escape_string($_POST['characterName']);
	$CharacterAge = intval($_POST['CharacterAge']);
	$CharacterDob = mysqli_real_escape_string($_POST['characterDob']);
	$CharacterGender = mysqli_real_escape_string($_POST['CharacterGender']);
	$CharacterRace = mysqli_real_escape_string($_POST['characterRace']);
	$CharacterPersonality = mysqli_real_escape_string($_POST['CharacterPersonality']);
	$CharacterAppearance = mysqli_real_escape_string($_POST['characterAppearance']);
	$CharacterSpecies = mysqli_real_escape_string($_POST['CharacterSpecies']);
	*/
?>