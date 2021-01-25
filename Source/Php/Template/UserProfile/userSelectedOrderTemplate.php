<?php
	$orderInfo = $dbh->getOrder($_GET["orderId"]); 
	$userInfo = $dbh->getUser($_SESSION["userId"]);
	$userAddress = $dbh->getAddress($userInfo[0]["IdIndirizzo"]);
	$orderedProducts = $dbh->getOrderProducts($_GET["orderId"]);
?>

<h1><?php echo $userInfo[0]["NomeUtente"]; ?></h1>
<h2>Ordine <?php echo $_GET["orderId"]?></h2>
<h3><?php echo $orderInfo[0]["DataOrdine"]?> </h3>

<section>
	<section>
		<h3>Stato</h3>
		<p><?php echo $orderInfo[0]["Codice"]; ?></p>
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
	
		<ul class="ordered-products">
			<?php foreach($orderedProducts as $product): ?>
				<li>
					<div class="product-ordered-info">
						<p><?php echo $product["NomeBirra"]; ?></p> 
						<p><?php echo $product["QuantitaTot"]; ?></p>
					</div>
					<div class="product-ordered-price">
						<p><?php echo $product["Totale"]; ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
	
	<section class="delete">
		<div class="total-quantity-price">
			<p>N° prodotti ordinati: <?php echo totalQuantityOrdered($_GET["orderId"]); ?></p>
			<p>Prezzo totale: <?php echo totalPrice($_GET["orderId"]); ?></p>
		</div>
		<div class="replace-order">
			<button>Visualizza</button></a>
		</div>
		<div class="errors"></div>
	</section>
</section>
