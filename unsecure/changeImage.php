<?php
$newUserImage      = trim($_POST['newUserImage']);
// Create some variables to hold output data
$message        = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

$username       = $_SESSION['name'];
if ($newUserImage) {
    if (strlen($newUserImage) > 100 || strlen($newUserImage) < 1) {
        $message = "user image must be 1-100 characters long";
    } else {

        $query = "UPDATE students SET img_url='$newUserImage' WHERE name='$username'";
        $conn->query($query);
    }

} else {
    $message = "Please enter all fields";
}

header('Location: settings.php');
exit;