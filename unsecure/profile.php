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
	$page_img_url = trim($row['page_img_url']);
	$text_color = trim($row['text_colour']);
	$true = $page_img_url == NULL;
	
	if($page_img_url != NULL){
		echo '<img src="'.$page_img_url.'" alt="Invalid Logo">';
	} else {
		echo '<img src="simpsons.png">';
	}

	echo '<h1>Springfield Elementary Web Site</h1>';
	
	if($profile_img_url != NULL){
		echo '<img src="'.$profile_img_url.'" alt="Invalid Profile Photo">';
	}
?>

<table>
	<tr><th>Content</th></tr>
	<?php
	if(!isset($_SESSION))
	{
	    session_start();
	}

	$rows = $conn->query("SELECT * FROM snippets 
							WHERE fk_id = (SELECT id FROM students WHERE name='$name')");
	foreach ($rows as $row){
					$content = trim($row['content']);					
					echo
						 '<tr>
									<td>'.$content.'</td>
						<tr>';	
	}
	//header("LOCATION: $web_url");
	?>
</table>



</body>
</html>