<?php
//Local host for DEBUGING.
//$conn = mysqli_connect('127.0.0.1','root','');

// 4 arguments IP, username, password, schema.
$hostname = 'zwgaqwfn759tj79r.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$username = 'pgucq3rzgknilr0v';
$password = 's6kw31seob0c22s3';
$database = 'udnln55v3aodpcyp';

// Create connection using 4 arugments from above
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection is created
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connection was successfully established!";
?>
