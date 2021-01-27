<h1>Gestione spedizione ordini</h1>

<?php
	$orders = $dbh->getOpenOrders();
	// var_dump($orders);
?>
<section>
	<?php if(empty($orders)) :?>
		<p>Non ci sono ordini attivi</p>
	<?php endif; ?>
	<?php if(!empty($orders)) :?>
		<ul class="sellerProducts">
			<?php foreach ($orders as $order): ?>
				<li id="<?php echo $order["IdOrdine"] ?>">
					<div>
						<p><?php echo $order["IdOrdine"] ?></p>
						<p><span>Stato:</span><span><?php echo $order["Codice"] ?></span></p>
					</div>
					<div>
						<button class="modify <?php echo $order["IdOrdine"] ?>">Avanza Ordine</button>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>