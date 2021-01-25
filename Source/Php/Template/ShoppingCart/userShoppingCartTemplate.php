<h1>Carrello</h1>
<?php foreach($templateParams["birre"] as $birra): ?>
	<section>
	<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"]; ?>" alt="FotoBirra"/>
		<div>
			<div>
				<div>
					<a href="productPage.php?id=<?php echo $birra["IdBirra"]?>"><?php echo $birra["NomeBirra"]; ?></a> <?php echo $birra["Prezzo"]?>€ cad.
				</div>
				<button><img id="delete" src="../../../../Immagini/Icone/Close.png" alt="delete <?php echo $birra["IdBirra"]?>"></img></button>
				<div>
					<button id="add" ><img src='../../../../Immagini/Icone/Expand.png'/> </button> 
					<input id="qt" type="text" name="qt" value="<?php echo $birra["QuantitaTot"];?>"> </input> 
					<button id="remove" ><img src='../../../../Immagini/Icone/Collapse.png'/> </button> 
				</div>
				Totale: <?php echo $birra["Totale"]; ?>€
			</div>
		</div>
	</section>
<?php endforeach; ?>