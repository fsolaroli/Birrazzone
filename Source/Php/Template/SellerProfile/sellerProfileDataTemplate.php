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
		</li>
		<li class="photo">
			<p>Foto:</p>
			<img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
		</li>	
		<li>
			<p>Descrizione:</p>
			<p><?php echo $sellerData["DescrizioneBirrificio"] ?></p>
		</li>
	</ul>
	<button id="modifyAccountData" class="modify">Modifica</button>
</section>