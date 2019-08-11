 <?php 

	include('partials/_header.php');

	echo $form->design("col-md-3");

		$form->afficheCurrentUser($user->login, $user->nom, $user->prenom, $user->email, $user->tel);

	echo $form->betweenDesign("col-md-8");
		require('partials/_addStatus.php');
		require('partials/_listStatus.php');
	echo $form->endDesign();
	
	include('partials/_footer.php');
 ?>