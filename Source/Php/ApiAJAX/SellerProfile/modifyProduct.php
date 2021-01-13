<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["productId"]) && isset($_POST["price"]) && isset($_POST["imagePath"]) && isset($_POST["description"])) {
		if(strlen($_POST["description"]) > 300) {
			$errors["descriptionLenght"] = "DESCRIZIONE TROPPO LUNGA";
		}

		if($_POST["price"] <= 0) {
			$errors["price"] = "IL PREZZO DEVE ESSERE POSITIVO";
		}

		if(empty($errors)) {
			$dbh->updateBeerData($_SESSION["sellerId"], basename($_POST["imagePath"]), $_POST["price"], $_POST["description"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
}

?>