<?php
	$adminNotification = $dbh->getSellerRequest();
?>
<h1>Amministratore</h1>
<section>
	<h2>Richieste</h2>
	<?php if (empty($adminNotification)): ?>
		<p>Nessuna nuova notifica</p>
	<?php endif; ?>

	<?php if (!empty($adminNotification)): ?>
		<ul class="notifications">	
			<?php foreach ($adminNotification as $notification): ?>
				<li id='<?php echo $notification["IdBirrificio"];?>'>
				<div>
					<p>"<?php echo $notification["NomeBirrificio"];?>" vuole diventare venditore</p>
					<img src='../../../../Immagini/Icone/Expand.png' alt='expande <?php echo $notification["IdBirrificio"];?>'/>
					<img src='../../../../Immagini/Icone/Collapse.png' alt='collapse <?php echo $notification["IdBirrificio"];?>' hidden/>
				</div>
				<div hidden>
					<ul>
						<li><span>Ragione Sociale: </span><span><?php echo $notification["NomeBirrificio"];?></span></li>
						<li><span>Email: </span><span><?php echo $notification["EmailBirrificio"];?></span></li>
						<li><span>Partita IVA: </span><span><?php echo $notification["PartitaIVA"];?></span></li>
						<li class="submit">
							<button class='reject <?php echo $notification["IdBirrificio"];?>'>Rifiuta</button>
							<button class='accept <?php echo $notification["IdBirrificio"];?>'>Accetta</button>
						</li>
					</ul>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
	<?php endif; ?>
</section>