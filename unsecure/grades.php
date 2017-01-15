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

		<h2>Your grades:</h2>

		<table>
			<tr><th>Course Name</th><th>Grade</th></tr>

			<?php
			include_once('connect.php');
			if(!isset($_SESSION))
			{
				session_start();
			}
			$name = $_SESSION["name"];
			$query = "SELECT c.name, g.grade
			          FROM students s
			          JOIN grades g ON g.student_id = s.id
			          JOIN courses c ON g.course_id = c.id
			          WHERE s.name = '$name'";
			// $db = new PDO("mysql:dbname=simpsons", "root", "");
			// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rows = $conn->query($query);
			foreach ($rows as $row) {
				?>

				<tr>
					<td>
						<?= $row["name"] ?>
					</td>

					<td>
						<?= $row["grade"] ?>
					</td>
				</tr>

				<?php
			}
			?>

		</table>
	</body>
</html>
