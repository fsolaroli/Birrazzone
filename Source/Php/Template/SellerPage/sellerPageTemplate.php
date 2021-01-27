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
	<ul>
		<li class="center"><?php echo $sellerData["Localita"] ?></li>
		<li class="photo"><img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/></li>
		<li>
			<div class="description">
				<p><?php echo substr($sellerData["DescrizioneBirrificio"], 0, $shortDescriptionLenght) ?></p>
				<?php if($sellerData["DescrizioneBirrificio"] != substr($sellerData["DescrizioneBirrificio"], 0, $shortDescriptionLenght)) : ?>
					<p id="fullDescription" hidden><?php echo $sellerData["DescrizioneBirrificio"] ?></p>
					<a href="javascript:void(0);" class="show">Mostra tutto</a>
				<?php endif; ?>
			</div>
		</li>
	</ul>	
</section>
<section>
	<h2>Birre migliori</h2>
	<?php if (empty($beersToShow)): ?>
		<p>Nessun prodotto</p>
	<?php endif; ?>

	<?php if (!empty($beersToShow)): ?>
		<ul class="products">
			<?php foreach ($beersToShow as $product): ?>
				<li>
					<a href="../ProductPage/productPage.php?id=<?php echo $product["IdBirra"] ?>">
						<img class="productPhoto" src="<?php echo UPLOAD_DIR."Birre/".$product["FotoBirra"] ?>" alt="FotoBirra"/>
						<div class="productInfo">
							<ul>
								<li><?php echo $product["NomeBirra"] ?></li>
								<li><?php echo $product["Tipologia"] ?></li>
								<li><?php echo $dbh->getSeller($product["IdBirrificio"])[0]["NomeBirrificio"] ?></li>
							</ul>
						</div>
						<div class="productData">
							<ul>
								<li><?php echo $product["Formato"] ?> cl</li>
								<li><?php echo $product["Prezzo"] ?>€ cad</li>
							</ul>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<a href="../Search/search.php?sellerId=<?php echo $product["IdBirrificio"]?>"><button>Vedi tutte le birre</button></a>
</section>