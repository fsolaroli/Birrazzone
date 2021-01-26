<p>Risultati per: <?php echo $_POST["search"]?> </p>

<section>
	<h3>Birre</h3>
	<?php $beersFound = $dbh->searchBeer($_POST["search"]); ?>
	
	<?php if(!empty($beersFound)): ?>
		<ul class="products">
			<?php foreach ($beersFound as $beer): ?>
				<li id="<?php echo $beer["IdBirra"] ?>">
					<a href="../ProductPage/productPage.php?id=<?php echo $beer["IdBirra"]; ?>">
						<div class="img">
							<img class="productPhoto" src="<?php echo UPLOAD_DIR."Birre/".$beer["FotoBirra"] ?>" alt="FotoBirra"/>
						</div>
						<div class="productInfo">
							<ul>
								<li><?php echo $beer["NomeBirra"] ?></li>
								<li><?php echo $beer["Tipologia"] ?></li>
								<li><?php echo $beer["NomeBirrificio"] ?></li>
							</ul>
						</div>
						<div class="productData">
							<ul>
								<li><?php echo $beer["Formato"] ?> cl</li>
								<li><?php echo $beer["Prezzo"] ?>€ cad</li>
							</ul>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if(empty($beersFound)): ?>
		<p>Non esistono birre con questa parola</p>
	<?php endif; ?>
</section>

<section>
	<h3>Birrifici</h3>
	<?php $sellersFound = $dbh->searchSeller($_POST["search"]); ?>

	<?php if(!empty($sellersFound)): ?>
		<ul class="producers">
			<?php foreach($sellersFound as $seller): ?>
				<li>
					<a href="../SellerPage/sellerPage.php?sellerId=<?php echo $seller["IdBirrificio"]; ?>">
						<div class="img">
							<img class="breweryPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$seller["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
						</div>
						<ul class="info-brewery">
							<li><?php echo $seller["NomeBirrificio"]; ?></li>
							<li><?php echo $seller["Localita"]; ?></li>
						</ul>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if(empty($sellersFound)): ?>
		<p>Non esistono birrifici con questa parola</p>
	<?php endif; ?>

</section>