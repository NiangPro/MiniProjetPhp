<?php 
	require_once('init.php');
	$title = "Edition de profil";

	if (isset($_POST['editer'])) {
		extract($_POST);
		if (notEmpty([$nom, $prenom, $email, $tel])) {

			if($db->updateUserInfos($nom, $prenom, $email, $tel)){

				$user->nom = $nom;
				$user->prenom = $prenom;
				$user->tel = $tel;
				$user->email = $email;

				$_SESSION['validate_user'] = $user;
				message("Votre profil a été mis à jour avec succès");
				header('Location: users.php');
				exit();
			}else{
				message("Erreur d'ajout");
			}
			
		}
		else{
			message("Veuillez remplir tous les champs");
		}
	}


	require('view/editProfil.view.php');
?>