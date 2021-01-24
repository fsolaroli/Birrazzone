<header>
	<h1>Amministratore</h1>
</header>
<p id="breweryId" hidden> <?php echo $templateParams["birra"]["IdBirra"]; ?></p>
<section>
	<h2>Dati Birra</h2>
	<ul>
		<li>
			Nome: <?php echo $templateParams["birra"]["NomeBirra"]; ?>
		</li>
		<li>
			Tipologia: <?php echo $templateParams["birra"]["Tipologia"];?>
		</li>
		<li>
			<img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$templateParams["birra"]["FotoBirra"] ?>" alt="FotoBirra"/>
		</li>
		<li>
			Prezzo: <?php echo $prezzo;?>
		</li>
		<li>
			Formato: <?php echo $templateParams["birra"]["Formato"];?>
		</li>
		<li>
			Grado Alcolico: <?php echo $templateParams["birra"]["GradoAlcolico"];?>
		</li>
		<li>
			Colore: <?php echo $templateParams["birra"]["Colore"];?>
		</li>
		<li>
			Descrizione: <?php echo $templateParams["birra"]["DescrizioneBirra"];?>
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
