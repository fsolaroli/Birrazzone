<?php $userOrders = $dbh->getAllUserOrders($_SESSION["userId"]); ?>
<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>

<section>
	<h2>Ordini effettuati</h2>

	<?php if(empty($userOrders)): ?>
		<p>Non hai ancora effettuato un ordine.</p>
	<?php endif; ?>

	<?php if(!empty($userOrders)): ?>
		<ul class="orders">

			<?php foreach($userOrders as $order): ?>
				<li id=<?php echo $order["IdOrdine"]; ?>>
					<div>
						<Label for="idOrder">Id Ordine:</Label>
						<p><?php echo $order["IdOrdine"]; ?></p>

						<Label for="data">Data:</Label>
						<p><?php echo $order["DataOrdine"]; ?></p>
						<a href="userSelectedOrder.php?orderId=<?php echo $order["IdOrdine"]; ?>"><button class="modify">Visualizza</button></a>
					</div>
				</li>
			<?php endforeach; ?>

		</ul>
	<?php endif; ?>
</section>