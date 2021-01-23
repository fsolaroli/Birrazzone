<?php
	require("sellerProfileTemplate.php");

	function addQuantity($product) {
		global $dbh;
		$product["Quantita"] = $dbh->getBeerQuantity($product["IdBirra"]);
		return $product;
	}
	$sellerProducts = array_map("addQuantity", $dbh->getSellerBeer($_SESSION["sellerId"]));
?>

<section>
	<h2>Prodotti</h2>

	<?php if (empty($sellerProducts)): ?>
		<p>Nessun prodotto</p>
	<?php endif; ?>

	<?php if (!empty($sellerProducts)): ?>
		<?php foreach ($sellerProducts as $product): ?>
			<div class="sellerProduct">
				<p><?php echo $product["NomeBirra"] ?></p>
				<p><span>Disponibilità:</span><span class="<?php if($product["Quantita"] < 10) { echo "attention";} ?>"><?php echo $product["Quantita"] ?></span></p>
				<a href="productPage.php?productId=<?php echo $product["IdBirra"] ?>"><button class="modify">Visualizza</button></a>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

	<a href="newProduct.php"><button class="modify">Aggiungi</button></a>
</section>