<?php $userNotification = $dbh->getUserNotification($_SESSION["userId"]); ?>
<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?>

<section>
	<h2>Notifiche</h2>
	
	<?php 
		if(empty(getUserNotification($userNotification))) {
			echo "<p>Non ci sono nuove notifiche</p>";
		}
	?>

	<?php if(!empty(getUserNotification($userNotification))): ?>
		<?php foreach($sellerNotification as $notification): ?>
			<div class="notification">

			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</section>
		