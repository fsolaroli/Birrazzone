<?php
	$adminNotification = $dbh->getSellerRequest();
?>
<header>
	<h1>Amministratore</h1>
</header>
<section>
	<h2>Richieste</h2>
	<?php if (empty($adminNotification)): ?>
		<p>Nessuna nuova notifica</p>
	<?php endif; ?>

	<?php if (!empty($adminNotification)): ?>
		<ul class="notifications">	
			<?php foreach ($adminNotification as $notification): ?>
				<li id='<?php echo $notification["IdBirrificio"]?>'>
				<div>
					<p>"<?php echo $notification["NomeBirrificio"]?>" vuole diventare venditore</p>
					<img src='../../../../Immagini/Icone/Expand.png' alt='expande <?php echo $notification["IdBirrificio"]?>'/>
					<img src='../../../../Immagini/Icone/Collapse.png' alt='collapse <?php echo $notification["IdBirrificio"]?>' hidden/>
				</div>
				<div hidden>
					<p> Ragione Sociale: <?php echo $notification["NomeBirrificio"]?> </p>
					<p> Email: <?php echo $notification["EmailBirrificio"]?> </p>
					<p> Partita IVA: <?php echo $notification["PartitaIVA"]?> </p>
					<button class="delete" id='<?php echo $notification["IdBirrificio"]?>'>Rifiuta</button>
					<button class="accept" id='<?php echo $notification["IdBirrificio"]?>'>Accetta</button>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
	<?php endif; ?>
</section>