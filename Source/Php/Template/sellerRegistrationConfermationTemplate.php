<h1>Conferma registrazione</h1>

<?php
$sellerData = $dbh->getSellerFromRegistrationToken($_GET["token"]);
if(empty($sellerData)){
	header("Location: home.php");
} else {
	$sellerData = $sellerData[0];
}
?>

<!-- <ul>
	<li><?php// echo $sellerData["NomeBirrificio"] ?></li>
	<li><?php// echo $sellerData["EmailBirrificio"] ?></li>
	<li>P. IVA: <?php// echo $sellerData["PartitaIVA"] ?></li>
</ul> -->
<form onsubmit="return false;">
	<input type="hidden" name="sellerId" value="<?php echo $sellerData["IdBirrificio"] ?>">
	<ul>
		<li><label for="sellerName">Ragione Sociale:</label></li>
		<li><input type="text" name="sellerName" value="<?php echo $sellerData["NomeBirrificio"] ?>" readonly/></li>
		
		<li><label for="email">Email:</label></li>
		<li><input type="text" name="email" value="<?php echo $sellerData["EmailBirrificio"] ?>" readonly autocomplete="username"/></li>
		
		<li><label for="IVA">Ragione Sociale:</label></li>
		<li><input type="text" name="IVA" value="<?php echo $sellerData["PartitaIVA"] ?>" readonly/></li>

		<li><label for="password">Password:</label></li>
		<li><input type="password" name="password" autocomplete="new-password"/></li>

		<li><label for="passwordConfermation">Conferma Password:</label></li>
		<li><input type="password" name="passwordConfermation" autocomplete="new-password"/></li>

		<li><input type="submit" value="Attiva account"/></li>
	</ul>
</form>
<div class="errori"></div>