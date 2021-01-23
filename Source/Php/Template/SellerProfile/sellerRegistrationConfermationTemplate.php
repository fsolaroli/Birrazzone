<?php
$sellerData = $dbh->getSellerFromRegistrationToken($_GET["token"]);
if(empty($sellerData)){
	header("Location: ../Home/home.php");
} else {
	$sellerData = $sellerData[0];
}
?>

<h1>Conferma registrazione</h1>
<!-- <ul>
	<li><?php// echo $sellerData["NomeBirrificio"] ?></li>
	<li><?php// echo $sellerData["EmailBirrificio"] ?></li>
	<li>P. IVA: <?php// echo $sellerData["PartitaIVA"] ?></li>
</ul> -->
<section>
	<form onsubmit="return false;">
		<input type="hidden" name="sellerId" value="<?php echo $sellerData["IdBirrificio"] ?>">
		<ul>
			<li class="label"><label for="sellerName">Ragione Sociale:</label></li>
			<li class="input"><input type="text" name="sellerName" value="<?php echo $sellerData["NomeBirrificio"] ?>" readonly/></li>
			
			<li class="label"><label for="email">Email:</label></li>
			<li class="input"><input type="text" name="email" value="<?php echo $sellerData["EmailBirrificio"] ?>" readonly autocomplete="username"/></li>
			
			<li class="label"><label for="IVA">Ragione Sociale:</label></li>
			<li class="input"><input type="text" name="IVA" value="<?php echo $sellerData["PartitaIVA"] ?>" readonly/></li>
	
			<li class="label"><label for="password">Password:</label></li>
			<li class="input"><input type="password" name="password" autocomplete="new-password"/></li>
	
			<li class="label"><label for="passwordConfermation">Conferma Password:</label></li>
			<li class="input"><input type="password" name="passwordConfermation" autocomplete="new-password"/></li>
	
			<li><input type="submit" value="Attiva account"/></li>
		</ul>
	</form>
</section>
<div class="errori"></div>