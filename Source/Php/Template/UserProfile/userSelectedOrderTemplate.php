<?php
	$orderInfo = $dbh->getOrder($_GET["orderId"]); 
	$userInfo = $dbh->getUser($_SESSION["userId"]);
	$userAddress = $dbh->getAddress($userInfo[0]["IdIndirizzo"]);
?>

<h1><?php echo $userInfo[0]["NomeUtente"]; ?></h1>
<h2>Ordine</h2>

<section>
	<h3>Stato</h3>
	<p><?php echo $orderInfo[0]["Codice"]; ?></p>
</section>

<section>
	<h3>Indirizzo di fatturazione</h3>
	<ul>
		<li><p><?php echo $userInfo[0]["NomeUtente"]; ?></p></li>
		<li><p><?php echo $userAddress[0]["Via"]; ?></p></li>
		<li><p><?php echo $userAddress[0]["Citta"]; ?>, <?php echo $userAddress[0]["Provincia"]; ?></p></li>
		<li><p><?php echo $userAddress[0]["CAP"]; ?></p></li>
	</ul>
</section>