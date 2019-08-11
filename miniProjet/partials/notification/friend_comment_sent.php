<a href="#">
	
<?= $notification->prenom.' '.$notification->nom ?>
</a>

a commenté votre publication <a href="reponse.php?idcom=<?= $notification->id ?>&prenom=<?= $notification->prenom ?>&nom=<?= $notification->nom ?>&user_id=<?= $notification->user_id ?>" class="btn btn-info">Repondre</a>