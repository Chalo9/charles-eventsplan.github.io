<?php
$servername = "localhost";
$username = "root";
$password = "chalo";
$db_name = "revswings_events";

// Create the database connection
$connection = mysqli_connect($servername, $username, $password, $db_name);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
