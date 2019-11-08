<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $AccountUsername = mysqli_real_escape_string($con,$_POST['AccountUsername']);
    $AccountPassword = mysqli_real_escape_string($con,$_POST['AccountPassword']);

    if ($AccountUsername != "" && $AccountPassword != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$AccountUsername."' and AccountPassword='".$AccountPassword."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['AccountUsername'] = $AccountUsername;
            header('Location: author.html');
        }else{
            echo "Invalid username and password";
        }

    }

}