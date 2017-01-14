<!DOCTYPE html>
<html>
	<!--
	CSE 190 M, Spring 2012
	-->
	<head>
		<title>Springfield Elementary School</title>
		<link href="simpsons.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<div id="logoarea">
			<img src="simpsons.png" alt="logo" />
		</div>

		<h1>Springfield Elementary Web Site</h1>

		<ul>
			<li><a href="login.php">Log In</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
<hr>
		<table>
			<tr><th>Name</th><th>Latest Snippet</th></tr>
			<?php
			include_once('connect.php');
			if(!isset($_SESSION))
			{
				session_start();
			}
			$name = $_SESSION["name"];

			$query = 'SELECT content, s.name as name, s.text_colour as text_colour
						FROM   (
						       SELECT (
						              SELECT  id
						              FROM    snippets s1
						              WHERE   s1.fk_id = t1.fk_id
						              ORDER BY
						                      s1.id DESC
						              LIMIT 1
						              ) lid
						       FROM   (
						              SELECT  DISTINCT fk_id
						              FROM    snippets
						              ) t1
						       ) ro, snippets t2
						JOIN students s ON t2.fk_id = s.id
						WHERE  t2.id = ro.lid';

			$rows = $conn->query($query);

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
