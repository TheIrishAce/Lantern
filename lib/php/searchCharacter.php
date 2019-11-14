<?php

    session_start();
    if (isset($_POST['SearchCharacterButton']))
    {
        include 'config.php';
        $SearchedCharacter = $conn->real_escape_string($_POST["searchCharacter"]);
        if (!empty($searchedCharacter))
        {
            $SearchedCharacter = filter_var($SearchedCharacter, FILTER_SANITIZE_STRING);
            $query = "SELECT StoryCharacter FROM story_character WHERE CharacterName = '$SearchedCharacter'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();

            if ($result->num_rows > 0)
            {
                $storyArray['exit'] = 'success';
                $storyArray['returnedCharacter'] = $data;
                echo json_encode($storyArray);
                //exit('success');
            }

            else
            {
                exit('failed');
            }

            exit();



        }

    }


?>