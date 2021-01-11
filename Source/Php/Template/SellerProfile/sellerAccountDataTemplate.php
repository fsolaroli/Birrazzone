<?php
	require("sellerProfileTemplate.php");
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<div class="data">
		<h2>Dati account</h2>
		<p> <?php echo $sellerData["NomeBirrificio"] ?></p>
		<p> <?php echo $sellerData["EmailBirrificio"] ?></p>
		<p> P.IVA: <?php echo $sellerData["PartitaIVA"] ?></p>
		<a href="modifySellerAccountData.php"><button id="modifyAccountData" class="modify">Modifica</button></a>
		<button id="deleteAccount" class="delete">Elimina account</button>
	</div>
	<div class="alert"></div>
</section>