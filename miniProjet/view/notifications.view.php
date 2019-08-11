<?php $title = "Notifications"; ?>

<?php include('partials/_header.php'); ?>

 <div id="main-content">
	 <div class="container">
		 <h1 class="lead text-center" style="color: white;">Vos notifications</h1>

		 <?php if(count($notifications) > 0): ?>
			 <ul class="list-group col-md-6 text-center col-md-offset-3">
			 <?php foreach($notifications as $notification): ?>
			 <li class="list-group-item
			 <?= $notification->seen == '0' ? 'not_seen' : '' ?>"
			 >
			 <?php require("partials/notification/{$notification->name}.php"); ?>
			 </li>
			 <?php endforeach; ?>
			 </ul>
		 <?php else: ?>
		 	<p class="lead text-center" style="color: white;">Aucune notification disponible pour l'instant.</p>
		 <?php endif; ?>
	 </div>
 </div>

 <?php include('partials/_footer.php'); ?>