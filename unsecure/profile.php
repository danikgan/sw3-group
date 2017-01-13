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
<table>
	<tr><th>Content</th></tr>
	<?php
	if(!isset($_SESSION))
	{
	    session_start();
	}

	include_once('connect.php');
	$name = $_SESSION['name'];

	$rows = $conn->query("SELECT * FROM students WHERE name = '$username'");
	$row =$rows->fetch_assoc();
	$image_url = trim($row['img_url']);	
	$text_color = trim($row['text_colour']);
	//$web_url = trim($row['web_url'])

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

<h1>Springfield Elementary Web Site</h1>
<img src='<?php echo $image_url;?>' alt="Profile Picture" >

</body>
</html>