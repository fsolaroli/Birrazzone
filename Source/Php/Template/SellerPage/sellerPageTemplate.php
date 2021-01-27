<?php
	if (isset($_GET["sellerId"]) && $_GET["sellerId"] != null && !empty($queryResult = $dbh->getSeller($_GET["sellerId"]))) {
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
		header("Location: ../../Site/Errors/errors.php?errorType=404&errorMessage=Il birrificio cercato è inesistente");
	}
?>

<h1><?php echo $sellerData["NomeBirrificio"] ?></h1>
<section>
	<h2>Dati birrifcio</h2>
	<p id="sellerId" hidden><?php echo $_GET["sellerId"]; ?></p>
	<ul>
		<?php if(!empty($sellerData["Localita"])): ?>
			<li class="center"><?php echo $sellerData["Localita"] ?></li>
		<?php endif;?>
		<?php if(!empty($sellerData["FotoBirrificio"])): ?>
			<li class="photo"><img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$sellerData["FotoBirrificio"] ?>" alt="FotoBirrificio"/></li>
		<?php endif;?>
		<?php if(!empty($sellerData["DescrizioneBirrificio"])): ?>
			<li>
				<div class="description">
					<p><?php echo substr($sellerData["DescrizioneBirrificio"], 0, $shortDescriptionLenght) ?></p>
					<?php if($sellerData["DescrizioneBirrificio"] != substr($sellerData["DescrizioneBirrificio"], 0, $shortDescriptionLenght)) : ?>
						<p id="fullDescription" hidden><?php echo $sellerData["DescrizioneBirrificio"] ?></p>
						<a href="javascript:void(0);" class="show">Mostra tutto</a>
						<?php endif; ?>
				</div>
			</li>
		<?php endif;?>
	</ul>
	<?php if(empty($sellerData["Localita"]) && empty($sellerData["FotoBirrificio"]) && empty($sellerData["DescrizioneBirrificio"])): ?>
		<p>Il vanditore non ha ancora inserito dati sul suo birrificio</p>
	<?php endif;?>
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
	<button>Vedi tutte le birre</button>
	
	<?php endif; ?>
</section>