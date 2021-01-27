<?php
	require("sellerProfileTemplate.php");

	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Modifica dati account</h2>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="sellerName">Ragione Sociale:</label></li>
			<li class="input"><input type="text" id="sellerName" name="sellerName" value="<?php echo $sellerData["NomeBirrificio"] ?>" autocomplete="organization"/></li>
			
			<li class="label"><label for="email">Email:</label></li>
			<li class="input"><input type="text" id="email" name="email" value="<?php echo $sellerData["EmailBirrificio"] ?>" autocomplete="email"/></li>
			
			<li class="label"><label for="IVA">Partita IVA:</label></li>
			<li class="input"><input type="text" id="IVA" name="IVA" value="<?php echo $sellerData["PartitaIVA"] ?>" autocomplete="off"/></li>
	
			<li class="label"><label for="password">Password:</label></li>
			<li class="input"><input type="password" id="password" name="password" value="<?php echo $sellerData["PasswordBirrificio"]?>" autocomplete="new-password"/></li>
	
			<li class="label"><label for="passwordConfermation">Conferma Password:</label></li>
			<li class="input"><input type="password" id="passwordConfermation" name="passwordConfermation" value="<?php echo $sellerData["PasswordBirrificio"]?>" autocomplete="new-password"/></li>
	
			<li class="submit">
				<input type="submit" name="update" value="Aggiorna"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
	
		</ul>
	</form>
	
	<div class="errors"><ul></ul></div>
</section>