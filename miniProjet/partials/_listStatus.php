<?php 

	echo $form->startFormUser("col-md-4 col-md-offset-2" , "Liste des publications");
		if (count($pubs) != 0) {
			foreach ($pubs as $pub) {
				$form->startArticle($pub->prenom, $pub->nom, $pub->titre);
				        if (isset($_GET['id']) && $_GET['id'] == $pub->id) {
				        		echo nl2br($pub->content);
				        }else{
				        	voirPlus($pub->content, "users.php?id=".$pub->id);
				       }
				      
				       echo  $form->btnComment("<i class='fa fa-comment'></i> Commenter", "comments.php?idStatus=".$pub->id);
				$form->endArticle();


			}

		}else{
			echo '<p style="color:red">Aucune publication pour le moment...</p>';
		}
	echo $form->endFormUser();

 ?>