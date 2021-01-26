<h1>Carrello</h1>
<?php $totaleCarrello = null; ?>

<?php if(empty($templateParams["birre"])): ?>
<h3>Non ci sono birre nel carrello</h3>
<?php endif; ?>

<?php if(!empty($templateParams["birre"])): ?>
<?php foreach($templateParams["birre"] as $birra): ?>
	<section>
	<p id="max<?php echo $birra["IdBirra"]?>" hidden><?php echo $dbh->getBeerQuantity($birra["IdBirra"]);?></p>
	<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"]; ?>" alt="FotoBirra"/>
		<div>
			<div>
				<div>
					<a href="../ProductPage/productPage.php?id=<?php echo $birra["IdBirra"]?>"><?php echo $birra["NomeBirra"]; ?></a> <?php echo $birra["Prezzo"]?>€ cad.
				</div>
				<button><img id="delete" src="../../../../Immagini/Icone/Close.png" alt="delete <?php echo $birra["IdBirra"]?>"></img></button>
				<div>
					<button id="add" alt="id <?php echo $birra["IdBirra"];?>"><img src='../../../../Immagini/Icone/Expand.png'/> </button> 
					<p id="qt<?php echo $birra["IdBirra"];?>"> <?php echo $birra["QuantitaTot"];?></p> 
					<button id="remove" alt="id <?php echo $birra["IdBirra"];?>"><img src='../../../../Immagini/Icone/Collapse.png'/> </button> 
				</div>
				<p id="totBeer<?php echo $birra["IdBirra"]?>"> <?php echo $birra["Totale"];?>€ </p>
			</div>
		</div>
		<?php $totaleCarrello +=  $birra["Totale"];?>
	</section>
<?php endforeach; ?>
<section>
	<div>
		N. Prodotti: <?php echo count($templateParams["birre"]); ?>
		<p id="totCart"> <?php echo $totaleCarrello;?></p> 
		<div> <a href="#"> <button id="checkout" > Checkout </button> </a></div>
	</div>
</section>
<?php endif; ?>