<?php
$name = preg_replace("/[^A-Za-z0-9 ]/", '',$_POST['studentName']);
$can_create_snippet = preg_replace("/[^A-Za-z0-9 ]/", '',$_POST['can_create_snippet']);

// Create some variables to hold output data
$message = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

if($can_create_snippet && $name){
    $query = "UPDATE students SET can_create_snippet = '$can_create_snippet' WHERE name='$name'";
    $rows = $conn->query($query);
}   

if (!($can_create_snippet && $name)){
	$message = "Fill in either private Snippet or new snippet form.";
}

header('Location: settings.php');
exit;