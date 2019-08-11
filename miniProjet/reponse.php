<?php 
	require_once('init.php');
	
	$title = "Reponse de ".$user->login;

	if (isset($_GET['idcom'])) {
		$_SESSION['idcom'] = $_GET['idcom'];
		$_SESSION['prenom'] = $_GET['prenom'];
		$_SESSION['nom'] = $_GET['nom'];
		$_SESSION['user_id'] = $_GET['user_id'];
	}

	$cmt = $db->getCommentsById($_SESSION['idcom']);
	$rep = $db->getReponseByIdCom($_SESSION['idcom']);

	if (isset($_POST['reponse'])) {
		extract($_POST);
		if (notEmpty([$content])) {
			// Insertion de commentaire
			$comment = new Reponse($_SESSION['idcom'], $user->id, $content);

			$data = $db->addReponse($comment);
			if ($data) {

				// Insertion d'une notification
				$notif = new Notification($_SESSION['user_id'], "friend_comment_answered", $user->id);
				
				$db->addNotification($notif);
				
				message("Reponse avec succes", "info");
				header('Location: reponse.php');
			}else{
				message("Erreur d'ajout");
			}
		}
	}

 

	require('view/reponse.view.php');
 ?>