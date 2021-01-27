<h1>Amministratore</h1>

<section> 
	<h2>Birrifici</h2>
	<?php if(empty($birrifici)): ?>
		<h2>Non ci sono birrifici iscritti al momento</h2>
	<?php endif;?>

	<?php if(!empty($birrifici)): ?>
	<ul class="orders" id="brewerylist">
		<?php foreach($birrifici as $birrificio): ?>
			<li><span></span>
				<span><?php echo $birrificio["NomeBirrificio"]?></span>
				<button class="<?php echo $birrificio["IdBirrificio"];?>">Visualizza</button>
			</li>
		<?php endforeach;?>
	</ul>
	<?php endif;?>
</section>
