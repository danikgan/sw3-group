<?php
	if(isset($_POST['delete'])) 
	{ 
	    delSnip($_POST['id']);
	} 
	function delSnip($snip_id) {
		include_once('connect.php');
		$conn->query("DELETE FROM snippets WHERE id = $snip_id");
	}
	header("Location: profile.php");
	exit;

