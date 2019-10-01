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
?>
