<?php
	require("sellerProfileTemplate.php");
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Dati account</h2>
	<p> <?php echo $sellerData["NomeBirrificio"] ?></p>
	<p> <?php echo $sellerData["EmailBirrificio"] ?></p>
	<p> P.IVA: <?php echo $sellerData["PartitaIVA"] ?></p>
	<a href="modifySellerAccountData.php"><button class="modify">Modifica</button></a>
</section>
<section>
	<button id="deleteAccount" class="delete">Elimina account</button>
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
</section>