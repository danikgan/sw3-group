<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];

    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);

    if(!get_magic_quotes_gpc())
    {
        $fileName = addslashes($fileName);
    }

    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once('connect.php');
    $username = $_SESSION['name'];

    $result = $conn->query("SELECT * FROM students WHERE name = '".$username."'");
    $row =$result->fetch_assoc();
    $foreignID = trim($row['id']);

    $query = "INSERT INTO upload ".
        "VALUES (NULL,'$fileName', '$fileSize', '$fileType', '$content','$foreignID')";

    $conn->query($query) or die('Error, query failed');

    echo "<br>File $fileName uploaded<br>";
}
?>