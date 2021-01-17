<?php
	if (isset($_GET["sellerId"]) && !empty($queryResult = $dbh->getSeller($_GET["sellerId"]))) {
		$sellerData = $queryResult[0];
		$shortDescriptionLenght = 50;
		$numberOfBeerToShow = 4;
		$bestSellerProducts = $dbh->getBestSellerBeer($_GET["sellerId"], $numberOfBeerToShow);
		$sellerBeer = $dbh->getSellerBeer($_GET["sellerId"]);
		if(empty($bestSellerProducts)) {
			if(empty($sellerBeer)) {
				$beersToShow = [];
			} else {
				if(count($sellerBeer) <= $numberOfBeerToShow) {
					$beersToShow = $sellerBeer;
				} else {
					$beersToShow = array_slice($sellerBeer, 0, $numberOfBeerToShow);
				}
			}
		} else {
			$beersToShow = $bestSellerProducts;
		}
	} else {
		header("Location: ../Home/home.php"); //404
	}

?>

<h1><?php echo $sellerData["NomeBirrificio"] ?></h1>
<section>
	<p> <?php echo $sellerData["Localita"] ?></p>
	<img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
	<div class="description">
		<p id="shortDescription"> <?php echo substr($sellerData["DescrizioneBirrificio"], 0, $shortDescriptionLenght) ?></p>
		<?php if($sellerData["DescrizioneBirrificio"] != substr($sellerData["DescrizioneBirrificio"], 0, $shortDescriptionLenght)) : ?>
			<p id="fullDescription" hidden> <?php echo $sellerData["DescrizioneBirrificio"] ?></p>
			<a href="javascript:void(0);" class="show">Mostra tutto</a>
			<a href="javascript:void(0);" class="hide" hidden>Riduci</a>
		<?php endif; ?>
	</div>
</section>
<section>
	<h2>Birre migliori</h2>
	<?php if (empty($beersToShow)): ?>
		<p>Nessun prodotto</p>
	<?php endif; ?>

	<?php if (!empty($beersToShow)): ?>
		<?php foreach ($beersToShow as $product): ?>
			<div id="<?php echo $product["IdBirra"] ?>" class="product">
				<img class="productPhoto" src="<?php echo UPLOAD_DIR."Birre/".$product["FotoBirra"] ?>" width="300px" alt="FotoBirra"/>
				<div class="productInfo">
					<ul>
						<li><?php echo $product["NomeBirra"] ?></li>
						<li><?php echo $product["Tipologia"] ?></li>
						<li><?php echo $product["NomeBirrificio"] ?></li>
					</ul>
				</div>
				<div class="productData">
					<ul>
						<li><?php echo $product["Formato"] ?> cl</li>
						<li><?php echo $product["Prezzo"] ?>€ cad</li>
					</ul>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

	<button>Vedi tutte le birre</button>
</section>