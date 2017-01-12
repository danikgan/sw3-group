<?php
$newUserSnippet      = trim($_POST['newUserSnippet']);
// Create some variables to hold output data
$message        = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

$username       = $_SESSION['name'];
if ($newUserSnippet) {
    if (strlen($newUserSnippet) > 200 || strlen($newUserSnppet) < 0) {
        $message = "user snippet must be 0-200 characters long";
    } else {

        $query = "UPDATE students SET snippet='$newUserSnippet' WHERE name='$username'";
        $conn->query($query);
    }

} else {
    $message = "Please enter all fields";
}

header('Location: settings.php');
exit;