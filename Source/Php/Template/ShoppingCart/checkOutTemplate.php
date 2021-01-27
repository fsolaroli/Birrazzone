<?php $prezzoOrdine = null?>
<h1>Riepilogo ordine</h1>

<section>
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
			<button class="modify" id="modifyAddress" >Modifica</button>
		</div>
	</section>
	<section class="checkoutOrder">
		<h2 class="checkout">Modalità di pagamento</h2>
		<div class="payment">
				<span>************<?php echo substr($_SESSION["NumeroCarta"], 12);?></span> 
				<span><?php echo $_SESSION["Scadenza"];?></span>
		</div>
		<div class="modifyOrder">
			<button class="modify" id="modifyPayment">Modifica</button>
		</div>
	</section>
</section>
<section class="finalCheckout">
	<h2 class="checkout">Prodotti </h2>
	<ul class="orders">
		<?php foreach($birre as $birra): ?>
			<li <?php if(array_search($birra, $birre) == (sizeof($birre) - 1)) { echo "class='overflow'"; } ?>>
				<div class="productInfo">
					<p><?php echo $birra["NomeBirra"]; ?></p>
					<p>Quantità: </span><span><?php echo $birra["QuantitaTot"]; ?></p>
				</div>
				<div class="productData">
					<p>Totale: <?php echo $birra["Totale"]; ?>€</p>		
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
<section class="contaisCheckout">
	<?php foreach($birre as $birra):?>
			<?php $prezzoOrdine += $birra["Totale"];?>
	<?php endforeach;?>
	<section class="checkout">
		<p>Totale:<?php echo $prezzoOrdine;?>€</p>
		<button class="undo">Annulla</button>
		<button class="conclude">Acquista</button>
	</section>
</section>