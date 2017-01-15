<?php
	$stream = fopen('../login-submit.php', 'r');
	$file = stream_get_contents($stream);
	echo htmlspecialchars($file);
	fclose($stream);	
?>
