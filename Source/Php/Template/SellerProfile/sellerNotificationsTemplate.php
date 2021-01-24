<?php
	require("sellerProfileTemplate.php");
	$sellerNotification = $dbh->getSellerNotification($_SESSION["sellerId"]);
?>

<section>
	<h2>Notifiche</h2>

	<?php if (empty($sellerNotification)): ?>
		<p>Nessuna nuova notifica</p>
	<?php endif; ?>

	<?php if (!empty($sellerNotification)): ?>
		<ul class="notifications">
			<?php
			foreach ($sellerNotification as $notification) {
				drawNotification($notification);
			}
			?>
		</ul>
	<?php endif; ?>
</section>