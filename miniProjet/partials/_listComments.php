<?php 

	if (count($cmt) != 0) {
		echo $form->startFormUser("col-md-4 col-md-offset-2" , "Liste des commentaires et reponses");
			foreach ($cmt as $com) {
				//if ($com->type == "commentaire") {
					$form->startArticleComments($com->prenom, $com->nom);
					    echo nl2br($com->content);
					$form->endArticleComments();
				//}
			}

		echo $form->endFormUser();
	}

 ?>