<?php 
	require_once('init.php');
	$title = "Profile de ".$user->login;
	$page = "users";
	$pubs = $db->getAllStatusByGroup();

	if (isset($_POST['ajouter'])) {
		extract($_POST);
		if (notEmpty([$titre, $content, $user->id])) {
			$status = new Status($user->id, $content, $titre);

			$data = $db->addStatus($status);
			if ($data) {
				message("Ajout de status avec succes", "info");
				header('Location: users.php');
			}else{
				message("Erreur d'ajout");
			}
		}
	}



	require('view/users.view.php');
 ?>