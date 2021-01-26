<h1>Carrello</h1>
<?php $totaleCarrello = null; ?>

<?php if(empty($templateParams["birre"])): ?>
<h3>Non ci sono birre nel carrello</h3>
<?php endif; ?>

<?php if(!empty($templateParams["birre"])): ?>
<?php foreach($templateParams["birre"] as $birra): ?>
	<section>
	<p class="max<?php echo $birra["IdBirra"]?>" hidden><?php echo $dbh->getBeerQuantity($birra["IdBirra"]);?></p>
	<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"]; ?>" alt="FotoBirra"/>
		<div>
			<div class="del">
				<div>
					<a href="../ProductPage/productPage.php?id=<?php echo $birra["IdBirra"]?>"><?php echo $birra["NomeBirra"]; ?></a> <?php echo $birra["Prezzo"]?>€ cad.
				</div>
				<button><img class="delete" alt="id <?php echo $birra["IdBirra"];?>" src="../../../../Immagini/Icone/Close.png" ></img></button>
				<div>
					<button class="add" alt="id <?php echo $birra["IdBirra"];?>"><img src='../../../../Immagini/Icone/Expand.png'/> </button> 
					<p class="qt<?php echo $birra["IdBirra"];?>"> <?php echo $birra["QuantitaTot"];?></p> 
					<button class="remove" alt="id <?php echo $birra["IdBirra"];?>"><img src='../../../../Immagini/Icone/Collapse.png'/> </button> 
				</div>
				<p class="totBeer<?php echo $birra["IdBirra"]?>"> <?php echo $birra["Totale"];?>€ </p>
			</div>
		</div>
		<?php $totaleCarrello +=  $birra["Totale"];?>
	</section>
<?php endforeach; ?>
<section>
	<div>
		<span>Tipi di birre: <?php echo count($templateParams["birre"]); ?></span>
		<span>Totale: <p class="totCart"> <?php echo $totaleCarrello;?>€</p> </span>
		<div> <a href="../../Site/ShoppingCart/checkOutAddress.php"> <button class="checkout" > Checkout </button> </a></div>
	</div>
</section>
<?php endif; ?>