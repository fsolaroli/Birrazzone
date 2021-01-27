<h1>Carrello</h1>
<?php $totaleCarrello = null; ?>

<?php if(empty($templateParams["birre"])): ?>
<p>Non ci sono birre nel carrello</p>
<?php endif; ?>

<?php if(!empty($templateParams["birre"])): ?>
<?php foreach($templateParams["birre"] as $birra): ?>
	<section class="cart">
		<p class="max<?php echo $birra["IdBirra"]?>" hidden><?php echo $dbh->getBeerQuantity($birra["IdBirra"]);?></p>
		<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"]; ?>" alt="FotoBirra"/>
		<div class="del">
			<ul class="productInfo">
				<li>
					<a href="../ProductPage/productPage.php?id=<?php echo $birra["IdBirra"]?>"><?php echo $birra["NomeBirra"]; ?></a>
				</li>
				<li>
					<?php echo $birra["Prezzo"]?>€ cad.
				</li>
			</ul>
			<div class="changeQuantity">					
				<img src='../../../../Immagini/Icone/Collapse.png' class="remove" alt="id <?php echo $birra["IdBirra"];?>"/>  
				<p class="qt<?php echo $birra["IdBirra"];?>"> <?php echo $birra["QuantitaTot"];?></p> 
				<img src='../../../../Immagini/Icone/Expand.png' class="add" alt="id <?php echo $birra["IdBirra"];?>"/>
			</div>
			<p class="totBeer<?php echo $birra["IdBirra"]?>">Totale: <?php echo $birra["Totale"];?>€ </p>
		</div>
		<img src="../../../../Immagini/Icone/Close.png" class="delete" alt="id <?php echo $birra["IdBirra"];?>"/>
		<?php $totaleCarrello +=  $birra["Totale"];?>
	</section>
<?php endforeach; ?>
<section class="addToCart">
	<div>
		<p>Tipi di birre: <?php echo count($templateParams["birre"]); ?></p>
		<p class="totCart">Totale: <?php echo $totaleCarrello;?>€</p> 
		<div> <a href="checkOutAddress.php"> <button class="checkout" > Checkout </button> </a></div>
	</div>
</section>
<?php endif; ?>