<div class="row">	
	<nav class="navbar-info navbar-right " >
		<ul class="nav nav-tabs stylenav">
			<?php if(is_logged()): ?>
			<li class="<?= setActive("users") ?>">
				<a href="users.php">Mon profile</a>
			</li>
			<li class="<?= setActive("notifications") ?>">
				<a href="notifications.php" class="<?= $notifications_count > 0 ? 'have_notifs' : '' ?>">
					<i class="fa fa-bell "></i> <?= $notifications_count > 0 ? "($notifications_count)" : ''; ?>
				</a>
			</li>

			<li class="<?= setActive("editProfil") ?>">
				<a href="editProfil.php">Editer profile</a>
			</li>
			<li class="<?= setActive("deconnexion") ?>">
				<a href="logout.php" onclick="return confirmation()">Deconnexion</a>
			</li>
		<?php else: ?>
			<li class="<?= setActive("index") ?>">
				<a href="index.php">Connexion</a>
			</li>
			<li class="<?= setActive("inscription") ?>">
				<a href="inscription.php">Inscription</a>
			</li>
		<?php endif; ?>
		</ul>
	</nav>
</div>