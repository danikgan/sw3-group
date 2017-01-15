<?php
$profileImage = trim($_POST['profileImage']);
$pageImage = trim($_POST['pageImage']);
// Create some variables to hold output data
$message = '';
// Start to use PHP session
if(!isset($_SESSION))
{
    session_start();
}
include_once('connect.php');

$name = $_SESSION['name'];

try {
	$studentName = trim($_POST['studentName']);
} catch (Exception $e){
	$studentName = NULL;
}

if ($studentName != NULL) {
	$name = $studentName;
}

if ($profileImage) {
    if (strlen($profileImage) > 100 || strlen($profileImage) < 1) {
        $message = "user image must be 1-100 characters long";
    } else {
        $query = "UPDATE students SET profile_img_url='$profileImage' WHERE name='$name'";
        $conn->query($query);
    }
} 

if ($pageImage){
    if (strlen($pageImage) > 100 || strlen($pageImage) < 1) {
        $message = "user image must be 1-100 characters long";
    } else {
        $query = "UPDATE students SET page_img_url='$pageImage' WHERE name='$name'";
        $conn->query($query);
    }
}

if (! ($pageImage || $profileImage)){
	$message = "Please upload either new page image, or new profile image";
}

header('Location: settings.php');
exit;