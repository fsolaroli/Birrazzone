<section>
	<h2>Scopri nuove birre</h2>
	<?php $randomBeers = $dbh->getRandomBeer(); ?>
	
	<ul class="products">
		<?php foreach($randomBeers as $beer): ?>
			<li>
				<a href="../ProductPage/productPage.php?id=<?php echo $beer["IdBirra"];?>">
					<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$beer["FotoBirra"] ?>" alt="FotoBirra"/>	
					<div class="info-beer">
						<ul>
							<li><?php echo $beer["NomeBirra"]; ?></li>
							<li><?php echo $beer["Tipologia"]; ?></li>
							<li><?php echo $beer["NomeBirrificio"]; ?></li>
						</ul>
						<ul>
							<li><?php echo $beer["Formato"]; ?> cl.</li>
							<li><?php echo $beer["Prezzo"]; ?>€ cad</li>							
						</ul>
					</div>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>

<section>
	<h2>Scopri nuovi birrifici</h2>
	<?php $randomSellers = $dbh->getRandomSeller(); ?>
	<?php $descriptionLength = 100; ?>
	
	<ul class="producers">
		<?php foreach($randomSellers as $seller): ?>
			<li>
				<a href="../SellerPage/sellerPage.php?sellerId=<?php echo $seller["IdBirrificio"]; ?>">
					<img class="breweryPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$seller["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
					<div class="info-brewery">
						<ul>
							<li><?php echo $seller["NomeBirrificio"]; ?></li>
							<li><?php echo $seller["Localita"]; ?></li>
							<li>
								<span></span>
								<span class="short-description"><?php echo substr($seller["DescrizioneBirrificio"], 0, ($descriptionLength / 2)); ?>...</span>
								<span class="long-description"><?php echo substr($seller["DescrizioneBirrificio"], 0, $descriptionLength); ?>...</span>
							</li>
						</ul>
					</div>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>