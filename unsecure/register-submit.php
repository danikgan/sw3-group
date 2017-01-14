<?php
include_once('connect.php');

$name = $_POST['name'];
$pw = $_POST['password'];

$sql = "INSERT INTO students (id, name, password) VALUES (NULL, '$name', '$pw');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
