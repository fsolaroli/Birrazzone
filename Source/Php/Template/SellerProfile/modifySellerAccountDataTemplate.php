<?php $sellerData = $dbh->getSeller($_SESSION["sellerId"])[0]; ?>

<h1><?php echo $sellerData["NomeBirrificio"]?></h1>

<form onsubmit="return false;">
	<!-- <input type="hidden" name="sellerId" value="<?php echo $sellerData["IdBirrificio"] ?>"> -->
	<ul>
		<li><label for="sellerName">Ragione Sociale:</label></li>
		<li><input type="text" name="sellerName" value="<?php echo $sellerData["NomeBirrificio"] ?>" autocomplete="organization"/></li>
		
		<li><label for="email">Email:</label></li>
		<li><input type="text" name="email" value="<?php echo $sellerData["EmailBirrificio"] ?>" autocomplete="email"/></li>
		
		<li><label for="IVA">Partita IVA:</label></li>
		<li><input type="text" name="IVA" value="<?php echo $sellerData["PartitaIVA"] ?>" autocomplete="off"/></li>

		<li><label for="password">Password:</label></li>
		<li><input type="password" name="password" value="<?php echo $sellerData["PasswordBirrificio"]?>" autocomplete="new-password"/></li>

		<li><label for="passwordConfermation">Conferma Password:</label></li>
		<li><input type="password" name="passwordConfermation" value="<?php echo $sellerData["PasswordBirrificio"]?>" autocomplete="new-password"/></li>

		<li><input type="submit" name="update" value="Aggiorna"/></li>

	</ul>
</form>
<a href="sellerAccountData.php"><button>Annulla</button></a>
<div class="errori"></div>