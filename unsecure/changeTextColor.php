<?php
$newUserTextColor      = trim($_POST['newUserTextColor']);
// Create some variables to hold output data
$message        = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

$username       = $_SESSION['name'];
if ($newUserTextColor) {
    if (strlen($newUserTextColor) > 200 || strlen($newUserTextColor) < 0) {
        $message = "user snippet must be 0-200 characters long";
    } else {

        $query = "UPDATE students SET snippet='$newUserTextColor' WHERE name='$username'";
        $conn->query($query);
    }

} else {
    $message = "Please enter all fields";
}

header('Location: settings.php');
exit;