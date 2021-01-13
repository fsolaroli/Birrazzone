<?php
	require("sellerProfileTemplate.php");
	
	if (isset($_GET["productId"])) {
		$productData = $dbh->getBeer($_GET["productId"])[0];
	} else {
		header("Location: sellerProducts.php"); //404
	}
?>

<form onsubmit="return false;">
	<input type="hidden" name="productId" value="<?php echo $_GET["productId"] ?>">
	<ul>
		<li><label for="image">Foto</label></li>
		<li>
			<img src="<?php echo UPLOAD_DIR."Birre/".$productData["FotoBirra"]; ?>" alt="" width="300px"/>
			<input type="file" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
		</li>
		<li><div class="imageErrors"></div></li>

		<li><label for="price">Prezzo</label></li>
		<li><input type="number" name="price" value="<?php echo $productData["Prezzo"] ?>" autocomplete="off"/></li>

		<li><label for="description">Descrizione:</label></li>
		<li><input type="text" name="description" value="<?php echo $productData["DescrizioneBirra"] ?>" autocomplete="off"/></li>

		<li><input type="submit" name="update" value="Aggiorna"/></li>
	</ul>	
</form>
<a href="productPage.php?productId=<?php echo $productData["IdBirra"] ?>"><button>Annulla</button></a>
<div class="errori"></div>
