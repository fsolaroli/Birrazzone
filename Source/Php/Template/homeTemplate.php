<section>
	<h3>Scopri nuove birre</h3>
	<?php $randomBeers = $dbh->getRandomBeer(); ?>
	
	<ul class="products">
		<?php foreach($randomBeers as $beer): ?>
			<li>
				<a href="../ProductPage/productPage.php?<?php echo $beer["IdBirra"]; ?>">
					<div class="img">
						<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$beer["FotoBirra"] ?>" alt="FotoBirra"/>
					</div>
					<ul class="info-beer">
						<li><?php echo $beer["NomeBirra"]; ?></li>
						<li><?php echo $beer["Tipologia"]; ?></li>
						<li><?php echo $beer["NomeBirrificio"]; ?></li>
						<li><?php echo $beer["Formato"]; ?> cl.</li>
						<li><?php echo $beer["Prezzo"]; ?>€ cad</li>
					</ul>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>

<section>
	<h3>Scopri nuovi birrifici</h3>
	<?php $randomSellers = $dbh->getRandomSeller(); ?>
	
	<ul class="producers">
		<?php foreach($randomSellers as $seller): ?>
			<li>
				<a href="../SellerPage/sellerPage.php?sellerId=<?php echo $seller["IdBirrificio"]; ?>">
					<div class="img">
						<img class="breweryPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$seller["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
					</div>
					<ul class="info-brewery">
						<li><?php echo $seller["NomeBirrificio"]; ?></li>
						<li><?php echo $seller["Localita"]; ?></li>
						<li><?php echo $seller["DescrizioneBirrificio"]; ?></li>
					</ul>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>