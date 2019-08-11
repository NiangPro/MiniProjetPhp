 <?php 

	include('partials/_header.php');

	echo $form->design("col-md-3");

		$form->afficheCurrentUser($user->login, $user->nom, $user->prenom, $user->email, $user->tel);

	echo $form->betweenDesign("col-md-8");

		// affichage du publication
		echo $form->startFormUser("col-md-4 col-md-offset-2 spacer" , "Information de la publication");
				$form->startArticle($pub->prenom, $pub->nom, $pub->titre);
				        		echo nl2br($pub->content);
				$form->endArticle();
		echo $form->endFormUser();

		// AFFICHAGE DES COMMENTAIRES
		if (count($cmts) > 0) {
			echo $form->startFormUser("col-md-3 col-md-offset-3" , "Reponses & Commentaires");
				foreach ($cmts as $cmt) {
				echo "<div class='row'>";
				$form->startArticleComments($cmt->prenom, $cmt->nom, "pull-right");
				     echo nl2br($cmt->content);
				    
				$form->endArticle();
				echo "</div>";

				$rep = $db->getReponseByIdCom($cmt->id);
				// AFFICHAGE DES REPONSES
				if (count($rep) > 0) {
					foreach ($rep as $r) {
						echo "<div class='row'>";
						$form->startArticleComments($r->prenom, $r->nom, "pull-left");
						     echo nl2br($r->content);
						    
						$form->endArticle();
						echo "</div>";
					}
				}
			}
			echo $form->endFormUser();
		}
	echo $form->betweenDesign("col-md-8");

		// FORMULAIRE D'AJOUT COMMENTAIRE
		echo $form->startForm("col-md-4 col-md-offset-7" , "Ajout commentaire");
			$form->textearea("content", "Status");
	  		$form->btnStatus("comment", "<i class='fa fa-comment'></i> Commenter");
		echo $form->endForm();

	echo $form->endDesign();
	
	include('partials/_footer.php');
 ?>