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
			<?php foreach ($sellerNotification as $notification): ?>
				<li id="<?php echo $notification["IdNotifica"]; ?>">
					<div>
						<p><?php echo $notification["Oggetto"]; ?></p>
						<img src="<?php echo "../../../../Immagini/Icone/Expand.png" ?>" alt="expande <?php echo $notification["IdNotifica"]; ?>">
						<img src="<?php echo "../../../../Immagini/Icone/Collapse.png" ?>" alt="collapse <?php echo $notification["IdNotifica"]; ?>" hidden>
					</div>
					<div hidden>
						<p><?php echo $notification["Corpo"]; ?></p>
						<button id="read <?php echo $notification["IdNotifica"]; ?>">Leggi</button>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>