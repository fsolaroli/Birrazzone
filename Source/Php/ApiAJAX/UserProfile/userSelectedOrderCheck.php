<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isset($_POST["orderId"])) {
	$errors = null;

	$orderedProducts = $dbh->getOrderProducts($_POST["orderId"]);
	foreach($orderedProducts as $product) {
		if ($dbh->getBeerQuantity($product["IdBirra"]) < $product["QuantitaTot"]) {
			$errors = "NON È POSSIBILE SODDISFARE LA RICHIESTA IN QUANTO NON È PRESENTE UN NUMERO DI ARTICOLI SUFFICIENTE";
		}
	}

	if(!isset($errors)) {
		foreach($orderedProducts as $product) {
			$dbh->addBeerToShoppingCart($_SESSION["userId"], $product["IdBirra"], $product["QuantitaTot"]);
		}
	}

	echo json_encode($errors);
}

?>