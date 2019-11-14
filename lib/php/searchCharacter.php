<?php

    session_start();
    if (isset($_POST['SearchCharacterButton']))
    {
        include 'config.php';
        $SearchedCharacter = $conn->real_escape_string($_POST["searchCharacter"]);
        if (!empty($SearchedCharacter))
        {
            $SearchedCharacter = filter_var($SearchedCharacter, FILTER_SANITIZE_STRING);
            $query = "SELECT CharacterName FROM story_character WHERE CharacterName = '$SearchedCharacter'";
            $result = $conn->query($query);
            $data = $result->fetch_assoc();

            if ($result->num_rows > 0)
            {
                $storyArray['exit'] = 'success';
                $storyArray['returnedCharacter'] = $data;
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
