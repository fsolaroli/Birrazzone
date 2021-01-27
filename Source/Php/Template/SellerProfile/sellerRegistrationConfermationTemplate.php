<?php
$sellerData = $dbh->getSellerFromRegistrationToken($_GET["token"]);
if(empty($sellerData)){
	header("Location: ../Home/home.php");
} else {
	$sellerData = $sellerData[0];
}
?>

<h1>Conferma registrazione</h1>

<section>
	<form onsubmit="return false;">
		<input type="hidden" name="sellerId" value="<?php echo $sellerData["IdBirrificio"] ?>">
		<ul>
			<li class="label"><label for="sellerName">Ragione Sociale:</label></li>
			<li class="input"><input type="text" id="sellerName" name="sellerName" value="<?php echo $sellerData["NomeBirrificio"] ?>" readonly/></li>
			
			<li class="label"><label for="email">Email:</label></li>
			<li class="input"><input type="text" id="email" name="email" value="<?php echo $sellerData["EmailBirrificio"] ?>" readonly autocomplete="username"/></li>
			
			<li class="label"><label for="IVA">Ragione Sociale:</label></li>
			<li class="input"><input type="text" id="IVA" name="IVA" value="<?php echo $sellerData["PartitaIVA"] ?>" readonly/></li>
	
			<li class="label"><label for="password">Password:</label></li>
			<li class="input"><input type="password" id="password" name="password" required autocomplete="new-password"/></li>
	
			<li class="label"><label for="passwordConfermation">Conferma Password:</label></li>
			<li class="input"><input type="password" id="passwordConfermation" name="passwordConfermation" required autocomplete="new-password"/></li>
	
			<li><input type="submit" value="Attiva account"/></li>
		</ul>
	</form>
	
	<div class="errors"><ul></ul></div>
</section>