<?php
	$stream = fopen('../connect.php', 'r');
	$file = stream_get_contents($stream);
	echo htmlspecialchars($file);
	fclose($stream);
?>