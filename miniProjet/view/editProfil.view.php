<?php 
	include('partials/_header.php');	

	echo $form->startForm("container col-md-offset-4 col-md-4 jumbotron spacer", "Editer mon profil", "editProfil.php");

	echo $form->formRow("col-md-6");
	echo $form->input("nom", "Nom", $user->nom);
	echo $form->betweenRowForm("col-md-6");
	echo $form->input("prenom", "Prénom", $user->prenom);
	echo $form->endFormRow();

	echo $form->formRow("col-md-6");
	echo $form->input("email", "Email", $user->email);
	echo $form->betweenRowForm("col-md-6");
	echo $form->input("tel", "Téléphone", $user->tel);
	echo $form->endFormRow();

	echo $form->formRow("col-md-offset-4");
	echo $form->submit("editer", "Editer");
	echo $form->endFormRow();

	echo $form->endForm();

	include('partials/_footer.php');

 ?>