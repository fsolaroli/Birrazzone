<header>
	<h1>Amministratore</h1>
</header>
<p id="breweryId" hidden> <?php echo $templateParams["birrificio"]["IdBirra"]; ?></p>
<section>
	<h2>Dati Account</h2>
	<ul>
		<li>
			Ragione Sociale: <?php echo $templateParams["birrificio"]["NomeBirrificio"]; ?>
		</li>
		<li>
			Email: <?php echo $templateParams["birrificio"]["EmailBirrificio"];?>
		</li>
		<li>
			P.IVA: <?php echo $templateParams["birrificio"]["PartitaIva"];?>
		</li>
	</ul>
</section>
<section>
	<h2>Dati Account</h2>
	<ul>
		<li>
			Località: <?php echo $templateParams["birrificio"]["Localita"];?>
		</li>
		<li>
			<img class="breweryPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$templateParams["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
		</li>
		<li>
			Descrizione: <?php echo $templateParams["birrificio"]["DescrizioneBirrificio"];?>
		</li>
	</ul>
</section>
<section>
	<h2>Prodotti</h2>
	<ul>
		<?php foreach($templateParams["birre"] as $birra): ?>
			<li>
			 	<?php echo $birra["NomeBirra"]?>  <a href="singleProduct.php?id=<?php echo $birra["IdBirra"] ?>"><button>Visualizza</button></a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
<section>
	<button id="deleteAccount" class="delete">Elimina account</button>
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
</section>