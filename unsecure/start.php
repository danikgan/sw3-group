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
			<li><a href="snippets.php">Public Snippets</a></li>
		</ul>
		<hr>
		<h3>List of Users</h3>
		<table>
			<tr><th>Name</th></tr>
			<?php
			include_once('connect.php');
			$_SESSION['name'] = NULL;

			$rows = $conn->query('SELECT name FROM students');

			foreach ($rows as $row) {
				$student_name = trim($row['name']);

				echo
					 '<tr>
								<td>'.$student_name.'</td>
					<tr>';
			}
			?>
		</table>
		<hr>
		<h3>Latest Snippets by each users (Blank means no snippet)</h3>
		<table>
			<tr><th>Name</th><th>Latest Snippet</th></tr>
			<?php
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
