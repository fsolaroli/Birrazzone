<?php
	require("sellerProfileTemplate.php");
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Dati birrificio</h2>
	<p> <?php echo $sellerData["Localita"] ?></p>
	<img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
	<p class="description"> <?php echo $sellerData["DescrizioneBirrificio"] ?></p>
	<a href="modifySellerProfileData.php"><button id="modifyAccountData" class="modify">Modifica</button></a>
</section>