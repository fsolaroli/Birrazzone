
<h1>Amministratore</h1>

<p id="breweryId" hidden> <?php echo $birrificio["IdBirra"]; ?></p>
<section>
	<h2>Dati Account</h2>
	<ul>
		<li>
			Ragione Sociale: <?php echo $birrificio["NomeBirrificio"]; ?>
		</li>
		<li>
			Email: <?php echo $birrificio["EmailBirrificio"];?>
		</li>
		<li>
			P.IVA: <?php echo $birrificio["PartitaIVA"];?>
		</li>
	</ul>
</section>
<section>
	<h2>Dati Account</h2>
	<ul>
		<li>
			Località: <?php echo $birrificio["Localita"];?>
		</li>
		<li>
			<img class="sellerPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$templateParams["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
		</li>
		<li>
			Descrizione: <?php echo $birrificio["DescrizioneBirrificio"];?>
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
<section class="delete">
	<button id="deleteAccount" class="delete">Elimina account</button>
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
</section>