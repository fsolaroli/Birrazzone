<?php
	require("sellerProfileTemplate.php");
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Dati birrificio</h2>
	<ul>
		<li>
			<p>Località:</p>
			<p><?php echo $sellerData["Localita"] ?>
			<?php if(empty($sellerData["Localita"])): ?>
				<p>Inserisci dove si trova il tuo birrificio</p>
			<?php endif;?>
		</li>
		<li class="photo">
			<p>Foto:</p>
			<?php if(!empty($sellerData["FotoBirrificio"])): ?>
				<img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
			<?php endif;?>
			<?php if(empty($sellerData["FotoBirra"])): ?>
				<p>Inserisci una foto del tuo birrificio</p>
			<?php endif;?>
		</li>	
		<li>
			<p>Descrizione:</p>
			<p><?php echo $sellerData["DescrizioneBirrificio"] ?></p>
			<?php if(empty($sellerData["DescrizioneBirrificio"])): ?>
				<p>Inserisci una descrizione del tuo birrificio</p>
			<?php endif;?>
		</li>
	</ul>
	<button id="modifyAccountData" class="modify">Modifica</button>
</section>