<?php
$name = $_POST['studentName'];
$is_admin = $_POST['is_admin'];

// Create some variables to hold output data
$message = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

if(isset($is_admin) && isset($name)){
    $query = "UPDATE students SET is_admin = '$is_admin' WHERE name='$name'";
    $rows = $conn->query($query);
}   

if (!($is_admin && $name)){
	$message = "Fill in either private Snippet or new snippet form.";
}

header('Location: settings.php');
exit;