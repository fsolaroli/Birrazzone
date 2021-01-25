<h1>Carrello</h1>
<?php $totaleCarrello = null; ?>
<?php if(empty($templateParams["birre"])){ ?>
<h3>Non ci sonon birre nel carrello</h3>
<?php }else{ ?>
<?php foreach($templateParams["birre"] as $birra): ?>
	<section>
	<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"]; ?>" alt="FotoBirra"/>
		<div>
			<div>
				<div>
					<a href="../ProductPage/productPage.php?id=<?php echo $birra["IdBirra"]?>"><?php echo $birra["NomeBirra"]; ?></a> <?php echo $birra["Prezzo"]?>€ cad.
				</div>
				<button><img id="delete" src="../../../../Immagini/Icone/Close.png" alt="delete <?php echo $birra["IdBirra"]?>"></img></button>
				<div>
					<button id="add" ><img src='../../../../Immagini/Icone/Expand.png'/> </button> 
					<p id="qt" alt="id <?php echo $birra["IdBirra"]?>"> <?php echo $birra["QuantitaTot"];?></p> 
					<button id="remove" ><img src='../../../../Immagini/Icone/Collapse.png'/> </button> 
				</div>
				Totale: <?php echo $birra["Totale"]; ?>€
			</div>
		</div>
		<?php $totaleCarrello +=  $birra["Totale"];?>
	</section>
<?php endforeach; ?>
<?php } ?>
<section>
	<div>
		N. Prodotti: <?php echo count($templateParams["birre"]); ?>
		Totale:  <?php echo $totaleCarrello;?>€
		<div> <a href="#"> <button id="checkout" > Checkout </button> </a></div>
	</div>
</section>