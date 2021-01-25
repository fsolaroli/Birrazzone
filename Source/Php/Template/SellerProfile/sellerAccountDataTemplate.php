<?php
	require("sellerProfileTemplate.php");
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Dati account</h2>
	<ul>
		<li>
			<p>Ragione Sociale:</p>
			<p><?php echo $sellerData["NomeBirrificio"] ?></p>
		</li>
		<li>
			<p>Email:</p>
			<p><?php echo $sellerData["EmailBirrificio"] ?></p>
		</li>
		<li>
			<p>P.IVA:</p> 
			<p><?php echo $sellerData["PartitaIVA"] ?></p>
		</li>
	</ul>
	<a href="modifySellerAccountData.php"><button class="modify">Modifica</button></a>
</section>
<section class="delete">
	<button id="deleteAccount" class="delete">Elimina account</button>
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
</section>