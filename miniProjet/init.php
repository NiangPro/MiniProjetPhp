<?php 

	session_start();

	include('functions/fonctions.php'); 
	require 'vendor/autoload.php';
	chargerMesClasses();
	auth_user();
	 
	$db = new Database();
	$form = new FormStatus();
	$user = $_SESSION['validate_user'];

	$notifications_count = $db->getCountNotificationByIdUser($user->id);
 ?>