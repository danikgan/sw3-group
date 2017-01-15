<?php
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
    $fileName = $_FILES['userfile']['name'];
    $tmpName  = $_FILES['userfile']['tmp_name'];

    if(!isset($_SESSION)){
        session_start();
    }
    // UPLOAD ONTO THE DIRECTORY
    if(!file_exists($_SESSION['id']."/")){
        // If this returns Permission denied, try to chmod -R 775 {.../SimpsonSecure/unsecure/}. If it doesn't work, try 777. Be carful, it opens up the RW perm to the world.
        mkdir($_SESSION['id']."/", 0777, true);  //This opens up the directory to the world.
    }

    move_uploaded_file($tmpName, $_SESSION['id']."/".$fileName);

    // $fileSize = $_FILES['userfile']['size'];
    // $fileType = $_FILES['userfile']['type'];

    // $fp      = fopen($tmpName, 'r');
    // $content = fread($fp, filesize($tmpName));
    // $content = addslashes($content);
    // fclose($fp);

    // if(!get_magic_quotes_gpc())
    // {
    //     $fileName = addslashes($fileName);
    // }

    // include_once('connect.php');
    // $username = $_SESSION['name'];

    // $result = $conn->query("SELECT * FROM students WHERE name = '".$username."'");
    // $row =$result->fetch_assoc();
    // $foreignID = trim($row['id']);

    // $query = "INSERT INTO upload ".
    //     "VALUES (NULL,'$fileName', '$fileSize', '$fileType', '$content','$foreignID')";

    // $conn->query($query) or die('Error, query failed');

    echo "<br>File $fileName uploaded<br>";
}
?>