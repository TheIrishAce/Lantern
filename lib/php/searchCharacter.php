<?php

    session_start();
    if (isset($_POST['SearchCharacterButton']))
    {
        include 'config.php';
        $SearchedCharacter = $conn->real_escape_string($_POST["searchCharacter"]);
        if (!empty($SearchedCharacter))
        {
            $SearchedCharacter = filter_var($SearchedCharacter, FILTER_SANITIZE_STRING);
            $query = "SELECT * FROM story_character WHERE CharacterName = '$SearchedCharacter'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();
            $CharacterName = $data['CharacterName'];
            $CharacterAge = $data['CharacterAge'];

            if ($result->num_rows > 0)
            {
                $storyArray['exit'] = 'success';
                $storyArray['returnedCharacterName'] = $CharacterName;
                $storyArray['returnedCharacterAge'] = $CharacterAge;
                //echo('success');
                echo json_encode($storyArray);

            }

            else
            {
                exit('failed');
            }
            exit();
        }
    }
?>
