<?php
$name = $_POST["name"];
$pw = $_POST["password"];

if (is_correct_password($name, $pw)) {
	# redirect?
	session_start();
	$_SESSION["name"] = $name;
	header("Location: grades.php");
	die();
} else {
	header("Location: login.php");
}

# query database to see if user typed the right password
function is_correct_password($name, $pw) {
	include_once('connect.php');
	
	$rows = mysqli_query($conn, "SELECT name, password FROM students WHERE name = '$name' AND password = '$pw'");
	
	if(mysqli_num_rows($rows) > 0){
		return TRUE;	
	}

	$rows = $conn->query($conn, "SELECT name, password FROM teachers WHERE name = '$name' AND password = '$pw'");
	
	if(mysqli_num_rows($rows) > 0){
		return TRUE;	
	}

	return FALSE;
}
?>
