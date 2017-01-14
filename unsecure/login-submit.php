<?php
$name = $_POST["name"];
$pw = $_POST["password"];

if (is_correct_password($name, $pw)) {
	# redirect?
	
	$_SESSION["name"] = $name;
	header("Location: grades.php");
	die();
} else {
	header("Location: login.php");
}

# query database to see if user typed the right password
function is_correct_password($name, $pw) {
	include_once('connect.php');
	
	$rows = mysqli_query($conn, "SELECT name, password, is_admin FROM students WHERE name = '$name' AND password = '$pw' LIMIT 1");
	
	if(mysqli_num_rows($rows) > 0){
		session_start();

		$row = $rows->fetch_array(MYSQLI_ASSOC);

		$_SESSION["is_admin"] = $row['is_admin'];
		return TRUE;	
	}

	return FALSE;
}
?>
