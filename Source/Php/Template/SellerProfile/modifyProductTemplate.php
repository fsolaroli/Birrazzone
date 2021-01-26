<?php
	require("sellerProfileTemplate.php");
	
	if (isset($_GET["productId"])) {
		$productData = $dbh->getBeer($_GET["productId"])[0];
	} else {
		header("Location: sellerProducts.php"); //404
	}
?>

<section>
	<form onsubmit="return false;">
		<input type="hidden" name="productId" value="<?php echo $_GET["productId"] ?>">
		<ul>
			<li class="label"><label for="image">Foto</label></li>
			<li class="photoInput">
				<img src="<?php echo UPLOAD_DIR."Birre/".$productData["FotoBirra"]; ?>" alt="" width="300px"/>
				<input type="file" id="image" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
			</li>
			<li class="input" hidden><div class="imageErrors"></div></li>
	
			<li class="label"><label for="price">Prezzo</label></li>
			<li class="input"><input type="number" id="price" name="price" max="9999.99" min="0.01" step="0.01" value="<?php echo $productData["Prezzo"] ?>" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="description">Descrizione:</label></li>
			<li class="input"><textarea id="description" name="description" maxlength="300"><?php echo $productData["DescrizioneBirra"] ?></textarea></li>

			<li class="submit">
				<input type="submit" name="update" value="Aggiorna"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
		</ul>	
	</form>
	
	<div class="errors"></div>
</section>