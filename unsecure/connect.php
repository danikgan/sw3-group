<?php
$servername = "localhost";
$username = "dev";
$password = "0g14ju";
$dbname = "simpsons";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>