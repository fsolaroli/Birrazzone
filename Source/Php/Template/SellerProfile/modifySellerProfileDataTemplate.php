<?php 
	require("sellerProfileTemplate.php");
	
	$sellerData = $dbh->getSeller($_SESSION["sellerId"])[0];
?>

<section>
	<h2>Modifica dati birrificio</h2>
	<form onsubmit="return false;">
		<!-- <input type="hidden" name="sellerId" value="<?php echo $sellerData["IdBirrificio"] ?>"> -->
		<ul>
			<li class="label"><label for="location">Località:</label></li>
			<li class="input"><input type="text" name="location" value="<?php echo $sellerData["Localita"] ?>" autocomplete="off"/></li>
	
			<li class="label"><label for="image">Foto</label></li>
			<li class="photoInput">
				<img src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"]; ?>" alt=""/>
				<input type="file" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
			</li>
			<li><div class="imageErrors"></div></li>
	
			<li class="label"><label for="description">Descrizione:</label></li>
			<li class="input"><textarea name="description"><?php echo $sellerData["DescrizioneBirrificio"] ?></textarea></li>
	
			<li class="submit">
				<input type="submit" name="update" value="Aggiorna"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
		</ul>	
	</form>
	<!-- <a href="sellerProfileData.php"><button>Annulla</button></a> -->
</section>
<div class="errori"></div>
