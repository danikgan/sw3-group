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
$name = $_SESSION['name'];

try {
    $studentName = trim($_POST['studentName']);
} catch (Exception $e){
    $studentName = NULL;
}


if ($studentName != NULL) {
    $query = "UPDATE students SET password='$newpassword' WHERE name='$studentName'";
    $conn->query($query);
    header('Location: settings.php');
    exit;
}

if (isset($_POST['newpassword']) && isset($_POST['repeatpassword'])) {
    if ($repeatpassword == $newpassword) {
        $result = $conn->query("SELECT password FROM students WHERE name = '".$name."'");
        if (strlen($newpassword) > 25 || strlen($newpassword) < 6) {
            $message = "Password must be 6-25 characters long";
        } else {
            $row =$result->fetch_assoc();
            $passwordcheck = trim($row['password']);
            if($passwordcheck==$password) {
                $query = "UPDATE students SET password='$newpassword' WHERE name='$name'";
                $conn->query($query);
            }

        }
    } else {
        $message = "Password must match";
    }
} else {
    $message = "Please enter all fields";
}

//header('Location: settings.php');
//exit;

?>