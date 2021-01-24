<?php
	require("sellerProfileTemplate.php");
	
	if (isset($_GET["productId"])) {
		$productData = $dbh->getBeer($_GET["productId"])[0];
		$productData["Quantita"] = $dbh->getBeerQuantity($productData["IdBirra"]);
	} else {
		header("Location: sellerProducts.php");
	}
?>

<section>
	<h2>Dati birra</h2>
	<ul>
		<li id="productId" hidden><?php echo $productData["IdBirra"] ?></li>
		<li><?php echo $productData["NomeBirra"] ?></li>
		<li><?php echo $productData["Tipologia"] ?></li>
		<li><img class="productPhoto" src="<?php echo UPLOAD_DIR."Birre/".$productData["FotoBirra"] ?>" alt="FotoBirra"/></li>
		<li><?php echo $productData["Prezzo"] ?> €</li>
		<li><?php echo $productData["Formato"] ?> cl</li>
		<li><?php echo $productData["GradoAlcolico"] ?>º</li>
		<li><?php echo $productData["Colore"] ?></li>
		<li><?php echo $productData["DescrizioneBirra"] ?></li>
	</ul>
	<a href="modifyProduct.php?productId=<?php echo $productData["IdBirra"] ?>"><button id="modifyAccountData" class="modify">Modifica</button></a>
</section>
<section>
	<h2>Quantità birra</h2>
	<p id="disponibilita">Disponibilità: <?php echo $productData["Quantita"] ?></p>
	<form onsubmit="return false;">
		<ul>
			<li class="label">
				<label for="changeQuantity">Modifica disponibilità
				<input type="number" name="changeQuantity" value="1" min="1" autocomplete="off"/>
				</label>
			</li>

			<li class="modify"><input type="submit" name="remove" value="Rimuovi"/><input type="submit" name="add" value="Aggiungi"/></li>
		</ul>
	</form>
	<p>Nº vendute: <?php echo $dbh->getNumberOfBeerSold($productData["IdBirra"]) ?></p>
</section>
<section>
	<button id="deleteProduct" class="delete">Elimina prodotto</button>
	<button id="deleteProductConfermation" class="delete" hidden>Conferma eliminazione birra</button>
</section>