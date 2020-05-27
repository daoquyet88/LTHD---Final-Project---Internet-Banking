
<?php


$servername = "118.69.190.29";
$database = "net_banking";



$username = "opensips";
$password = "opensipsrw";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>