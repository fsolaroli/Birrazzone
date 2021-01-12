<?php 
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<form onsubmit="return false;">
	<!-- <input type="hidden" name="sellerId" value="<?php echo $sellerData["IdBirrificio"] ?>"> -->
	<ul>
		<li><label for="location">Località:</label></li>
		<li><input type="text" name="location" value="<?php echo $sellerData["Localita"] ?>" autocomplete="off"/></li>

		<li><label for="image">Foto</label></li>
		<li>
			<img src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"]; ?>" alt="" width="300px"/>
			<input type="file" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
		</li>
		<li><div class="imageErrors"></div></li>

		<li><label for="description">Descrizione:</label></li>
		<li><input type="text" name="description" value="<?php echo $sellerData["DescrizioneBirrificio"] ?>" autocomplete="off"/></li>

		<li><input type="submit" name="update" value="Aggiorna"/></li>
	</ul>	
</form>
<a href="sellerProfileData.php"><button>Annulla</button></a>
<div class="errori"></div>
