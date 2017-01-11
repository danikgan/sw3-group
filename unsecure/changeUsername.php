<?php
$newUserName       = trim($_POST['newUserName']);
// Create some variables to hold output data
$message        = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

$username       = $_SESSION['name'];
if ($newUserName) {
    if (strlen($newUserName) > 15 || strlen($newUserName) < 2) {
        $message = "user name must be 2-15 characters long";
    } else {
        // check whether username exists
        $query    = "SELECT name FROM students WHERE name='$username'";
        $result = $conn->query($query);
        //if theres a result change password to new password
        if ($row = mysqli_fetch_array($result)) {
            $query          = "UPDATE students SET name='$newUserName' WHERE name='$username'";
            $conn->query($query);
            $_SESSION['name'] = $newUserName;
            $message = "<strong>Name change successful!</strong>";
        } else {
            $message = "User account not found.";
        }
        mysqli_free_result($result);
    }

} else {
    $message = "Please enter all fields";
}

header('Location: settings.php');
exit;