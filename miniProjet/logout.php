<?php 
	session_start();

	$_SESSION['validate_user'] = "";
	session_destroy();
	header('Location: index.php');

 ?>