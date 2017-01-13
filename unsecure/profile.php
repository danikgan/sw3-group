<!DOCTYPE html>
<html>
<head>
    <title>Springfield Elementary School</title>
    <style>
        <?php include 'simpsons.css';?>
    </style>
</head>

<body>
<?php include 'navigationBar.php';?>
<div id="logoarea">
    <img src="simpsons.png" alt="logo" />
</div>
<?php
if(!isset($_SESSION))
{
    session_start();
}

include_once('connect.php');
$username = $_SESSION['name'];

$rows = $conn->query("SELECT * FROM students WHERE name = '$username'");
$row =$result->fetch_assoc();
$image_url = trim($row['img_url']);
$is_admin  = trim($row['is_admin']);
$snippet   = trim($row['snippet']);
$text_color = trim($row['text_colour']);
//$web_url = trim($row['web_url']);

//header("LOCATION: $web_url");
?>

<h1>Springfield Elementary Web Site</h1>
<img src='<?php echo $image_url;?>' alt="Profile Picture" >
<?php echo '<p style="color: '.$text_color.'">'.$snippet.'</p>';?>


</body>
</html>