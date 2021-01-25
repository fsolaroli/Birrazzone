<header>
	<h1>Amministratore</h1>
</header>
<p id="breweryId" hidden> <?php echo $birra["IdBirra"]; ?></p>
<section>
	<h2>Dati Birra</h2>
	<ul>
		<li>
			Nome: <?php echo $birra["NomeBirra"]; ?>
		</li>
		<li>
			Tipologia: <?php echo $birra["Tipologia"];?>
		</li>
		<li>
			<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"] ?>" alt="FotoBirra"/>
		</li>
		<li>
			Prezzo: <?php echo $birra["Prezzo"];?>
		</li>
		<li>
			Formato: <?php echo $birra["Formato"];?>
		</li>
		<li>
			Grado Alcolico: <?php echo $birra["GradoAlcolico"];?>
		</li>
		<li>
			Colore: <?php echo $birra["Colore"];?>
		</li>
		<li>
			Descrizione: <?php echo $birra["DescrizioneBirra"];?>
		</li>
	</ul>
</section>
<section>
	<h2>Quantità Birra</h2>
	<ul>
		<li>
			Disponibilità: <?php echo $birrerimaste;?>
		</li>
		<li>
			N. vendute: <?php echo $birrevendute;?>
		</li>
	</ul>
</section>
