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
		<?php foreach ($sellerNotification as $notification): ?>
			<!-- TODO -->
			<div class="notification">
				NOTIFICA
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</section>