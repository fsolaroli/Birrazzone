<?php $prezzoOrdine = null?>
<h1>Riepilogo ordine</h1>

<section class="checkoutOrder">
	<h2 class="checkout">Indirizzo di spedizione</h2>
	<ul>
		<li>Via: <?php echo $address["Via"];?></li>
		<li>Città: <?php echo $address["Citta"];?></li>
		<li>Provincia: <?php echo $address["Provincia"];?></li>
		<li>CAP: <?php echo $address["CAP"];?></li>
	</ul>
	<p>Italia</p>
	<div class="modifyOrder">
		<button class="modify" class="modifyAddress" >Modifica</button>
	</div>
</section>
<section class="checkoutOrder">
	<h2 class="checkout">Modalità di pagamento</h2>
	<div class="payment">
			<span>************<?php echo substr($_SESSION["NumeroCarta"], 12);?></span> 
			<span><?php echo $_SESSION["Scadenza"];?></span>
	</div>
	<div class="modifyOrder">
		<button class="modify" class="modifyPayment">Modifica</button>
	</div>
</section>
<section class="checkoutOrder">
	<h2 class="checkout">Prodotti </h2>
	<ul>
		<?php foreach($birre as $birra):?>
		<section class="cart">
			<li>
				<p><?php echo $birra["NomeBirra"]; ?></p><p class="price"><?php echo $birra["Totale"]; ?>€</p>
				<p class="qt">Quantità: <?php echo $birra["QuantitaTot"]; ?> </p>
			</li>
		</section>
		<?php endforeach;?>
	</ul>
</section>
<section>
	<?php foreach($birre as $birra):?>
			<?php $prezzoOrdine += $birra["Totale"];?>
	<?php endforeach;?>
	<div>
		<p>Totale:<?php echo $prezzoOrdine;?>€</p>
		<button class="undo">Annulla</button> 
		<button class="conclude">Acquista</button>
	</div>
</section>