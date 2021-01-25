<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST[0])) {
	$errors = null;

	$orderedProducts = $dbh->getOrderProducts($_GET["orderId"]);
	foreach($orderedProducts = $product) {
		if ($dbh->getBeerQuantity($product["IdBirra"]) < $product["QuantitaTot"]) {
			$errors = "NON È POSSIBILE SODDISFARE LA RICHIESTA IN QUANTO NON È PRESENTE UN NUMERO DI ARTICOLI SUFFICIENTE";
		}
	}

	if(empty($errors)) {
		foreach($orderedProducts = $product) {
			$dbh->addBeerToShoppingCart($_SESSION["userId"], $product["IdBirra"], $dbh->getBeerQuantity($product["IdBirra"]);
		}
	}

	echo json_encode($errors);
}

?>