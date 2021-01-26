<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["productId"]) && isset($_POST["quantity"]) && isset($_POST["method"])) {
		if (is_numeric($_POST["quantity"])) {
			if ($_POST["method"] == "add") {
				$quantity = abs($_POST["quantity"]);
			} else if ($_POST["method"] == "remove") {
				$quantityLeft = $dbh->getBeerQuantity($_POST["productId"]);
				if(abs($_POST["quantity"]) > $quantityLeft) {
					$quantity = -$quantityLeft;
				} else {
					$quantity = -abs($_POST["quantity"]);
				}
			} else {
				$quantity = 0;
			}
			$dbh->updateBeerQuantity($_SESSION["sellerId"], $_POST["productId"], $quantity);
			echo json_encode($dbh->getBeerQuantity($_POST["productId"]));
		}
	}
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come birrificio per poter compiere questa operazione");
}

?>