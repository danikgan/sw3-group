<?php
include_once('connect.php');

$name = $_POST['name'];
$pw = $_POST['password'];
$email = $_POST['email'];

$sql = "INSERT INTO students (id, name, email, password) VALUES (NULL, '$name', '$email', '$pw');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>