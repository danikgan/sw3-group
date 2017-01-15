<?php
include_once('connect.php');

$name = $_POST['name'];
$pw = $_POST['password'];

$sql = "INSERT INTO students (name, password) VALUES ('$name', '$pw');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
