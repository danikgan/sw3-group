<?php
	if(!isset($_SESSION)){
		session_start();
	}	

	$_SESSION['name']="Milhouse";
	$_SESSION['is_admin']=1;
	header("Location: ../settings.php");
	exit();
?>