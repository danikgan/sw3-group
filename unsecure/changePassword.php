<?php
// Grab the form data
$password       = trim($_POST['password']);
$newpassword    = trim($_POST['newpassword']);
$repeatpassword = trim($_POST['repeatpassword']);
// Create some variables to hold output data
$message        = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}

include_once('connect.php');
//clean the input now that we have a db connection
$username = $_SESSION['name'];
if ($password && $newpassword) {
    if ($repeatpassword == $newpassword) {
        if (strlen($newpassword) > 25 || strlen($newpassword) < 6) {
            $message = "Password must be 6-25 characters long";
        } else {
            // check whether username exists
            $query    = "SELECT * FROM students WHERE name='$username' and password='$password'";
            $result = $conn->query($query);
            //if theres a result change password to new password
            if ($row = mysqli_fetch_array($result)) {
                $query          = "UPDATE students SET password='$newpassword' WHERE name='$username'";
                $conn->query($query);
                $message = "<strong>Password change successful!</strong>";
            } else {
                $message = "User account not found.";
            }
            mysqli_free_result($result);
        }
    } else {
        $message = "Password must match";
    }
} else {
    $message = "Please enter all fields";
}

header('Location: settings.php');
exit;

?>