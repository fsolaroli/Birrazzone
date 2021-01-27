<?php 
	require("sellerProfileTemplate.php");
	
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Modifica dati birrificio</h2>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="location">Località:</label></li>
			<li class="input"><input type="text" id="location" name="location" value="<?php echo $sellerData["Localita"] ?>" autocomplete="off"/></li>
	
			<li class="label"><label for="image">Foto</label></li>
			<li class="photoInput">
				<img src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"]; ?>" alt=""/>
				<input type="file" id="image" name="image" accept=".jpeg, .jpg, .png"/>
			</li>
			<li><div class="imageErrors"></div></li>
	
			<li class="label"><label for="description">Descrizione:</label></li>
			<li class="input"><textarea id="description" name="description"><?php echo $sellerData["DescrizioneBirrificio"] ?></textarea></li>
	
			<li class="submit">
				<input type="submit" name="update" value="Aggiorna"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
		</ul>	
	</form>
	
	<div class="errors"></div>
</section>
