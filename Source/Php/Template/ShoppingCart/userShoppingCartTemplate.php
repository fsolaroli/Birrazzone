<h1>Carrello<h1>
<?php foreach($templateParams["birre"] as $birra): ?>
	<section>
		<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"]; ?>" alt="FotoBirra"/>
		<a href="productPage.php?id=<?php echo $birra["IdBirra"]?>"><?php echo $birra["NomeBirra"]; ?></a>
	</section>
<?php endforeach; ?>