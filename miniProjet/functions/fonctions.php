<?php 
// cette fonction permet d'authentifier un utilisateur
	function auth_user(){
		if (empty($_SESSION['validate_user'])) {
			header('location: index.php');
		}
	}

// cette fonction permet de mettre active la page actuelle
	function setActive($page){
		 $tab = explode("/", $_SERVER['REQUEST_URI']);
		 $page_actuel = $tab[count($tab) - 1];

		 if ($page_actuel == $page.'.php') {
		 	return "active";
		 }

		 return "";
	}
// cette fonction permet de verifier est ce qu'un utilisateur est connecte ou non
	function is_logged(){
		$reponse = true;
		if (empty($_SESSION['validate_user'])) {
			$reponse = false;
		}

		return $reponse;
	}

// cette fonction permet d'appeler automatiquement les classes
	function chargerClass($nomClass)
	{
		require 'classe/'.$nomClass.'.php';
	}

	function chargerMesClasses(){
		spl_autoload_register('chargerClass');
	}

// cette fonction renvoie true si tous les champs sont remplis sinon elle renvoie false
	function notEmpty($tab = []){
		for ($i=0; $i < count($tab); $i++) { 
			if(empty($tab[$i])){
				return false;
			}
		}
		return true;
	}

	// cette methode permet d'afficher les messages d'erreur
	function message($texte, $type="danger")
	{
		echo '<div class="alert alert-'.$type.' text-center">'.$texte.'</div>';
	}

	//cette methode d'afficher voir plus si la chaine depasse 50 caracteres
	function voirPlus($chaine, $lien = "#"){
		if (strlen($chaine) <= 50) {
			echo nl2br($chaine);
		}else{
			$chaine1 = substr($chaine, 0, 50);
			echo nl2br($chaine1).'<a href="'.$lien.'"> voir plus...</a>';
		}
	}

 ?>