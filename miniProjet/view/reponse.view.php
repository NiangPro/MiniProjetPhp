 <?php 

	include('partials/_header.php');

	echo $form->design("col-md-3");

		// affichage du publication
		echo $form->startFormUser("col-md-4 col-md-offset-4 spacer" , "Commentaire de ".$_SESSION['prenom']." ".$_SESSION['nom']);
				$form->startArticle("", "", "");
				        		echo nl2br($cmt->content);
				$form->endArticle();
		echo $form->endFormUser();
	echo $form->betweenDesign("col-md-8");

	// AFFICHAGE DES REPONSES
		if (count($rep) > 0) {
			echo $form->startFormUser("col-md-3 col-md-offset-5" , "Reponses");
				foreach ($rep as $r) {
				echo "<div class='row'>";
				$form->startArticleComments($r->prenom, $r->nom, "pull-left");
				     echo nl2br($r->content);
				    
				$form->endArticle();
				echo "</div>";
			}
			echo $form->endFormUser();
		}

		// FORMULAIRE D'AJOUT COMMENTAIRE
		echo $form->startForm("col-md-3 col-md-offset-5" , "");
			$form->textearea("content", "Status");
	  		$form->btnStatus("reponse", "<i class='fa fa-comment'></i> Repondre");
		echo $form->endForm();

	echo $form->endDesign();
	
	include('partials/_footer.php');
 ?>