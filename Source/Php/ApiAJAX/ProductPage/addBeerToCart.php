<?php

require_once("../../Site/baseConfiguration.php");

if (isUserLoggedIn()) {
	if (isset($_POST["IdProduct"]) && isset($_POST["BeerQt"])) {
		$data = null;
		if($_POST["BeerQt"] > 0) {
			$maxQuantity = $dbh->getBeerQuantity($_POST["IdProduct"]);
			if ($_POST["BeerQt"] > $maxQuantity) {
				$quantity = $maxQuantity;
			} else {
				$quantity = $_POST["BeerQt"];
			}
			$dbh->addBeerToShoppingCart($_SESSION["userId"], $_POST["IdProduct"], $quantity);
		} else {
			$data = false;
		}
		echo json_encode($data);
	}
}
?>