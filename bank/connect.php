
<?php

// Localhost
$localServerName = "localhost";
$localUsername = "root";
$localPassword = "";
// Workbench
$workbenchServerName = "118.69.190.29";
$workbenchUsername = "opensips";
$workbenchPassword = "opensipsrw";
//------------------------------------------------------------------

$servername = $localServerName;
$database = "net_banking";



$username = $localUsername;
$password = $localPassword;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>