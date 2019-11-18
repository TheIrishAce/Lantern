<?php

  if (isset($_POST['register-submit'])) {
    include 'config.php';
    $username = $_POST['AccountUsername'];
    $email = $_POST['AccountEmail'];
    $password = $_POST['AccountPassword'];
    $passwordRepeat = $_POST['ConfirmPassword'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat))
    {
      header("Location: ../../register.html?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
      header("Location: ../../register.html?error=invalidemailuid=");
      exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      header("Location: ../../register.html?error=invalidemail&uid=".$username);
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
      header("Location: ../../register.html?error=uid&email=".$email);
      exit();
    }
    else if ($password !== $passwordRepeat) {
      header("Location: ../../register.html?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();
    }
    else {
      $sql = "SELECT AccountUsername FROM site_account WHERE AccountUsername=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql))
      {
        header("Location: ../../register.html?error=sqlaccountselectionerror");
        exit();
      }
      else
      {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0)
        {
          header("Location: ../../register.html?error=usertaken&email=".$email);
          exit();
        }
        else
        {
          $sql = "INSERT INTO site_account (AccountUsername, AccountEmail, AccountPassword) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql))
          {
            header("Location: ../../register.html?error=sqlaccountinsertionerror");
            exit();
          }
          else
          {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            printf($username);
            printf($email);
            printf($hashedPwd);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../../register.html?register=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else
  {
    header("Location: ../../register.html");
    exit();
  }

?>
