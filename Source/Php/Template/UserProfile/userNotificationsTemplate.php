<?php $userNotification = $dbh->getUserNotification($_SESSION["userId"]); ?>
<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>

<section>
	<h2>Notifiche</h2>
	
	<?php  if(empty($userNotification)): ?>
		<p>Nessuna nuova notifica</p>
	<?php endif; ?>

	<?php if(!empty($userNotification)): ?>
		<ul class="notifications">
			<?php foreach($userNotification as $notification){
				drawNotification($notification);
			}	
			?>
		</ul>
	<?php endif; ?>
</section>
		