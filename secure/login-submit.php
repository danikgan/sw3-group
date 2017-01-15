<?php
$name = $_GET["name"];
$pw = $_GET["password"];

if (is_correct_password($name, $pw)) {
	
	$_SESSION["name"] = $name;
	header("Location: profile.php?id=".$_SESSION['id']."&password=$pw");
	die();
} else {
	header("Location: login.php");
	die();
}

# query database to see if user typed the right password
function is_correct_password($name, $pw) {
	include_once('connect.php');
	
	$rows = mysqli_query($conn, "SELECT id, name, password, is_admin FROM students WHERE name = '$name' AND password = '$pw' LIMIT 1");
	
	if(mysqli_num_rows($rows) > 0){
		session_start();

		$row = $rows->fetch_array(MYSQLI_ASSOC);
		$_SESSION["id"] = $row['id'];
		$_SESSION["is_admin"] = $row['is_admin'];
		return TRUE;	
	}

	return FALSE;
}
?>
