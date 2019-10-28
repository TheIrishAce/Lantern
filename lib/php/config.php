<?php
// variable con, is used to connect to the DB. 3 arguments IP, username, password.
$con = mysqli_connect('zwgaqwfn759tj79r.chr7pe7iynqr.eu-west-1.rds.amazonaws.com','pgucq3rzgknilr0v','s6kw31seob0c22s3');

//Local host con.
//$con = mysqli_connect('127.0.0.1','root','');

// error checking to see if the connection is not accepted by IP.
if (!$con)
{
  echo 'Not connected to server, check database connection!';
}

// error checking to see if the DB at the IP is selectable (access is available) to database schema named in 2nd argument .
if(!mysqli_select_db($con,'udnln55v3aodpcyp'))
{
  echo 'Database not selected or selectable!';
}
?>
