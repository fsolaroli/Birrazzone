<?php $birrificio = $dbh->getSeller($birra["IdBirrificio"]);?>
<p id="breweryId" hidden> <?php echo $birra["IdBirra"]; ?></p>
<section>
	<h2><?php echo $birra["NomeBirra"];?></h2>
	<ul>
		<li><p><?php echo $birra["Tipologia"];?></p></li>
		<li><img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"] ?>" alt="FotoBirra"/></li>
		<li><?php echo $birra["Prezzo"];?>€ cad.</li>
	</ul>
		<p> Formato: <?php echo $birra["Formato"];?></p>
		<p>Grado Alcolico: <?php echo $birra["GradoAlcolico"];?></p>
		<p>Colore: <?php echo $birra["Colore"];?></p>
		<p>Descrizione: <?php echo $birra["DescrizioneBirra"];?></p>
</section>
<section id="addToCart">
	<ul>
		<li>
			Disponibilità: 
		</li>
		<li>
			N. vendute:
		</li>
	</ul>
</section>
