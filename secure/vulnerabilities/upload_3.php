<?php include("../connect.php");

	$query = "SELECT id, name FROM students";
	$rows = $conn->query($query);

	foreach($rows as $row){

		if(file_exists('../'.$row['id'].'/')){
			$dir = scandir('../'.$row['id'].'/');

			echo '<br>Student Name: '.$row['name'].'<br>';
			print_r($dir);
			echo '<br>';
		} else {
			echo '<br>Student Name: '.$row['name'].'<br>';
			echo 'Directory does not exist';
			echo '<br>';

		}

	}
?>