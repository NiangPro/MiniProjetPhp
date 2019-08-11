<?php 
	require_once('init.php');
	
	$title = "Commentaire de ".$user->login;
	if (isset($_GET['idStatus'])) {
		$_SESSION['idStatus'] = $_GET['idStatus'];
	}

	$pub = $db->getStatusById($_SESSION['idStatus']);
	$cmts = $db->getAllCommentsByIdStatus($_SESSION['idStatus']);
	
	if (isset($_POST['comment'])) {
		extract($_POST);
		if (notEmpty([$content])) {
			// Insertion de commentaire
			$comment = new Comments($pub->id,$pub->id_user, $user->id, $content);

			$data = $db->addComment($comment);
			if ($data) {

				// Insertion d'une notification
				$notif = new Notification($pub->id_user, "friend_comment_sent", $user->id);
				
				$db->addNotification($notif);
				
				message("Ajout de publication avec succes", "info");
				header('Location: comments.php');
			}else{
				message("Erreur d'ajout");
			}
		}
	}

 

	require('view/comments.view.php');
 ?>