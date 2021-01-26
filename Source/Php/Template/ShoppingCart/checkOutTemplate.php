<?php $prezzoOrdine = null?>
<h1>Riepilogo ordine</h1>

<section>
	<h2>Indirizzo di spedizione</h2>
	<form onsubmit="return false;">
		<ul>
			<li>Via: <?php echo $address["Via"];?></li>
			<li>Città: <?php echo $address["Citta"];?></li>
			<li>Provincia: <?php echo $address["Provincia"];?></li>
			<li>CAP: <?php echo $address["CAP"];?></li>
		</ul>
	</form>
	<p>Italia</p>
	<div>
		<button class="modifyAddress" >Modifica</button>
	</div>
</section>
<section>
	<h2>Modalità di pagamento</h2>
	<form onsubmit="return false;">
			<div>
				<p>************<?php echo substr($_SESSION["NumeroCarta"], 12);?>   <?php echo $_SESSION["Scadenza"];?></p>
			</div>
	</form>
	<div>
		<button class="modifyPayment">Modifica</button>
	</div>
</section>
<section>
	<h2>Prodotti </h2>
	<ul>
		<?php foreach($birre as $birra):?>
		<li>
			<p><?php echo $birra["NomeBirra"]; ?>  <?php echo $birra["Totale"]; ?>€</p>
			Quantità: <?php echo $birra["QuantitaTot"]; ?> 
		</li>
		<?php endforeach;?>
	</ul>
</section>
<section>
	<?php foreach($birre as $birra):?>
			<?php $prezzoOrdine += $birra["Totale"];?>
	<?php endforeach;?>
	<p>Totale:<?php echo $prezzoOrdine;?>€</p>
	<button class="undo">Annulla</button> 
	<button class="conclude">Acquista</button>
</section>