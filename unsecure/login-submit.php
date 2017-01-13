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
	print "--,.--;;;;;;;;;";
}

# query database to see if user typed the right password
function is_correct_password($name, $pw) {
	$db = new PDO("mysql:dbname=simpsons", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$rows = $db->query("SELECT * FROM students WHERE name = '$name' and password = '$pw'");
	
	if(!empty($rows))
		return True;	

	$rows = $db->query("SELECT * FROM teachers WHERE name = '$name' and password = '$pw'");
	
	if(!empty($rows))
		return True;	

	return FALSE;
}
?>
