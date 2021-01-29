<?php
	$orderInfo = $dbh->getOrder($_GET["orderId"]); 
	$userInfo = $dbh->getUser($_SESSION["userId"]);
	$userAddress = $dbh->getAddress($orderInfo[0]["IdIndirizzoSpedizione"]);
	$orderedProducts = $dbh->getOrderProducts($_GET["orderId"]);
?>

<h1><?php echo $userInfo[0]["NomeUtente"]; ?></h1>
<h2>Ordine <?php echo $_GET["orderId"]?></h2>
<h3><?php echo $orderInfo[0]["DataOrdine"]?> </h3>

<section>
	<section>
		<h3>Stato</h3>
		<p>Il tuo ordine è <?php echo $orderInfo[0]["Descrizione"]; ?></p>
	</section>
	
	<section>
		<h3>Indirizzo di fatturazione</h3>
		<p> </p>
		<ul class="order-address">
			<li><p>Nome:</p> <p><?php echo $userInfo[0]["NomeUtente"]; ?></p></li>
			<li><p>Via:</p> <p><?php echo $userAddress[0]["Via"]; ?></p></li>
			<li><p>Città:</p> <p><?php echo $userAddress[0]["Citta"]; ?></p></li>
			<li><p>Provincia:</p> <p><?php echo $userAddress[0]["Provincia"]; ?></p></li>
			<li><p>CAP:</p> <p><?php echo $userAddress[0]["CAP"]; ?></p></li>
		</ul>
	</section>
</section>

<section>
	<section>
		<h3>Prodotti</h3>
	
		<ul class="products">
			<?php foreach($orderedProducts as $product): ?>
				<li>
					<a href="../ProductPage/productPage.php?id=<?php echo $product["IdBirra"]; ?>">	
						<div class="productInfo">
							<p><?php echo $product["NomeBirra"]; ?></p>
							<p>Quantità: </span><span><?php echo $product["QuantitaTot"]; ?></p>
						</div>
						<div class="productData">
							<p>Totale: <?php echo $product["Totale"]; ?>€</p>		
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
	
	<section>
		<div class="redo-order">
			<div class="total-quantity-price">
				<p>Tipi di birre: <?php echo count($orderedProducts); ?></p>
				<p>N° prodotti ordinati: <?php echo totalQuantityOrdered($_GET["orderId"]); ?></p>
				<p>Prezzo totale: <?php echo totalPrice($_GET["orderId"]); ?>€</p>
			</div>
			<?php if(strcmp($orderInfo[0]["Codice"], "CONSEGNATO") === 0): ?>
				<button>Riordina</button>
			<?php endif; ?>
		</div>
		<div class="errors"><ul></ul></div>
	</section>
</section>
