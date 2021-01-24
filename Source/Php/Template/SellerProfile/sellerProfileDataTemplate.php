<?php
	require("sellerProfileTemplate.php");
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Dati birrificio</h2>
	<ul>
		<li><?php echo $sellerData["Localita"] ?></li>
		<li><img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/></li>
		<li class="description"><?php echo $sellerData["DescrizioneBirrificio"] ?></li>
	</ul>
	<a href="modifySellerProfileData.php"><button id="modifyAccountData" class="modify">Modifica</button></a>
</section>