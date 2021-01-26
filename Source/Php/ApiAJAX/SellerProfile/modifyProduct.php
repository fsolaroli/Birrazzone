<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["productId"]) && isset($_POST["price"]) && isset($_POST["imagePath"]) && isset($_POST["description"])) {

		if($_POST["price"] <= 0 || $_POST["price"] > 9999.99) {
			$errors[] = "PREZZO TROPPO ALTO O INCORRETTO";
		}
		
		if(strlen($_POST["description"]) > 300) {
			$errors[] = "DESCRIZIONE TROPPO LUNGA";
		}

		if(empty($errors)) {
			$dbh->updateBeerData($_SESSION["sellerId"], basename($_POST["imagePath"]), $_POST["price"], $_POST["description"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage='È necessario essere loggato come birrificio per poter compiere questa operazione'");
}

?>