<?php $userNotification = $dbh->getUserNotification($_SESSION["userId"]); ?>
<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?>

<section>
	<h2>Notifiche</h2>
	
	<?php  if(empty($dbh->getUserNotification($userNotification))): ?>
		<p>Nessuna nuova notifica</p>
	<?php endif; ?>

	<?php if(!empty($dbh->getUserNotification($userNotification))): ?>
		<ul class="notification">
			<?php foreach($userNotification as $notification): ?>
				<li><p><?php $dbh->readNotification($userNotification[0]["IdNotifica"]); ?></p></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>
		