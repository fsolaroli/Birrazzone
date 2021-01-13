<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["imagePath"]) && isset($_POST["price"]) && isset($_POST["format"]) && isset($_POST["alcholic"]) && isset($_POST["color"]) && isset($_POST["description"])) {
		if(strlen($_POST["description"]) > 300) {
			$errors["descriptionLenght"] = "DESCRIZIONE TROPPO LUNGA";
		}

		if($_POST["price"] <= 0) {
			$errors["price"] = "IL PREZZO DEVE ESSERE POSITIVO";
		}

		//TODO add input control

		if(empty($errors)) {
			$dbh->addBeer($_SESSION["sellerId"], $_POST["name"], $_POST["type"], basename($_POST["imagePath"]), $_POST["price"], $_POST["format"], $_POST["alcholic"], $_POST["color"], $_POST["description"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
}

?>