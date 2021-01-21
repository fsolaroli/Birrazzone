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
	<p id="productId" hidden> <?php echo $productData["IdBirra"] ?></p>
	<p> <?php echo $productData["NomeBirra"] ?></p>
	<p> <?php echo $productData["Tipologia"] ?></p>
	<img class="productPhoto" src="<?php echo UPLOAD_DIR."Birre/".$productData["FotoBirra"] ?>" alt="FotoBirra"/>
	<p> <?php echo $productData["Prezzo"] ?> €</p>
	<p> <?php echo $productData["Formato"] ?> cl</p>
	<p> <?php echo $productData["GradoAlcolico"] ?>º</p>
	<p> <?php echo $productData["Colore"] ?></p>
	<p> <?php echo $productData["DescrizioneBirra"] ?></p>
	<a href="modifyProduct.php?productId=<?php echo $productData["IdBirra"] ?>"><button id="modifyAccountData" class="modify">Modifica</button></a>
</section>
<section>
	<h2>Quantità birra</h2>
	<p id="disponibilita">Disponibilità: <?php echo $productData["Quantita"] ?></p>
	<form onsubmit="return false;">
		<ul>
			<li>
				<label for="changeQuantity">Modifica disponibilità
				<input type="number" name="changeQuantity" value="1" min="1" autocomplete="off"/>
				</label>
			</li>

			<li><input type="submit" name="add" value="Aggiungi"/></li>
			<li><input type="submit" name="remove" value="Rimuovi"/></li>
		</ul>
	</form>
	<p>Nº vendute: <?php echo $dbh->getNumberOfBeerSold($productData["IdBirra"]) ?></p>
</section>
<section>
	<button id="deleteProduct" class="delete">Elimina prodotto</button>
	<div class="delete" hidden></div>
</section>