<?php 
		echo $form->startForm("col-md-4 col-md-offset-2 spacer" , "Ajout publication");
			$form->selectTitre("titre");
			$form->textearea("content", "Status");
	  		$form->btnStatus("ajouter", "Publier");
		echo $form->endForm();
?>
