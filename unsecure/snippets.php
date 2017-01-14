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
			<tr><th>Name</th><th>Snippet</th></tr>

			<?php
			include_once('connect.php');
			if(!isset($_SESSION))
			{
				session_start();
			}
			$name = $_SESSION["name"];

			$rows = $conn->query('SELECT content, s.name as name, s.text_colour as text_colour FROM snippets JOIN students s ON snippets.fk_id = s.id');

			foreach ($rows as $row) {
				$text_color = trim($row['text_colour']);

				$snippet = trim($row['content']);
				$student_name = trim($row['name']);

				echo
					 '<tr>
								<td style="color: '.$text_color.'">'.$student_name.'</td>
								<td style="color: '.$text_color.'">'.$snippet.'</td>
					<tr>';
			}
			?>
		</table>

</body>
</html>