<?php
if (isset($_POST['login-submit'])) {
  require '../config.php';

  $mailusername = $_POST['AccountUsernameEmail'];
  $password = $_POST['AccountPassword'];

  if (empty($mailusername) || empty($password)) {
    header("Location: ../../../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT * FROM site_account WHERE AccountUsername=? OR AccountEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../../../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailusername, $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['AccountPassword']);
        if ($pwdCheck == false) {
          header("Location: ../../../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['userId'] = $row['AccountId'];
          $_SESSION['userUid'] = $row['AccountUsername'];

          header("Location: ../../../index.php?login=success");
          exit();
        }
        else {
          // code...
        }
      }
      else {
        header("Location: ../../../index.php?error=nouser");
        exit();
      }

    }
  }


}
else {
  header("Location: ../../../index.php");
  exit();
}
?>
