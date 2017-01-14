<?php
$newUserSnippet = $_POST['newUserSnippet'];
$privateSnippet = $_POST['privateSnippet'];

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

if ($newUserSnippet) {
    if (strlen($newUserSnippet) > 200 || strlen($newUserSnippet) < 0) {
        $message = "user snippet must be 0-200 characters long";
    } else {

    	$query = "SELECT can_create_snippet FROM students WHERE name = '".$_SESSION['name']."' LIMIT 1;";
    	$result = $conn->query($query);
    	$row = $result->fetch_array(MYSQLI_ASSOC);
    	$can_create_snippet = $row['can_create_snippet'];

    	if($can_create_snippet == 0){
    		header('Location: settings.php');
    		//Some message that you FAILED.
			exit;
    	}

        $query = "INSERT INTO snippets (content, date_posted, fk_id) SELECT '$newUserSnippet', CURDATE(), id FROM students WHERE name = '$name'";
        $conn->query($query);
    }
} 

if ($privateSnippet) {
    if (strlen($newUserSnippet) > 200 || strlen($newUserSnppet) < 0) {
        $message = "user snippet must be 0-200 characters long";
    } else {
        $query = "UPDATE students SET private_snippet = '$privateSnippet' WHERE name = '$name'";
        $conn->query($query);
    }	
}

if (!($privateSnippet || $newUserSnippet)){
	$message = "Fill in either private Snippet or new snippet form.";
}

header('Location: settings.php');
exit;