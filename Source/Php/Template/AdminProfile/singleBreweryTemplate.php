
<h1>Amministratore</h1>

<section>
	<p id="<?php echo $idbirrificio?>" hidden><p>
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
		<h2>Dati Profilo</h2>
		<ul>
			<li>
				Località: <?php echo $birrificio["Localita"];?>
			</li>
			<li class="photo">
				<img class="breweryPhoto" src="<?php echo UPLOAD_DIR."Birrifici/".$birrificio["FotoBirrificio"] ?>" alt="FotoBirrificio"/>
			</li>
			<li>
				Descrizione: <?php echo $birrificio["DescrizioneBirrificio"];?>
			</li>
		</ul>
	</section>
</section>
<section>
	<h2>Prodotti</h2>
	<ul class="sellerProducts">
		<?php foreach($templateParams["birre"] as $birra): ?>
			<li>
				<div>
					<p><?php echo $birra["NomeBirra"]?> </p>
				</div>
				<div>
					<button id="<?php echo $birra["IdBirra"]?>" class="singleProduct">Visualizza</button>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
<section class="delete">
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
	<button id="deleteAccount" class="delete">Elimina account</button>
</section>