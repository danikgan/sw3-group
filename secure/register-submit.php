<?php
include_once('connect.php');

$name = $_POST['name'];
$pw = $_POST['password'];

$query = "SELECT * FROM students WHERE name = '$name';";
$result = $conn->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['name']!=$name) {

    $sql = "INSERT INTO students (name, password) VALUES ('$name', '$pw');";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}else{
    echo "error: name already exists";
}
?>
