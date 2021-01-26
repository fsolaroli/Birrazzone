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
		<li>
			<p>Nome:</p>
			<p><?php echo $productData["NomeBirra"] ?></p>
		</li>
		<li>
			<p>Tipologia:</p>
			<p><?php echo $productData["Tipologia"] ?></p>
		</li>
		<li class="photo">
			<p>Foto:</p>
			<img class="productPhoto" src="<?php echo UPLOAD_DIR."Birre/".$productData["FotoBirra"] ?>" alt="FotoBirra"/>
		</li>
		<li>
			<p>Prezzo:</p>
			<p><?php echo $productData["Prezzo"] ?> €</p>
		</li>
		<li>
			<p>Formato:</p>
			<p><?php echo $productData["Formato"] ?> cl</p>
		</li>
		<li>
			<p>Grado Alcolico:</p>
			<p><?php echo $productData["GradoAlcolico"] ?>º</p>
		</li>
		<li>
			<p>Colore:</p>
			<p><?php echo $productData["Colore"] ?></p>
		</li>
		<li>
			<p>Descrizione:</p>
			<p><?php echo $productData["DescrizioneBirra"] ?></p>
		</li>
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
				<input type="number" id="changeQuantity" name="changeQuantity" value="1" min="1" autocomplete="off"/>
				</label>
			</li>

			<li class="modify"><input type="submit" name="remove" value="Rimuovi"/><input type="submit" name="add" value="Aggiungi"/></li>
		</ul>
	</form>
	<p>Nº vendute: <?php echo $dbh->getNumberOfBeerSold($productData["IdBirra"]) ?></p>
</section>
<section class="delete">
	<button id="deleteProductConfermation" class="delete" hidden>Conferma eliminazione birra</button>
	<button id="deleteProduct" class="delete">Elimina prodotto</button>
</section>