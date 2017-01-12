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
<h1>Springfield Elementary Web Site</h1>

<div style="position:relative;">
	<div style="position:absolute; left:0%; width:50%; height:100%;">
		<h2>
			<?php 	
				$name = ucfirst($_SESSION["name"]); 
				echo $name;
			?>
		</h2>
		<img src="./images/<?echo $name?>.JPG" height="300" width="300" alt="<?echo $name?>">
	</div>
	<div style="position:absolute; left:50%; width:50%; height:100%;">
		<h2>Snippet</h2>
		<p>
			<?
				if(!isset($_SESSION))
				{
					session_start();
				}
				$query = "SELECT snippet FROM students s WHERE s.name = $name";
	          	$db = new PDO("mysql:dbname=simpsons", "root", "");
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo $db->query($query);
			?>	
		</p>
	</div>
</div>

</body>
</html>