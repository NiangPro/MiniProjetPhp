<?php
 	require_once('init.php');
	$title = "Notification de ".$user->login;
	

	 // Nous récupérons toutes les notifications de l'utilisateur connecté
	 // (Aussi bien les notifications lues que les notifications non lues).
	 
	 
	 $notifications = $db->getNotificationByUserID($user->id);


	 // Après avoir récupéré les notifications de l'utilisateur connecté,
	 // nous modifions la valeur de leur attribut 'seen' afin d'indiquer que
	 // l'utilisateur vient de lire ces notifications.
	 
	 $db->updateUserNotification($user->id);

	 // Nous affichons ensuite le contenu de notre fichier notifications.view.php
	 require("view/notifications.view.php");

 ?>