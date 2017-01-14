<!DOCTYPE html>
<html>
<head>
    <title>Springfield Elementary School</title>
    <style>
        <?php include 'simpsons.css';?>
    </style>
</head>

<body>
<?php 
	include 'navigationBar.php';
	include_once('connect.php');

	$name = $_SESSION['name'];

	$rows = $conn->query("SELECT * FROM students WHERE name = '$name' LIMIT 1;");
	$row = $rows->fetch_array(MYSQLI_ASSOC);

	$profile_img_url = $row['profile_img_url'];	
	$page_img_url = $row['page_img_url'];
	$text_colour = $row['text_colour'];
	$private_snippet = $row['private_snippet'];

	if($page_img_url != NULL){
		echo '<img src="'.$page_img_url.'" alt="Invalid Logo">';
	} else {
		echo '<img src="simpsons.png">';
	}

	echo '<h1 style="color:'.$text_colour.'">Springfield Elementary Web Site</h1>';
	
	if($profile_img_url != NULL){
		echo '<img src="'.$profile_img_url.'" alt="Invalid Profile Photo">';
	}
?>

<table>
	<?php

	if(!isset($_SESSION))
	{
	    session_start();
	}

	$rows = $conn->query("SELECT * FROM snippets 
							WHERE fk_id = (SELECT id FROM students WHERE name='$name')");

	echo '<tr><th style="color:'.$text_colour.'">My Public Snippets</th></tr>';
	foreach ($rows as $row){
					$content = trim($row['content']);					
					echo
						 '<tr>
									<td style="color:'.$text_colour.'">'.$content.'</td>
						<tr>';	
	}
	//header("LOCATION: $web_url");
	?>
</table>

<?php 
	if ($private_snippet != NULL){
		echo '<table><tr><th>My Private Snippet</th></tr>';
		echo '<tr><td>'.$private_snippet.'</td></tr></table>';
	}
?>

</body>
</html>